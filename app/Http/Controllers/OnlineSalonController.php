<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineSalonController extends Controller
{
    public function showOnlineSalon() {
        return view('online_salon');
    }

    public function createProduct() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/catalogs/products");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer EKTQACO6Gq7rt99Ep9_XhQkM2JWaxjP9EB03K9Hi1JAAR21EfhbHZDURxzyxunW4HfuXzmRlvjl85Qhp",
            "PayPal-Request-Id: PRODUCT-18062020-001"
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            "name : Video Streaming Service",
            "description : A video streaming service",
            "type : SERVICE",
            "category : SOFTWARE",
            "image_url : https://example.com/streaming.jpg",
            "home_url : https://example.com/home"
        ]);

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
