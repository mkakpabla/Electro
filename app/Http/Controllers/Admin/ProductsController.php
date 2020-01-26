<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{


    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $path = $request->file('cover')->store('products');
        Product::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'price' => $request->price,
            'details' => $request->details,
            'description' => $request->description,
            'cover' => '/uploads/' . $path
        ])->categories()->attach($request->category_id);
        toast('Le produit a ete ajouter avec success');
        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        toast('Le produit a ete supprimer', 'success', 'top-right');
        return back();
    }
}
