@extends('layouts.electro')

@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                @foreach($categories as $category)
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ $category->cover }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Collection<br>{{ $category->name }}</h3>
                            <a href="{{ route('shop.index') }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Nos nouveau produits</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $key => $category)
                                <li class="{!! $key == 1 ? 'active' : '' !!}"><a data-toggle="tab" href="#{{ $category->slug }}">{{ $category->name }}</a></li>
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
                            <div id="{{ $category->slug }}" class="tab-pane {!! $key == 1 ? 'active' : '' !!}">
                                <div class="products-slick" data-nav="#slick-nav-{{ $key }}">
                                    <!-- product -->
                                    @foreach ($category->products->take(6) as $product)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ $product->cover }}" alt="">
                                            <div class="product-label">
                                                <!--<span class="sale">-30%</span>-->
                                                <span class="new">Nouveau</span>
                                            </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $category->name }}</p>
                                                <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                                <h4 class="product-price">{{ $product->price }} FCFA</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="{{ route('cart.store', $product) }}" method="POST">
                                                    @csrf
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                                </form>
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
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
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
                                            <img src="{{ $product->cover }}" alt="">
                                            <!--<div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>-->
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $category->name }}</p>
                                            <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">{{ $product->price }} FCFA</h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form action="{{ route('cart.store', $product) }}" method="POST">
                                                @csrf
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                            </form>
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
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@stop
