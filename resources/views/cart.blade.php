@extends('layouts.layout')

@section('content')
@if (!session('cart'))
    <h1>No items in cart</h1>
@else
    <h1>Your items in cart</h1>
    @php
        $total = 0;
    @endphp
    @foreach (session('cart') as $item)
        <h2>{{ $item['name'] }} ¥{{ $item['price']}}
            <a href="/shop/remove_from_cart/{{ $item['itemId'] }}">delete from cart</a>
        </h2>
        @php
            $total += $item['price'];
        @endphp
    @endforeach
    <h2>
        ¥{{ $total }}
    </h2>
    <a href="/shop/checkout">Checkout</a>
@endif
@endsection