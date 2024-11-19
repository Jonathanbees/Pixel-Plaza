<?php

// Esteban, Samuel

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PartnersStoreController extends Controller
{
    // Por ejemplo así (leer lo de abajo primero)
    protected static $partnersServiceUri = 'http://partners-store.online:8000/api/products';

    public function index(): View
    {
        // No creo que sea buena idea ponerlo en el .env
        // tocaría mover varias cosas del dockerfile y el workflow de creación de la imagen.
        // Hasta toca ponerla como secreto en el repo. Mejor quémalo! (línea 14) - Esteban
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

        return view('partners-products.index')->with('viewData', $viewData);

    }
}
