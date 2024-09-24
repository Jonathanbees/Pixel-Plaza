<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Item;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Order::where('custom_user_id', Auth::id())->get();
        $viewData['success'] = session('viewData.success');

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $order = Order::where('custom_user_id', Auth::id())->findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = 'Order';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['order'] = $order;
        $viewData['items'] = $order->getItems();

        return view('order.show')->with('viewData', $viewData);
    }

    public function create(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('game.shoppingCart')->with('viewData', ['success' => 'Your cart is empty.']);
        }

        $order = new Order;
        $order->setCustomUser(Auth::user());
        $order->setTotalPrice(0);
        $order->save();

        $totalPrice = 0;
        foreach ($cart as $gameId) {
            $game = Game::findOrFail($gameId);
            $item = new Item;
            $item->setOrder($order);
            $item->setGame($game);
            $item->setQuantity(1);
            $item->setPrice($game->getPrice());
            $item->save();

            $totalPrice += $game->getPrice();
        }

        $order->setTotalPrice($totalPrice);
        $order->save();

        session()->forget('cart');

        return redirect()->route('order.index')->with('viewData', ['success' => 'Order created successfully!']);
    }
}
