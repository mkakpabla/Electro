@extends('layouts.electro')

@section('content')
    <div class="container mt-5" style="margin-top: 20px">
        @if (Cart::count() > 0)
            @include('layouts.flash')
            <div class="row">
            <div class="col-md-12">
                <h1 style="font-size: 20px; font-weight: lighter">Votre Panier</h1>
                <hr style="margin-top: 0">
                @foreach($items as $item)
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ $item->model->cover }}" alt="" height="150">
                        </div>
                        <div class="col-md-8" style="padding-left: 50px">
                            <h2 style="font-size: 18px">
                                <a href="">{{ $item->name }}</a>
                            </h2>
                            <p class="text-muted">{{ $item->model->category->name }}</p>
                            <h1 style="font-size: 18px">Prix: EUR {{ number_format($item->subtotal, 2, '.', ' ') }}</h1>
                            <form  style="display: inline;" action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="qty" id="qty" class="form-control" style="width: 70px; display: inline">
                                    <option value="1" {!! 1 == $item->qty ? 'selected' : '' !!}>1</option>
                                    <option value="2" {!! 2 == $item->qty ? 'selected' : '' !!}>2</option>
                                    <option value="2" {!! 3 == $item->qty ? 'selected' : '' !!}>3</option>
                                </select>
                            </form>
                            <form style="display: inline;" action="{{ route('cart.delete', $item->rowId) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            <form style="display: inline;" action="{{ route('cart.later', $item->rowId) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm">Mettre de cote</button>
                            </form>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                @endforeach
            </div>
        </div>
            <div class="row" style="margin-bottom: 40px">
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
        </div>
        @else
            <h1 style="font-size: 20px; font-weight: lighter">Votre Panier</h1>
            <hr style="margin-top: 0">
            <div class="alert alert-info">
                Votre Panier est vide
            </div>
        @endif
    <!--


            @if (Cart::count() > 0)
            <h2>Votre Panier({{ Cart::count() }} article)</h2>


                </div>

            @else

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
        -->
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
