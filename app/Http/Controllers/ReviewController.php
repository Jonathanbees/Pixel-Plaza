<?php

// Esteban

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
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
}
