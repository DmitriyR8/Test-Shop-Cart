@extends('layouts.shipping')


@section('content')
    <div class="wrapper">
        @include('header')
        <main>
            <div class="container">
                <form id="order-create">
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" placeholder="Your name..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Your email..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="address">Address</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="address" name="address" placeholder="Your address..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="phone" name="phone" placeholder="Your phone..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Shipping options</label>
                        </div>
                        <div class="col-75">
                            <select id="country" name="country">
                                @foreach($shippings as $shipping)
                                <option value={{$shipping->title}}>{{$shipping->title}}</option>
                                @endforeach
                                <input type="hidden" id="id" value={{$shipping->id}} />
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class = 'header-logo'>
                        <span class="menu">{{$totalPrice + $shippingPrice}} $</span>
                    </div>
                    <div class="buy-button">
                        <button class = 'button raised hoverable' form="order-create">
                            <div class = 'anim'></div>
                            <h1 class="header-logo">Order now</h1>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
