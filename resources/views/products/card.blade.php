@foreach($products as $product)
    <!-- product -->
    <div class="col-md-4 col-xs-6">
        <div class="product">
            <div class="product-img">
                <img class="product-cover" src="{{ $product->cover }}" alt="" width="263" height="263">
                <!--<div class="product-label">
                        <span class="sale">-30%</span>
                        <span class="new">NEW</span>
                    </div>-->
            </div>
            <div class="product-body">
                <p class="product-category">{{ $product->category->name }}</p>
                <h3 class="product-name"><a href="{{ route('product.show', $product)}}">{{ $product->name }}</a></h3>
                <h4 class="product-price">{{ $product->price }}</h4>
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
    </div>
    <!-- /product -->
@endforeach
