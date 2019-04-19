@extends('layouts.default')

@section('content')
    <div class="container mt-3">

        @include('layouts.flash')
            @if (Cart::count() > 0)
            <h2>Votre Panier({{ Cart::count() }} article)</h2>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantiter</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="qty" id="qty" class="form-control">
                                    <option value="1" {!! 1 == $item->qty ? 'selected' : '' !!}>1</option>
                                    <option value="2" {!! 2 == $item->qty ? 'selected' : '' !!}>2</option>
                                    <option value="2" {!! 3 == $item->qty ? 'selected' : '' !!}>3</option>
                                </select>
                            </form>
                        </td>
                        <td>EUR {{ number_format($item->subtotal, 2, '.', ' ') }}</td>
                        <td>
                            <form style="display: inline;" action="{{ route('cart.destroy', $item->rowId) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            <form style="display: inline;" action="{{ route('cart.later', $item->rowId) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm">Mettre de cote</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                <div class="jumbotron">
                    <table>
                        <tr>
                            <td>Subtotal: </td>
                            <td>EUR {{ number_format(Cart::subtotal(), 2, '.', ' ') }}</td>
                        </tr>
                        <tr>
                            <td>Tax: </td>
                            <td>EUR {{ number_format(Cart::tax(), 2, '.', ' ') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total:</strong> </td>
                            <td><strong>EUR {{ number_format(Cart::total(), 2, '.', ' ') }}</strong></td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceder au payement</a>
            @else
                <h2>Votre panier</h2>
                <div class="alert alert-info">
                    Votre Panier est vide
                </div>
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Aller a la boutique</a>
            @endif
        @if (Cart::instance('later')->count() > 0)
            <h2 class="mt-5">Enregistré pour plus tard ({{ Cart::instance('later')->count() }} article)</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantiter</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Cart::instance('later')->content() as $item)
                    <tr>
                        <th scope="row">{{ $item->name }}</th>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>
                            <form style="display: inline;" action="{{ route('cart.laterDestroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            <form style="display: inline;" action="{{ route('cart.laterToCart', $item->rowId) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm">Deplacer dans le panier</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop

@section('script')
    <script>
        let qties = document.querySelectorAll('#qty');
        qties.forEach(function (qty) {
            qty.addEventListener('change', function () {
                this.parentNode.submit()
            })
        })
    </script>
@stop
