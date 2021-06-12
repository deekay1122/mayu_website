<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineSalonController extends Controller
{
    public function showOnlineSalon() {
        return view('online_salon');
    }

    public function createProduct() {
        $token = env('PAYPAL_SANDBOX_ACCESS_TOKEN', null);
        $clientId = env('PAYPAL_SANDBOX_CLIENT_ID', null);
        $secret = env('PAYPAL_SANDBOX_CLIENT_SECRET', null);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Accept: application/json",
            "Accept-Language: en_US"
        ]);
        curl_setopt($curl, CURLOPT_USERPWD, $clientId.":".$secret);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // returns string == true
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // doesnt check ssl certs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // doesnt check ssl certs

        // curl_setopt($curl, CURLOPT_SSLVERSION , 6);

        $result = curl_exec($curl);
        dd($result);

        // curl -v -X POST https://api-m.sandbox.paypal.com/v1/catalogs/products \
        // -H "Content-Type: application/json" \
        // -H "Authorization: Bearer EKTQACO6Gq7rt99Ep9_XhQkM2JWaxjP9EB03K9Hi1JAAR21EfhbHZDURxzyxunW4HfuXzmRlvjl85Qhp" \
        // -H "PayPal-Request-Id: PRODUCT-18062020-001" \
        // -d '{
        // "name": "Video Streaming Service",
        // "description": "A video streaming service",
        // "type": "SERVICE",
        // "category": "SOFTWARE",
        // "image_url": "https://example.com/streaming.jpg",
        // "home_url": "https://example.com/home"
        // }'
    }

    public function paypalSubscriptionListener() {

    }
}