@extends('layouts.layout')

@section('content')
<div class="products_div">
    @foreach ($products as $product)
        <div class="product">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p><a href="/shop/add_to_cart/{{ $product->id }}">{{ $product->price }}円</a></p>
        </div>
    @endforeach
</div>
@endsection


