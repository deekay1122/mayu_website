<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineSalonController extends Controller
{
    public function showOnlineSalon() {
        return view('online_salon');
    }

    public function getToken() {
        $clientId = env('PAYPAL_SANDBOX_CLIENT_ID', null);
        $secret = env('PAYPAL_SANDBOX_CLIENT_SECRET', null);
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

    public function createProduct() {
        $token = $this->getToken();
        dd($token);
        $productId = "PROD-73B33072098394532";
        $planId = "P-6B585188B5055922YMDCYACY";
    }

    public function paypalSubscriptionWebhookListener(Request $request) {
        echo $request->links;
    }
}
