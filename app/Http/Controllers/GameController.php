<?php

// Esteban, Samuel

namespace App\Http\Controllers;

use App\Models\Game;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;


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

        $viewData = [];
        $viewData['games'] = $games;


        return view('game.shoppingCart')->with('viewData', $viewData);
    }

    public function addToShoppingCart(string $id): RedirectResponse
    {
        $cart = session()->get('cart', []);
        if (!in_array($id, $cart)) {
            $cart[] = $id;
        }
        session()->put('cart', $cart);

        return redirect()->route('game.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $games = Game::where('name', 'like', "%{$query}%")
                    ->get();

        $viewData = [];
        $viewData["games"] = $games;

        return view('game.index')->with('viewData', $viewData);
    }

    public function mostPurchased(Request $request) 
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

}
