<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function __invoke(){
        $products = Product::all()->where('user_id', 'like', auth()->user()->id);
        return view('dashboard.index', [
            'products' => $products
        ]);
    }
}
