<?php

// Esteban, Samuel

namespace App\Http\Controllers;

use App\Interfaces\BalanceGenerator;
use App\Models\Game;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['games'] = Game::all();
        $viewData['success'] = session('viewData.success');

        return view('game.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $game = Game::findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = 'Game';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['game'] = $game;
        $viewData['categories'] = $game->getCategories();

        return view('game.show')->with('viewData', $viewData);
    }

    public function shoppingCart(): View
    {
        $cart = session()->get('cart', []);
        $games = Game::find($cart);

        $totalPrice = $games->sum(function ($game) {
            return $game->getPrice();
        });

        $viewData = [];
        $viewData['games'] = $games;
        $viewData['totalPrice'] = $totalPrice;

        return view('game.shoppingCart')->with('viewData', $viewData);
    }

    public function addToShoppingCart(string $id): RedirectResponse
    {
        $cart = session()->get('cart', []);
        if (! in_array($id, $cart)) {
            $cart[] = $id;
        }
        session()->put('cart', $cart);

        return redirect()->route('game.index');
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');

        $games = Game::where('name', 'like', "%{$query}%")
            ->get();

        $viewData = [];
        $viewData['games'] = $games;

        return view('game.index')->with('viewData', $viewData);
    }

    public function mostPurchased(Request $request): View
    {
        $limit = $request->input('limit', 4);

        $games = Game::with(['items'])
            ->has('items')
            ->get()
            ->map(function ($game) {
                $totalPurchased = $game->items->sum('quantity');
                $game->total_purchased = $totalPurchased;

                return $game;
            })
            ->sortByDesc('total_purchased')
            ->take($limit);

        $viewData = [];
        $viewData['games'] = $games;

        return view('game.mostPurchased')->with('viewData', $viewData);
    }

    public function generateBalance(Request $request, string $id, string $type): RedirectResponse
    {
        try {
            $game = Game::findOrFail($id);

            $balanceGenerator = app(BalanceGenerator::class, ['type' => $type]);
            $balanceHtml = $balanceGenerator->generateBalance($game);

            $game->setBalance($balanceHtml);
            $game->setBalanceDate(now());
            $game->setBalanceReviewsCount($game->getReviews()->count());
            $game->save();

            return redirect()->route('game.show', ['id' => $id])->with('viewData', ['success' => 'Balance generated successfully!']);
        } catch (Exception $e) {
            $viewData['objectType'] = $e->getMessage(); // provisional

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
    }

    public function generateBalanceGemini(Request $request, string $id): RedirectResponse
    {
        return $this->generateBalance($request, $id, 'gemini');
    }

    public function generateBalanceHuggingFace(Request $request, string $id): RedirectResponse
    {
        return $this->generateBalance($request, $id, 'huggingface');
    }
}
