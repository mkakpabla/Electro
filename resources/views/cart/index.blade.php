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
                                <select name="qty" class="qty form-control" style="width: 70px; display: inline">
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
        @if (Cart::instance('later')->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-size: 20px; font-weight: lighter">Mise de coté pour plus tard</h1>
                    <hr style="margin-top: 0">
                    @foreach(Cart::instance('later')->content() as $item)
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
                                <form style="display: inline;" action="{{ route('cart.laterDestroy', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                                <form style="display: inline;" action="{{ route('cart.laterToCart', $item->rowId) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary btn-sm">Deplacer dans le panier</button>
                                </form>
                            </div>
                        </div>
                        <hr style="margin-top: 0">
                    @endforeach
                </div>
            </div>
        @endif

        <div class="row">
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">

                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title">Meilleurs ventes</h3>
                                <div class="section-nav">
                                    <ul class="section-tab-nav tab-nav">
                                        @foreach($categories as $key => $category)
                                            <li class="{!! $key == 1 ? 'active' : '' !!}"><a data-toggle="tab" href="#{{ $category->slug }}2">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /section title -->

                        <!-- Products tab & slick -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="products-tabs">
                                    <!-- tab -->
                                    @foreach($categories as $key => $category)
                                        <div id="{{ $category->slug }}2" class="tab-pane fade in {!! $key == 1 ? 'active' : '' !!}">
                                            <div class="products-slick" data-nav="#slick-nav-{{ $key }}">
                                                <!-- product -->
                                                @foreach ($category->products as $product)
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="{{ $product->cover }}" alt="" width="263" height="263">
                                                            <!--<div class="product-label">
                                                                <span class="sale">-30%</span>
                                                                <span class="new">NEW</span>
                                                            </div>-->
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">{{ $category->name }}</p>
                                                        <h3 class="product-name"><a href="{{ route('product.show', $product)}}">{{ $product->name }}</a></h3>
                                                            <h4 class="product-price">{{ $product->price }} FCFA</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div>
                                                                <button class="button fa fa-shopping-cart"> Ajouter au panier</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                            <!-- /product -->
                                            </div>
                                        <!--<div id="slick-nav-{{ $key }}" class="products-slick-nav"></div>-->
                                        </div>
                                @endforeach
                                <!-- /tab -->
                                </div>
                            </div>
                        </div>
                        <!-- /Products tab & slick -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        let qties = document.querySelectorAll('.qty');
        qties.forEach(function (qty) {
            qty.addEventListener('change', function () {
                this.parentNode.submit()
            })
        })
    </script>
@stop
