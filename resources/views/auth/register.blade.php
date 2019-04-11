@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <h2>Créer un compte</h2>
            <div class="card p-3">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nom">
                        {!! $errors->first('name', "<p class='text-danger'>:message</p>") !!}
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail">
                        {!! $errors->first('email', "<p class='text-danger'>:message</p>") !!}
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mot de passe">
                        {!! $errors->first('password', "<p class='text-danger'>:message</p>") !!}
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Re: Mot de passe</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re: Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Creer votre compte eShopping</button>
                </form>
                <hr>
                <p>Vous possédez déjà un compte ? <a href="{{ route('login.create') }}">Identifiez-vous</a></p>
            </div>
        </div>
    </div>

</div>
@endsection
