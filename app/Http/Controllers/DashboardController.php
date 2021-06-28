<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class DashboardController extends Controller
{
    public function showDashboard() {
        $bookClubPlanId = config('services.paypal.sandbox_book_club_monthly_subscription_plan_id');
        $bookClubZoomPlanId = config('services.paypal.sandbox_book_club_zoom_monthly_subscription_plan_id');
        $user = auth()->user();
        $userId = $user->id;
        $bookClubPlanStatus = $this->checkStatus($userId, $bookClubPlanId);
        $bookClubZoomPlanStatus = $this->checkStatus($userId, $bookClubZoomPlanId);
        // dd($bookClubPlanStatus);
        return view('dashboard', [
            'bookClubPlanStatus' => $bookClubPlanStatus,
            'bookClubZoomPlanStatus' => $bookClubZoomPlanStatus
        ]);
    }

    public function checkStatus(int $userId, string $planId) {
        $subscription = Subscription::all()->where('user_id', $userId)->where('plan_id', $planId);
        // flags
        $approval_pending = 0;
        $approved = 0;
        $active = 0;
        $suspended = 0;
        $cancelled = 0;
        $expired = 0;

        // status
        $status = null;
        
        foreach ($subscription as $sub) {
            switch ($sub->status) {
                case "APPROVAL_PENDING":
                    $approval_pending++;
                    break;
                case "APPROVED":
                    $approved++;
                    break;
                case "ACTIVE":
                    $active++;
                    break;
                case "SUSPENDED":
                    $suspended++;
                    break;
                case "CANCELLED":
                    $cancelled++;
                    break;
                case "EXPIRED":
                    $expired++;
                    break;
                case null:
                    $approval_pending++;
                default:
                    break;
            }
        }

        if ($active > 0) {
            $status = "ACTIVE";
        } elseif ($approved > 0) {
            $status = "APPROVED";
        } elseif ($approval_pending > 0) {
            $status = "APPROVAL_PENDING";
        } elseif ($suspended > 0) {
            $status = "SUSPENDED";
        } elseif ($expired > 0) {
            $status = "EXPIRED";
        } elseif ($cancelled > 0) {
            $status = "CANCELLED";
        }
        return $status;
    }
}
