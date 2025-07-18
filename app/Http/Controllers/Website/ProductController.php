<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('website.products',compact('products'));
    }
    public function showProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('website.show',compact('product'));
    }
    public function getProductsByCatId($id)
    {
        $products = Product::with('images')->where('category_id', $id)->get();
        return view('website.products', compact('products'));
    }
}
