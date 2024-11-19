<?php

// Esteban

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomUser;
use App\Models\Game;
use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['reviews'] = Review::all();
        $viewData['success'] = session('viewData.success');

        return view('admin-review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $review = Review::findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = 'Review';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['review'] = $review;

        return view('admin-review.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['games'] = Game::all();
        $viewData['customUsers'] = CustomUser::all();

        return view('admin-review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);

        Review::create($request->only(['rating', 'comment', 'game_id', 'custom_user_id']));

        session()->flash('viewData.success', 'Review created successfully.');

        return redirect()->route('admin-review.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            Review::findOrFail($id)->delete();
        } catch (Exception $e) {
            $viewData['objectType'] = 'Review';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }

        session()->flash('viewData.success', 'Review deleted successfully.');

        return redirect()->route('admin-review.index');
    }
}
