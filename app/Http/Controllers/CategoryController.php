<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Categories - Online Store';
        $viewData['subtitle'] = 'List of categories';
        $viewData['categories'] = Category::all();

        return view('category.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $category = Category::findOrFail($id);
        $viewData['title'] = $category['name'].' - Online Store';
        $viewData['subtitle'] = $category['name'].' - category information';
        $viewData['categories'] = $category;

        return view('category.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create product';

        return view('category.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        //here will go the code to call the model and save it to the database
        Category::create($request->only(['name', 'description']));

        return redirect()->route('category.success');
    }

    public function success()
    {
        return view('category.success');
    }

    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
