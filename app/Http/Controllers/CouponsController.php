<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponsController extends Controller
{


    public function store(Request $request)
    {
        $coupon = Coupon::whereCode($request->code)->first();
        if (!$coupon) {
            return back()
                 ->with('error', 'Code Promo Invalide');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal())
        ]);
        return back()
            ->with('success', 'Code Promo Appliquer');
    }

    public function destroy()
    {
        session()->forget('coupon');
        return back()
            ->with('success', 'Code Promo Enlever');
    }

}
