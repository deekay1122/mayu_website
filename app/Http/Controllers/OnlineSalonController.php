<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class OnlineSalonController extends Controller
{
    public function showBookClub() {
        return view('book_club');
    }

    public function showSubscribeBookClub() {
        return view('subscribe_book_club');
    }

    public function getToken() {
        $clientId = config('services.paypal.sandbox_client_id');
        $secret = config('services.paypal.sandbox_client_secret');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Accept: application/json",
            "Accept-Language: en_US",
            "Content-Type: application/x-www-form-urlencoded"
        ]);
        curl_setopt($curl, CURLOPT_USERPWD, $clientId.":".$secret);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // returns string == true
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // doesnt check ssl certs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // doesnt check ssl certs

        $result = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($result);
        $token = $json->access_token;
        return $token;
    }


    public function paypalSubscriptionWebhookListener(Request $request) {
        $subscriptionId = $request->resource["id"];
        $subscription = Subscription::all()->where('subscriptionId', $subscriptionId)->first();
        echo $subscription;
    }

    public function getSubscriptionTitle(string $subscriptionId) {
        $token = $this->getToken();
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/billing/plans/$subscriptionId");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Accept: application/json",
            "Authorization: Bearer $token"
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($result);
        return $json;
    }

    public function storeSubscription(Request $request) {
        $subscriptionId = $request->subscriptionID;

        $planId = config('services.paypal.sandbox_subscription_plan_id');
        
        $user = auth()->user();
        $userId = $user->id;

        $subscription = new Subscription;
        $subscription->subscriptionId = $subscriptionId;
        $subscription->user_id = $userId;
        $subscription->plan_id = "Yesss";

        if ($subscription->save()) {
            return redirect('/dashboard')->with('flash_message', 'Subscription activated successfully');
        }
    }

    public function testAPI($id) {
        $obj = config('services.paypal.sandbox_subscription_plan_id');
        var_dump($obj);
    }
}
