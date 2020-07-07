<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        // dd($products_getter);
        return view('product', ['products_list' => $products]);
    }
}
