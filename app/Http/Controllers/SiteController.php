<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('site.index', compact('products'));
    }
}
