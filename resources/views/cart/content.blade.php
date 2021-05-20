@extends('layouts.cart')

@section('content')
    <div class="wrapper">
        @include('header')
        <main>
            <div class = 'container'>
                <div class = 'main-wrapper'>
                    <div class = 'cart-products main-products'>
                        <div class = 'left-arrow'></div>
                        @foreach($products as $product)
                            <div class = 'cart-product'>
                                <div class = 'logo-name-product'>
                                        <picture>
                                            <source srcset = "{{'products/image/'.$product->id}}" type="image/webp">
                                            <source srcset = "{{'products/image/'.$product->id}}" type="image/png">
                                            <img class = 'header-product-img' src = '{{'products/image/'.$product->id}}'>
                                        </picture>
                                    </a>
                                </div>
                                <p class = 'logo-name-product'>{{$product->title}}</p>
                                <input type="hidden" id="product-id" value="{{$product->id}}">
                                <div class="controls">
                                    <div class="control" id="remove" type = 'submit'>-</div>
                                    <div>
                                        {{$product->total}}
                                    </div>
                                    <div class="control" id="add" type = 'submit'>+</div>
                                </div>
                                <p class = 'logo-name-product '>{{$product->price}} $</p>
                                    <button class = 'button raised hoverable' id="trash" type = 'submit'>
                                        <div class = 'anim'></div>
                                        Trash product
                                    </button>
                            </div>
                        @endforeach
                        <div class = 'header-logo'>
                            <span class="menu">{{$totalPrice}} $</span>
                        </div>
                        <div class="buy-button">
                            <button class = 'button raised hoverable' id="shipping-redirect">
                                <div class = 'anim'></div>
                                <h1 class="header-logo">Checkout</h1>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
