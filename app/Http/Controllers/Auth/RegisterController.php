<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{


    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $request['token'] = str_random(60);
        $user = User::create($request->all());
        Mail::to($user)->send(new RegisterMail($user));
        return redirect()
            ->route('login.create');
    }

}
