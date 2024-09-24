<?php

// Esteban

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Company;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminGameController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['games'] = Game::all();
        $viewData['success'] = session('viewData.success');

        return view('admin-game.index')->with('viewData', $viewData);
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

        return view('admin-game.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        
        $companies = Company::all();

        $viewData['companies'] = $companies;

        return view('admin-game.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Game::validate($request);

        Game::create($request->only(['name', 'image', 'price', 'description', 'company']));

        session()->flash('viewData.success', 'Game created successfully.');

        return redirect()->route('admin-game.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            Game::findOrFail($id)->delete();
        } catch (Exception $e) {
            $viewData['objectType'] = 'Game';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }

        session()->flash('viewData.success', 'Game deleted successfully.');

        return redirect()->route('admin-game.index');
    }
}
