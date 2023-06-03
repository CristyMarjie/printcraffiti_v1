<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve all products from the database
        $products = \App\Models\Product::all();
        // Return the 'home' view with the products data
        return view('home', ['products' => $products]);
    }
}
