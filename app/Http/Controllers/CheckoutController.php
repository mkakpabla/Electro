<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        try{
            Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'eur',
                'description' => 'Order',
                'source' => $request->stripeToken
            ]);
            Cart::instance('default')->destroy();
            return redirect()
                ->route('cart.index')
                ->with('success', 'Merci pour votre achat');
        } catch (Exception $e) {

        }
    }
}
