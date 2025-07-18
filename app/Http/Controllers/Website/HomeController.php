<?php

namespace App\Http\Controllers\Website;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::all();
        return view('website.index', compact('products','sliders'));
    }

 
}
