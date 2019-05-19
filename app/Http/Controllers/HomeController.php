<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;


class HomeController extends Controller
{


    public function index()
    {
        $newProducts = Product::all()->take(60);
        return view('home', compact('products'));
    }

}
