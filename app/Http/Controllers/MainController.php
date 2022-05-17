<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function __invoke(){
        return view('main.index', [
            'products' => Product::latest()->take(6)->get(),
            'categories' => Category::all()
        ]);
    }
}
