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
            toast('Vous etes connecter avec success', 'success', 'top-right');
            return redirect($uri);
        }
        toast('Identifiant ou mot de passe incorrecte', 'error', 'top-right');
        return back();
        
    }

    public function logout()
    {
        auth()->logout();
        toast('Vous etes maintenant deconnecter', 'success', 'top-right');
        return redirect()
            ->route('login.create');
    }

}
