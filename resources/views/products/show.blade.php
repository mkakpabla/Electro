@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ $product->cover }}" alt="" width="350">
                <div class="img-group mt-1">
                    <a class="img-item" href="">
                        <img src="/images/pc.jpg" alt="" width="80">
                    </a>
                    <a class="img-item" href="">
                        <img src="/images/casque.jpg" alt="" width="80">
                    </a>
                    <a class="img-item" href="">
                        <img src="/images/pc.jpg" alt="" width="80">
                    </a>
                    <a class="img-item" href="">
                        <img src="/images/pc.jpg" alt="" width="80">
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->details }}</p>
                <h2>EUR {{ $product->price }}</h2>

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <h2>Description</h2>
                <p class="text-justify">{{ $product->description }}</p>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="/js/product-js.js"></script>
@stop

