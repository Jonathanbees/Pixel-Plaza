<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['categories'] = Category::all();
        $viewData['success'] = session('viewData.success');

        return view('category.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $category = Category::findOrFail($id);
        $viewData['category'] = $category;

        return view('category.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Category::validate($request);

        Category::create($request->only(['name', 'description']));

        session()->flash('viewData.success', 'Category created successfully.');

        return redirect()->route('category.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('viewData.success', 'Category deleted successfully.');

        return redirect()->route('category.index');
    }
}
