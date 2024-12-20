<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Store;  

class ProductController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request, Store $store)
    {
        $store->products()->create([
            'name' => $name = $request->name,
            'slug' => str($name)->slug(),
            'price' => $request->price,
        ]);

        return back();
    }

   
    public function show(Store $store, Product $product)
    {
        return $product;
    }

    
    public function edit(Product $product)
    {
        //
    }

    
    public function update(Request $request, Product $product)
    {
        //
    }

    
    public function destroy(Product $product)
    {
        //
    }
}
