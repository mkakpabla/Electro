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

    public function store($id, Request $request)
    {
        $product = Product::find($id);
        if ($request->qty) {
            $qty = $request->qty;
        } else {
            $qty = 1;
        }
        $itemExist = Cart::search(function ($cartItem, $rowId) use($product) {
            return $cartItem->id === $product->id;
        });
        if ($itemExist->isNotEmpty()) {
            return [
                'msg' => 'Cet article se trouve déjà dans votre Panier.',
                'cart' => $this->cart(),
            ];
        }
        Cart::add($product->id, $product->name, $qty, $product->price)
            ->associate(Product::class);
        return [
            'msg' => 'Le produit à été ajouté au panier',
            'cart' => $this->cart(),
        ];
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

    private function cart()
    {
        $cart = [
            'subtotal' => Cart::subtotal(),
            'count' => Cart::instance('default')->count(),
        ];
        foreach (Cart::content() as $item) {
            $cart['items'][] = [
                'cover' => $item->model->cover,
                'name' => $item->name,
                'price' => $item->price,
                'qty' => $item->qty,
            ];
        }
        return $cart;
    }
}
