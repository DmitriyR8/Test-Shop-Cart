@extends('layouts.app')

@section('content')
    <div class="wrapper">
    @include('header')
        <main>
            <div class = 'product-wrapper' id="all">
                <div class = 'left-arrow'></div>
                @foreach($products as $product)
                    <div class = 'products'>
                        <div class = 'opacity-for-image'></div>
                        <picture>
                            <source srcset = "{{'products/image/'.$product->id}}" type="image/webp">
                            <source srcset = "{{'products/image/'.$product->id}}" type="image/png">
                            <img src = "{{'products/image/'.$product->id}}">
                        </picture>
                        <div class = 'products-info'>
                            <p class = 'logo-name-product'>{{$product->title}}</p>
                            <span class = 'products-info-text'>{!! $product->description !!}</span>
                            <input type="hidden" id="product-id" value="{{$product->id}}">
                            <button class = 'button raised hoverable cart-add' type = 'submit'><div class = 'anim'></div>Add to Cart</button>
                        </div>
                    </div>
                @endforeach
                <div class = 'load-button'>
                    <button class = 'gray-btn' id="load-more"><span id="load-more-button">View more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.333" height="18.333" viewBox="0 0 18.333 18.333"><defs><style>.a{fill-rule:evenodd;}</style></defs><path class="a" d="M15.352,14.152a8.659,8.659,0,0,0,1.965-5.493h-.881a7.777,7.777,0,1,1-2.312-5.533l-.446.456,1.677.252-.288-1.672L14.74,2.5a8.659,8.659,0,1,0,.611,11.656Z" transform="translate(0.516 0.504)"></path></svg>
                    </button>
                </div>
            </div>
        </main>
    </div>
@endsection
