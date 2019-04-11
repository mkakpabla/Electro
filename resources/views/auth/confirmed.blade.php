@extends('layouts.auth')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div>
                    <img src="{{ asset('/images/confirmed.png') }}" alt="" height="150">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <h2>Votre compte a ete valider</h2>
            </div>
        </div>
    </div>
@endsection
