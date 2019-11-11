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
                        <div id="products-store" class="products-tabs">
                            <!-- tab -->
                            @foreach($categories as $key => $category)
                            <div id="{{ $category->slug }}" class="tab-pane {!! $key == 1 ? 'active' : '' !!}">
                                <div class="products-slick" data-nav="#slick-nav-{{ $key }}">
                                    <!-- product -->
                                    @foreach ($category->products->take(6) as $product)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ $product->cover }}" alt="" width="263" height="263">
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
                                                    <a href="#" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter aux favoris</span></a>
                                                    <a href="/cart/{{ $product->id }}/store" class="add-to-cart-btn add-to-compare"><i class="fa fa-shopping-cart"></i></a>
                                                    <a href="{{ route('product.show', $product) }}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></a>
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
                <!-- Products tab & slick -->
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
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter aux favoris</span></a>
                                                <a href="/cart/{{ $product->id }}/store" class="add-to-cart-btn add-to-compare"><i class="fa fa-shopping-cart"></i></a>
                                                <a href="{{ route('product.show', $product) }}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></a>
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
