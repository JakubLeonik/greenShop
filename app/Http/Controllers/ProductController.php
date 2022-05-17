<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\SearchService;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    public function index()
    {
        $products_query = $this->search(request('search'), request('category'));
        $products = $products_query->paginate(10);
        return view('products.index', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }
    public function create()
    {
        $this->authorize('create', Product::class);
        return view('products.create',[
            'categories' => Category::all()
        ]);
    }
    public function store()
    {
        $this->authorize('create', Product::class);
        $atributes  = request()->validate([
            'title' => ['required', Rule::unique('products', 'title')],
            'description' => 'required',
            'price' => ['numeric', 'required'],
            'category_id' => ['numeric', 'required']
        ]);
        $atributes['user_id'] = auth()->user()->id;

        $product = Product::create($atributes);
        return redirect()->route('products.show', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }
    public function show(Product $product)
    {
        return view('products.show', [
           'product' => $product,
           'categories' => Category::all()
        ]);
    }
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }
    public function update(Product $product)
    {
        $this->authorize('update', $product);
        $atributes  = request()->validate([
            'title' => ['required', Rule::unique('products', 'title')->ignore($product->id)],
            'description' => 'required',
            'price' => ['numeric', 'required'],
            'category_id' => ['numeric', 'required']
        ]);
        Product::find($product->id)->update($atributes);
        return redirect()->route('products.show', ['product' => $product->id]);
    }
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('dashboard.index');
    }
    //search for product
    public function search($key, $category){
        return Product::latest()
            ->when($key ?? false && $key !== '', function($query) use($key){
            $query->where(function ($query) use($key){
                    $query->where('title', 'like', '%'.$key.'%')
                    ->orWhere('description', 'like', '%'.$key.'%');
                });
            })
            ->when(($category ?? false ? true : false) && (strcmp($category, "all") != 0) , function($query) use($category){
            $query->where('category_id', 'like', $category);
        });
    }
}
