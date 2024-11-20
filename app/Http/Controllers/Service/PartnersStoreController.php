<?php

// Esteban, Samuel

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PartnersStoreController extends Controller
{
    // Por ejemplo así (leer lo de abajo primero)
    protected static $partnersServiceUri = 'http://34.31.28.251/public/api/products';

    public function index(): View
    {

        $response = Http::get(self::$partnersServiceUri);
        $products = $response->json()['data'];

        $viewData = [];
        $viewData['products'] = $products;

        return view('partners-products.index')->with('viewData', $viewData);

    }
}
