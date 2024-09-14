<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Reviews - PIXEL PLAZA';
        $viewData['subtitle'] = 'List of reviews';
        $viewData['reviews'] = Review::all();

        return view('review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $review = Review::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('review.nonexistent');
        }
        $viewData['title'] = 'Review #'.$id.' - PIXEL PLAZA';
        $viewData['subtitle'] = 'Review #'.$id.' - Review information';
        $viewData['review'] = $review;

        return view('review.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create review';

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|max:500',
            'game' => 'required',
            'client' => 'required',
        ]);

        Review::create($request->only(['rating', 'comment', 'game', 'client']));

        return redirect()->route('review.success');
    }

    public function success(): View
    {
        $viewData = [];
        $viewData['title'] = 'Review created successfully';
        $viewData['subtitle'] = 'Review created successfully';

        return view('review.success')->with('viewData', $viewData);
    }

    public function nonexistent(): View
    {
        $viewData = [];
        $viewData['title'] = 'Review not found';
        $viewData['subtitle'] = 'Review not found';

        return view('review.nonexistent')->with('viewData', $viewData);
    }

    public function destroy(string $id): RedirectResponse // according to RESTful conventions
    {
        try {
            Review::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('review.nonexistent');
        }

        return redirect()->route('review.index');
    }
}
