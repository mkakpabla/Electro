<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $items = Cart::content();
        $categories = Category::all();
        return view('cart.index', compact('items', 'categories'));
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
            if ($request->ajax()) {
                return [
                    'msg' => 'Cet article se trouve déjà dans votre Panier.',
                    'cart' => $this->cart(),
                ];
            } else {
                return redirect()
                    ->route('cart.index');
            }
        }
        Cart::add($product->id, $product->name, $qty, $product->price)
            ->associate(Product::class);
        if ($request->ajax()) {
            return [
                'msg' => 'Le produit à été ajouté au panier',
                'cart' => $this->cart(),
            ];
        } else {
            session()->flash('success', "L'article a été ajouté au panier");
            return redirect()
                ->route('cart.index');
        }

    }

    public function update(Request $request, $rowdId)
    {
        Cart::update($rowdId, $request->qty);
        session()->flash('success', 'L\'article a été mis à jour');
        return redirect()
            ->route('cart.index');
    }

    public function destroy($rowId)
    {
        if (\request()->ajax()) {
            Cart::remove($rowId);
            return $this->cart();
        } else {
            Cart::remove($rowId);
            session()->flash('success', "L'article a été supprimé du panier");
            return redirect()
                ->route('cart.index');
        }

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
                'id' => $item->id,
                'rowId' => $item->rowId,
                'name' => $item->name,
                'price' => $item->price,
                'qty' => $item->qty,
                'cover' => $item->model->cover,
            ];
        }
        return $cart;
    }
}
