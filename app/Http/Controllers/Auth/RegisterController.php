<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{


    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'token' => str_random(60),
           'password' => Hash::make($request->password)
        ]);
        Mail::to($user)->send(new RegisterMail($user));
        return redirect()
            ->route('login.create');
    }

}
