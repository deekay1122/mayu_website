<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Subscription;

class ShopController extends Controller
{
    public function showShop() {
        $products = Product::all();
        return view('shop', [
            'products' => $products
        ]);
    }

    public function showCart(){
        return view('cart');
    }

    public function showCheckout() {
        $userId = auth()->user()->id;
        $sales = Sale::all()->where('userId', $userId);
        $purchasedItemIds = [];
        foreach($sales as $item) {
            array_push($purchasedItemIds, $item['productId']);
        }
        return view('checkout', ['purchasedItemIds' => $purchasedItemIds]);
    }

    public function addToCart($id) {
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        $cart = session('cart');

        if(!$cart){
            $cart = [
                $id => [
                    "itemId" => $id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('flash_message', '商品がカートに追加されました');
        }

        if(!isset($cart[$id])){
            $cart[$id] = [
                "itemId" => $id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('flash_message', 'Successfully added to the cart');
        }

        if(isset($cart[$id])){
            return redirect()->back()->with('flash_message', 'The item already in cart');
        }
    }

    public function removeFromCheckout($id) {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect('/shop/checkout')->with('flash_message', 'Product removed successfully');
        }
    }

    public function removeFromCart($id) {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect('/shop/cart')->with('flash_message', 'Product removed successfully');
        }
    }

    public function storeOrder(Request $request) {
        $paymentId = $request->paymentId;
        $payerId = $request->payerID;
        $user = auth()->user();
        $userId = $user->id;

        if(!session('cart')){
            abort(403);
        }
        foreach(session('cart') as $item){
            $sale = new Sale;
            $sale->userid =  $userId;
            $sale->payerId = $payerId;
            $sale->paymentId = $paymentId;
            $sale->productId = $item['itemId'];
            $sale->price = $item['price'];
            $sale->save();
        }
        session()->forget('cart');
        return redirect('/dashboard');
    }

    public function storeSubscription(Request $request) {
        $subscriptionId = $request->subscriptionID;

        $planId = config('services.paypal.sandbox_subscription_plan_id');

        $user = auth()->user();
        $userId = $user->id;

        $existingSubscription = Subscription::all()->where('user_id', $userId)->where('plan_id', $planId)->first();

        dd($existingSubscription->plan_id);
        $subscription = new Subscription;
        $subscription->subscriptionId = $subscriptionId;
        $subscription->user_id = $userId;
        $subscription->plan_id = $planId;

        $subscription->save();
        return redirect('/dashboard')->with('flash_message', 'Subscription activated successfully');
        
    }

    public function paypalSubscriptionWebhookListener(Request $request) {
        
        $subscriptionId = $request->resource["id"];
        $status = $request->resource["status"];
        $subscription = Subscription::all()->where('subscriptionId', $subscriptionId)->first();
        $subscription->status = $status;
        $subscription->save();
    }
}
