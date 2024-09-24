<?php

// Esteban

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('game.show')->with('viewData', $viewData);
    }

    public function addReview(Request $request, string $id): RedirectResponse
    {
        $game = Game::findOrFail($id);

        $request->merge([
            'game_id' => $id,
            'custom_user_id' => Auth::id(),
        ]);

        Review::validate($request);

        $review = new Review;
        $review->setRating($request->input('rating'));
        $review->setComment($request->input('comment'));
        $review->setCustomUser(Auth::user());
        $game->addReview($review);

        return redirect()->route('game.show', ['id' => $id]);
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
        if (! in_array($id, $cart)) {
            $cart[] = $id;
        }
        session()->put('cart', $cart);

        return redirect()->route('game.index');
    }
}
