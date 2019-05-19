<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $items = Cart::content();
        return view('cart.index', compact('items'));
    }

    public function store(Product $product, Request $request)
    {
        if ($request->qty) {
            $qty = $request->qty;
        } else {
            $qty = 1;
        }
        $itemExist = Cart::search(function ($cartItem, $rowId) use($product) {
            return $cartItem->id === $product->id;
        });
        if ($itemExist->isNotEmpty()) {
            toast('Cet article se trouve déjà dans votre Panier.','info','top-right');
            return redirect()
                ->route('cart.index');
        }

        Cart::add($product->id, $product->name, $qty, $product->price)
            ->associate(Product::class);
        toast('Le produit a ete ajouter a votre panier','success','top-right');
        return redirect()
            ->route('cart.index');
    }

    public function update(Request $request, $rowdId)
    {
        Cart::update($rowdId, $request->qty);
        toast('L\'article a ete mis a jour','success','top-right');
        return redirect()
            ->route('cart.index');
    }


    public function destroy($rowId)
    {
        Cart::remove($rowId);
        toast('Le produit a ete supprimer de votre panier','info','top-right');
        return redirect()
            ->route('cart.index');
    }

    public function later($rowId)
    {
        $item = Cart::get($rowId);
        Cart::remove($rowId);
        Cart::instance('later')->add($item->id, $item->name, 1, $item->price)
            ->associate(Product::class);
        return redirect()
            ->route('cart.index')
            ->with('info', 'L\'article a ete enregistré pour plus tard');
    }

    public function laterToCart($rowId)
    {
        $item = Cart::instance('later')->get($rowId);
        Cart::instance('later')->remove($rowId);
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate(Product::class);
        return redirect()
            ->route('cart.index')
            ->with('info', 'L\'article a ete ajouter a votre panier');
    }

    public function laterDestroy($rowId)
    {
        Cart::instance('later')->remove($rowId);
        return redirect()
            ->route('cart.index')
            ->with('success', 'Le produit a ete supprimer de votre panier enregistrer');
    }
}
