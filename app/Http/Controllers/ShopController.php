<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        return view('shop.index', [
            'products' => Product::latest()->take(6)->get(),
            'categories' => Category::all()
        ]);
    }
    public function dashboard(){
        return view('shop.dashboard');
    }
}
