@extends('layouts.layout')
@section('content')
<div class="your_items">
    <p>オンラインサロン参加状況</p>
    <div class="online_salon_status">
        @if ($subscription == null)
            <p>未参加　下記ボタンからお申し込みください</p>
            <div class="paypal_subscription_container">
                <div class="paypal_subscription" id="paypal-button-container-P-5P000947JX925431MMDC5CYI"></div>
            </div>        
        @elseif ($subscription->status == null or $subscription->status == "APPROVAL_PENDING" or $subscription->status == "APPROVED")
            <p>参加お申し込みの処理中</p>
        @elseif ($subscription->status == "SUSPENDED")
            <p>参加は停止中です。管理者にお問い合わせください。</p>
        @elseif ($subscription->status == "CANCELLED")
            <p>参加はキャンセルされております。再度お申し込みください。</p>
            <div class="paypal_subscription_container">
                <div class="paypal_subscription" id="paypal-button-container-P-5P000947JX925431MMDC5CYI"></div>
            </div> 
        @else
            <p>参加中</p>
        @endif
        @endif

        
    </div>
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
          
        var subscriptionId = data.subscriptionID;
        return actions.redirect(`https://mayu1111.com/store_subscription?subscriptionID=${subscriptionId}`);
        alert('Hi');
            // alert(data.subscriptionID);  You can add optional success message for the subscriber here

          
      }
  }).render('#paypal-button-container-P-5P000947JX925431MMDC5CYI'); // Renders the PayPal button
</script>

@endsection
