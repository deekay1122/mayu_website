<div class="navigation_container">
    <div class="logo">
        <a href="/">
            Mayu's Website
        </a>
    </div>
    <div class="menu">
        <ul class="menu_list">
            <li><a href="/online_salon">Salon</a></li>
            <li><a href="/shop/cart">Cart
            @if (session('cart'))
                @php
                    $cartTotalQty = 0;
                @endphp
                @foreach (session('cart') as $item)
                    @php
                        $cartTotalQty += $item['quantity'];
                    @endphp
                @endforeach
                <span>{{ $cartTotalQty }}</span>
            @endif
            </a></li>
            <div id="userManagement">
                @if (auth()->user())
                <li><a href="/">Welcome {{ auth()->user()->name }}</a></li>
                @else
                <li>Welcome Guest</li>
                @endif
                <div class="dropdown">
                    <div class="dropdownMargin">
                        @if (auth()->check())
                            <a href="/dashboard">{{ __('Dashboard') }}</a>
                            <a href="/user/profile">{{ __('User Info') }}</a>
                            <a href="/logout">{{ __('Logout') }}</a>
                        @else
                            <a href="/login">{{ __('Login') }}</a>
                            <a href="/register">{{ __('Register') }}</a>
                        @endif
                    
                        @if (auth()->user())
                            @if (auth()->user()->isAdmin==1)
                                <a href="/admin">{{ __('Admin') }}</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </ul>
    </div>
</div>