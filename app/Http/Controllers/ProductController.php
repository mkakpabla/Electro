<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        if($request->categories || $request->min || $request->max) {
            $products = Product::with('category')
                ->whereIn('category_id', array_values($request->categories))
                ->paginate(6);
            $categories = Category::all();
        }
        if($request->ajax()) {
            return ['products' => view('products.card', compact('products'))->__toString()];
        }
        $products = Product::with('category')->paginate(6);
        $categories = Category::all();
        return view('products.index', compact('products', 'topSelling', 'categories'));
    }

    public function category($category)
    {
        $products = Product::with('category')->whereHas('category', function ($query) use ($category){
            $query->where('slug', $category);
        })->paginate(8);
        $category = Category::whereSlug($category)->first();
        return view('products.category', compact('products', 'category', 'categories'));
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
}
