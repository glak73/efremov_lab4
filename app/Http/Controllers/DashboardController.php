<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $products = Product::all();
        $orders = Order::all();
        return view('dashboard', ['products' => $products, 'orders' => $orders]);
    }
}
