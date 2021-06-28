@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
<div class="your_items">
    <p>ブッククラブ（対面）参加状況</p>
    <div class="subscription_status">
        @switch($bookClubPlanStatus)
            @case("ACTIVE")
                <p>参加中</p>
                @break
            @case(null)
                <p>未参加　下記リンクからお申し込みください</p>
                <a href="subscribe/book_club">ブッククラブ（対面）お申し込み</a>
                @break
            @case("APPROVAL_PENDING")
                <p>参加お申し込みの処理中</p>
                @break
            @case("APPROVED")
                <p>参加お申し込みの処理中</p>
                @break
            @case("SUSPENDED")
                <p>参加は停止中です。管理者にお問い合わせください。</p>
                @break
            @case("CANCELLED")
                <p>参加はキャンセルされております。再度お申し込みください</p>
                <a href="subscribe/book_club">ブッククラブ（対面）お申し込み</a>
                @break
            @default
                <p>参加中</p>
        @endswitch
    </div>
        @if ($bookClubZoomPlanStatus != "ACTIVE" && $bookClubPlanStatus != "APPROVAL_PENDING" && $bookClubPlanStatus != "APPROVED")
            <p>ブッククラブ（Zoom）参加状況</p>
            <div class="subscription_status">
                @switch($bookClubZoomPlanStatus)
                    @case("ACTIVE")
                        <p>参加中</p>
                        @break
                    @case(null)
                        <p>未参加　下記リンクからお申し込みください</p>
                        <a href="subscribe/book_club_zoom">ブッククラブ（Zoom）お申し込み</a>
                        @break
                    @case("APPROVAL_PENDING")
                        <p>参加お申し込みの処理中</p>
                        @break
                    @case("APPROVED")
                        <p>参加お申し込みの処理中</p>
                        @break
                    @case("SUSPENDED")
                        <p>参加は停止中です。管理者にお問い合わせください。</p>
                        @break
                    @case("CANCELLED")
                        <p>参加はキャンセルされております。再度お申し込みください</p>
                        <a href="subscribe/book_club_zoom_zoom">ブッククラブ（Zoom）お申し込み</a>
                        @break
                    @default
                        <p>参加中</p>
                @endswitch
            </div>
        @endif
    </div>
</div> 

@endsection
