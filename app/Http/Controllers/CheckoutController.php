<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderMail;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{


    public function index()
    {
        return view('checkout.index');
    }

    public function store(CheckoutRequest $request)
    {
        try{
            Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'eur',
                'description' => 'Order',
                'source' => $request->stripeToken
            ]);

            // Sauvegarde des achats dans la base de donner
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'billing_name' => $request->name,
                'billing_email' => $request->email,
                'billing_subtotal' => Cart::subtotal(),
                'billing_tax' => Cart::tax(),
                'billing_total' =>Cart::total(),
                'address_country' => $request->address_country
            ]);

            foreach (Cart::content() as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'qty' => $item->qty
                ]);
            }

            Mail::to($order->billing_email)->send(new OrderMail($order));

            Cart::instance('default')->destroy();
            return redirect()
                ->route('cart.index')
                ->with('success', 'Merci pour votre achat');
        } catch (Exception $e) {

        }
    }
}
