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
            $products = Product::with('category')->whereHas('category', function ($query){
                $query->where('slug', \request()->category);
            })->paginate(10);
            $categories = Category::all();
        } else {
            $products = Product::with('category')->paginate(6);
            $categories = Category::all();
        }
        return view('products.index', compact('products', 'topSelling', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->q. '%')
            ->orWhere('slug', 'like', '%'.$request->q. '%')
            ->paginate(5);
        return view('search.index', compact('products'));
    }


    public function filter(Request $request)
    {
        if (empty($request->categories)) {
            $products = Product::with('category')->paginate(6);
            return ['products' => view('products.card', compact('products'))->__toString()];
        } else {
            $products = Product::with('category')
                ->whereIn('category_id', array_values($request->categories))
                ->paginate(6);
                return ['products' => view('products.card', compact('products'))->__toString()];
        }

    }
}
