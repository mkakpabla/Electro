<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        if (\request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', \request()->category);
            })->get();
            $categories = Category::all();
        } else {
            $products = Product::all();
            $categories = Category::all();
        }

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
