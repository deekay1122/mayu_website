@extends('layouts.layout')

@section('content')
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID')}}&currency={{ env('PAYPAL_CURRENCY') }}">
</script>
@if (!session('cart'))
    <h1>No items in cart</h1>
@else
    @php
        $total = 0;
        $purchasedBeforeFlag = 0;
    @endphp
    @foreach (session('cart') as $item)
    <h2>{{ $item['name'] }} {{ $item['price'] }}
        @if (in_array($item['itemId'], $purchasedItemIds))
            @php
                $purchasedBeforeFlag += 1;
            @endphp
            you own this item 
            @endif
            <a href="/shop/remove_from_checkout/{{ $item['itemId']}}">delete from cart</a>
    </h2>
        @php
            $total += $item['price'];
        @endphp
    @endforeach
    <h2>Total {{ $total }}</h2>
    @if ($purchasedBeforeFlag == 0)
    <div id="paypal-button-container"></div>
    @endif
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: "{{ $total }}"
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                var paymentId = details["id"];
                var payerID = details["payer"]["payer_id"];
                return actions.redirect(`http://127.0.0.1:8000/store_order?paymentId=${paymentId}&payerID=${payerID}`);
            });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
        </script>
@endif
@endsection