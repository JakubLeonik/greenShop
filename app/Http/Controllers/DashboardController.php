<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
    public function my_products(){
        $products = Product::all()->where('user_id', 'like', auth()->user()->id);
        return view('dashboard.my-products', [
            'products' => $products
        ]);
    }
    public function shopping_card(){
        return view('dashboard.shopping-card', [
            'orders' => Order::orderBy('created_at', 'desc')
                ->where('user_id', 'like', auth()->user()->id)
                ->where('status', 'like', 'in_card')
                ->paginate(10)
        ]);
    }
    public function submit_order(){
        $orders = Order::where('user_id', 'like', auth()->user()->id);
        foreach ($orders as $order){
            $order->status = 'bought';
            $order->save();
        }
        return redirect()->route('dashboard.shopping-card');
    }
}
