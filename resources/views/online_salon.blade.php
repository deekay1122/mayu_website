@extends('layouts.layout')

@section('content')
    <p>Online Salon</p>
    <div class="paypal_subscription_container">
        <div class="paypal_subscription" id="paypal-button-container-P-5P000947JX925431MMDC5CYI"></div>
    </div>
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script> 
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
          plan_id: "{{ env('PAYPAL_SANDBOX_SUBSCRIPTION_PLAN_ID') }}"
        });
      },
      onApprove: function(data, actions) {
        alert(data.subscriptionID); // You can add optional success message for the subscriber here
      }
  }).render('#paypal-button-container-P-5P000947JX925431MMDC5CYI'); // Renders the PayPal button
</script>
@endsection