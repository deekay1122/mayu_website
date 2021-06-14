<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class DashboardController extends Controller
{
    public function showDashboard() {
        $user = auth()->user();
        $userId = $user->id;
        $subscription = Subscription::all()->where('user_id', $userId)->first();
    
        return view('dashboard', [
            'subscription' => $subscription
        ]);
    }

    
}
