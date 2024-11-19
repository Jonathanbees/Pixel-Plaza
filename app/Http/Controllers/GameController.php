<?php

// Esteban, Samuel

namespace App\Http\Controllers;

use App\Models\Game;
use App\Utils\FormattingUtils;
use Exception;
use Gemini;
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

    public function generateBalance(Request $request, string $id): RedirectResponse
    {
        try {
            $game = Game::findOrFail($id);
            $reviews = $game->getReviews();
            $comments = $reviews->pluck('comment')->implode(' | ');

            $prompt = "Generate a summary of the balance of the next comments about the game {$game->getName()} that has a rating of {$game->getRating()}, also, say the reasons of the good and bad comments, that's the vital part: {$comments}";

            $apiKey = env('GEMINI_API_KEY');
            $client = Gemini::client($apiKey);

            $result = $client->geminiPro()->generateContent($prompt);

            $balanceMarkdown = $result->text();
            $balanceHtml = FormattingUtils::convertMarkdownToHtml($balanceMarkdown);

            $game->setBalance($balanceHtml);
            $game->setBalanceDate(now());
            $game->setBalanceReviewsCount($reviews->count());
            $game->save();

            return redirect()->route('game.show', ['id' => $id])->with('viewData', ['success' => 'Balance generated successfully!']);
        } catch (Exception $e) {
            $viewData['objectType'] = $e->getMessage(); // provisional

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
    }
}
