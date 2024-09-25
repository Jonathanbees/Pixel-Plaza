<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function topSellingGames(): View
    {
        $companies = Company::with(['games.items'])->get();

        $companies->each(function ($company) {
            // Mapping games to find most purchased
            $company->topSellingGames = $company->games->map(function ($game) {
                $totalPurchased = $game->getItems()->sum('quantity');
                $game->total_purchased = $totalPurchased;

                return $game;
            })->sortByDesc('total_purchased')->take(5);
        });


        $viewData = [];
        $viewData['companies'] = $companies;

        return view('company.topSellingGames')->with('viewData', $viewData);
    }
}