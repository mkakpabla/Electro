@component('mail::message')
# Achats

Liste de vos achats


    | Nom                       | Prix             | Quantiter                  |
    | :-------------------------| :-------------:  | -------------------------: |
@foreach($order->products as $product)
    | {{ $product->name }} | {{ $product->price }} | {{ $product->pivot->qty }} |
@endforeach

@component('mail::button', ['url' => route('shop.index')])
eShopping
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
