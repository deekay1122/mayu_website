@extends('layouts.layout')
@section('title', 'Subscribe Book Club')
@section('content')
<div class="subscription_title">
    ブッククラブのご購入
</div>
<div class="paypal_subscription_container">
    <div class="paypal_subscription" id="paypal-button-container"></div>
</div>        
<script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.sandbox_client_id') }}&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script> 
<script>
  paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'subscribe'
      },
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          /* Creates the subscription */
          plan_id: "{{ config('services.paypal.sandbox_subscription_plan_id') }}"
          
        });
      },
      onApprove: function(data, actions) {
        console.log(data);
        let subscriptionId = data.subscriptionID;
        return actions.redirect(`https://mayu1111.com/store_subscription?subscriptionID=${subscriptionId}`);
        
            // alert(data.subscriptionID);  You can add optional success message for the subscriber here

          
      }
  }).render('#paypal-button-container'); // Renders the PayPal button
</script>
@endsection