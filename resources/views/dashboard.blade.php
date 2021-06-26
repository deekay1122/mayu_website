@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
<div class="your_items">
    <p>ブッククラブ参加状況</p>
    <div class="subscription_status">
        @if ($subscription == null)
            <p>未参加　下記リンクからお申し込みください</p>
            <a href="subscribe/book_club">ブッククラブお申し込み</a>
            {{-- <div class="paypal_subscription_container">
                <div class="paypal_subscription" id="paypal-button-container"></div>
            </div>         --}}
        @elseif ($subscription->status == null or $subscription->status == "APPROVAL_PENDING" or $subscription->status == "APPROVED")
            <p>参加お申し込みの処理中</p>
        @elseif ($subscription->status == "SUSPENDED")
            <p>参加は停止中です。管理者にお問い合わせください。</p>
        @elseif ($subscription->status == "CANCELLED")
            <p>参加はキャンセルされております。再度お申し込みください。</p>
            <a href="subscribe/book_club">ブッククラブお申し込み</a>
            {{-- <div class="paypal_subscription_container">
                <div class="paypal_subscription" id="paypal-button-container"></div>
            </div>  --}}
        @else
            <p>参加中</p>
        @endif
    </div>
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
          
        var subscriptionId = data.subscriptionID;
        return actions.redirect(`https://mayu1111.com/store_subscription?subscriptionID=${subscriptionId}`);
        
            // alert(data.subscriptionID);  You can add optional success message for the subscriber here

          
      }
  }).render('#paypal-button-container'); // Renders the PayPal button
</script>

@endsection
