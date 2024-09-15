<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
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
        } catch (Exception $e) {
            $viewData['objectType'] = "Review";
            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['title'] = 'Review #'.$id.' - PIXEL PLAZA';
        $viewData['subtitle'] = 'Review #'.$id.' - Review information';
        $viewData['review'] = $review;

        return view('review.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create review';
        $viewData['subtitle'] = 'Create a new review';

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);

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

    public function destroy(string $id): RedirectResponse
    {
        $viewData = [];
        try {
            Review::findOrFail($id)->delete();
        } catch (Exception $e) {
            $viewData['objectType'] = "Review";
            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }

        return redirect()->route('review.index');
    }
}
