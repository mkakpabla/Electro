@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <h2>Se connecter</h2>
            @include('layouts.flash')
            <div class="card p-3">
                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail">
                        {!! $errors->first('email', "<p class=\"text-danger\">:message</p>") !!}
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mot de passe">
                        {!! $errors->first('password', "<p class=\"text-danger\">:message</p>") !!}
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Maintenir ma session ouverte
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-2">Idetifier-vous</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-primary btn-block" href="{{ route('password.request') }}">

                        </a>
                    @endif
                    <hr>
                    <a class="btn btn-success btn-block" href="{{ route('register.create') }}">Creer votre compte eShopping</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
