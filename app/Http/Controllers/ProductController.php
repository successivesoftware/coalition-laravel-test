<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();

        return view('product.get-product', ['products' => $products]); 
    }
    
    public function saveProducts(Request $request) {
        if ($request->product_name) {
		$data = [
                    'product_name' => $request->product_name,
                    'quantity'     => $request->quantity,
                    'price'        => $request->price,
		];
                $product = Product::create($data);
		return array_merge($data, [
                    'date'  => $product->created_at->format('m/d/Y H:i:s'),
                    'total' => $product->quantity * $product->price,
                ]);
	}
    }
}
