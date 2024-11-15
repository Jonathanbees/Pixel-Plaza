<?php

// Jonathan, Esteban

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function topSellingGames(): View
    {
        $companies = Company::with(['games.items'])->get();

        // topSellingGames and totalPurchased are not attributes of the Company or Game model
        // We calculate them manually, and then add them to the models temporarily for the sort and the show.
        $companies->each(function ($company) {
            $company->topSellingGames = $company->getGames()->map(function ($game) {
                $totalPurchased = $game->getItems()->sum('quantity');
                $game->totalPurchased = $totalPurchased;

                return $game;
            })->sortByDesc('totalPurchased')->take(5);
        });

        $viewData = [];
        $viewData['companies'] = $companies;

        return view('company.topSellingGames')->with('viewData', $viewData);
    }
}
