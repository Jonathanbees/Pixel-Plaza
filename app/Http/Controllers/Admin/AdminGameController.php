<?php

// Esteban

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Game;
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
        $viewData['companies'] = Company::all();

        return view('admin-game.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Game::validate($request);

        Game::create($request->only(['name', 'image', 'price', 'description', 'company_id']));

        session()->flash('viewData.success', 'Game created successfully.');

        return redirect()->route('admin-game.index');
    }

    public function edit(int $id): View|RedirectResponse
    {
        $viewData = [];
        $viewData['companies'] = Company::all();
        try {
            $game = Game::findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = 'Game';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['game'] = $game;

        return view('admin-game.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $game = Game::findOrFail($id);

        Game::validate($request);

        $data = $request->only(['name', 'image', 'price', 'description', 'company_id']);
        $game->update($data);

        session()->flash('viewData.success', 'Game updated successfully.');

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
