<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::orderBy('created_at', 'desc')
                ->paginate(10)
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
           'product_id' => ['required', 'integer', Rule::exists('products', 'id')]
        ]);
        Order::create([
            'user_id' => auth()->user()->id,
            'product_id' => $attributes['product_id'],
            'status' => 'in_card'
        ]);
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('dashboard.shopping-card');
    }
}
