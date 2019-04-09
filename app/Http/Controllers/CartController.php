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

    public function store(Request $request)
    {
        $itemExist = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->id;
        });
        if ($itemExist->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('info', 'Cet article se trouve déjà dans votre Panier.');
        }

        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate(Product::class);
        return redirect()
            ->route('cart.index')
            ->with('success', 'Le produit a ete ajouter a votre panier');
    }

    public function update(Request $request, $rowdId)
    {
        Cart::update($rowdId, $request->qty);
        return redirect()
            ->route('cart.index')
            ->with('success', "L'article a ete mis a jour");
    }


    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()
            ->route('cart.index')
            ->with('success', 'Le produit a ete supprimer de votre panier');
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
