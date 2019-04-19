@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('product.search') }}">
                    <div class="row mb-3">
                        <div class="col pl-0">
                            <input value="{{ request('q') }}" name="q" type="text" class="form-control" placeholder="Recherche...">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary">Recherche</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3>Resultats de la recherche</h3>
                    @foreach($products as $product)
                        <div class="card w-100 p-3 mb-5">
                            <div class="media">
                                <img class="media-left" alt="Image" width="200" src="/images/pc.jpg">
                                <div class="media-body ml-3">
                                    <h4 class="card-title">
                                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                    </h4>
                                    <h6 class="text-primary">EUR {{ number_format($product->price, 2, '.', ' ') }}</h6>
                                    <p class="card-text">{{ $product->details }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
