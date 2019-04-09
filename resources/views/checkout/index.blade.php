@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        @include('layouts.flash')
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Votre panier</span>
                    <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach(Cart::content() as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $item->name }}</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">{{ $item->price }}</span>
                    </li>
                    @endforeach
                </ul>
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal (EUR)</span>
                        <strong>{{ Cart::subtotal() }}</strong>
                    </li>
                    @if (session()->get('coupon'))
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 style="display: inline" class="my-0">Promo code</h6>
                                <form  style="display: inline" action="{{ route('coupon.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="font-size: 14px" class="btn btn-danger btn-sm">supprimer</button>
                                </form>
                                <small>{{ session()->get('coupon')['name'] }}</small>
                            </div>
                            <span class="text-success">-{{ session()->get('coupon')['discount'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>New Subtotal (EUR)</span>
                            <strong>stuff</strong>
                        </li>
                    @endif

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tax(13%)</span>
                        <strong>{{ Cart::tax() }}</strong>
                    </li>
                </ul>
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (EUR)</span>
                        <strong>{{ Cart::total() }}</strong>
                    </li>
                </ul>
                <form class="card p-2" method="POST" action="{{ route('coupon.store') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code"name="code">
                        @csrf
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Appliquer</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Informations</h4>
                <form action="{{ route('checkout.store') }}" id="payment-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input id="name" name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="card-element">
                            Carte de credit
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <button id="payment-btn" type="submit" class="btn btn-success">Effectuer le payement</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('/js/stripe.js') }}"></script>
@stop
