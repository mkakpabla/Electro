<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->put('url', url()->previous());
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $auth = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($auth) {
            $uri = str_replace(url('/'), '', session()->get('url', '/'));
            return redirect($uri)
                ->with('success', 'Vous etes connecter avec success');
        }
        return back()
            ->with('error','Identifiant ou mot de passe incorrecte');
        
    }

    public function logout()
    {
        auth()->logout();
        return redirect()
            ->route('shop.index')
            ->with('success', 'Vous etee maintenant deconnecter');
    }

}
