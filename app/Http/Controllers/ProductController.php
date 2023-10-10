<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ["products" => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'], // Validate as decimal with 2 decimal places
            'description' => 'nullable'
        ]);

        try {
            $newProduct = Product::create($data);
            return redirect(route('product.index'));
        } catch (\Throwable $th) {
            // Handle the error, you can log it or return an error response
            return back()->withInput()->withErrors(['error' => 'Product creation failed']);
        }
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'], // Validate as decimal with 2 decimal places
            'description' => 'nullable'
        ]);
        $product->update($data);
        return redirect(route('products.index'))->with('seccess', "Product Updated Seccesseffuly");
    }

    
}
