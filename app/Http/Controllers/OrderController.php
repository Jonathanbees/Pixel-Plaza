<?php

namespace App\Http\Controllers;

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
}