<?php

// Esteban, Samuel

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Http;


class PartnersStoreController extends Controller
{
    public function index(): View
    {
        $baseUrl = env('PARTNERS_SERVICE_URI');

        //$response = Http::get($baseUrl . 'api/products');
        //$products = $responseFake->json()['data'];

        $responseFake = '{
            "data": [
                {
                    "id": 1,
                    "name": "Airpods",
                    "description": "Pro",
                    "price": 400,
                    "warranty": 4,
                    "image_url": "https://cdn.revendo.com/media/50/61/03/1697580367/apple-airpods-pro-2-generation-weiss-guenstig-gebraucht-kaufen-00.png.png"
                },
                {
                    "id": 2,
                    "name": "Sony Noise Cancelling Headphones",
                    "description": "WH-1000XM4",
                    "price": 350,
                    "warranty": 1,
                    "image_url": "https://media.wired.com/photos/5f2b2e792f0075bf6e0a1de6/master/pass/Gear-Sony-WH-1000XM4-1-SOURCE-Sony.jpg"
                }
            ]
        }';
        $decodedFakeResponse = json_decode($responseFake, true);
        
        $products = $decodedFakeResponse['data'];

        $viewData = [];
        $viewData['products'] = $products;

        //dd($viewData);

        return view('partners-products.index') -> with('viewData', $viewData); 

    }
}
