<?php

// Jonathan, Esteban

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function topCategories(): View
    {
        $categories = Category::withCount('games')
            ->orderBy('games_count', 'desc')
            ->take(5)
            ->get();

        $viewData = [];
        $viewData['categories'] = $categories;

        return view('category.topCategories')->with('viewData', $viewData);
    }
}
