@extends('layouts.default')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-4">
                <h3>Par Categorie</h3>
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <!--<div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Cras justo odio
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                </div>-->
            </div>
            <div class="col-sm-8">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="/images/pc.jpg" alt="" class="card-img-top" width="100">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                    </h6>
                                    <h6 class="text-primary">EUR {{ number_format($product->price, 2, '.', ' ') }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
