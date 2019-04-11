<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

class ConfirmationController extends Controller
{



    public function store(User $user, $token)
    {
        if ($user->exists && $user->token === $token) {
            $user->update([
                'token' => null,
                'email_verified_at' => now()
            ]);
            return view('auth.confirmed');
        }

    }
}
