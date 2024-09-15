<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        return view('game.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Game::validate($request);

        Game::create($request->only(['rating', 'comment', 'game', 'client']));

        session()->flash('viewData.success', 'Game created successfully.');

        return redirect()->route('game.index');
    }

    public function success(): View
    {
        return view('game.success');
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

        return redirect()->route('game.index');
    }
}