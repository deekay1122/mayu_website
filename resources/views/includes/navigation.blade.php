

<div class="navigation_container">
    <div class="logo">
        <a href="/" class="logo">
            Mayu's Website
        </a>
        
    </div>
    <ul class="menu">
        <li><a href="/book_club"><i class="fa fa-bookmark-o"></i>Book Club</a></li>
        {{-- <li><a href="/shop/cart">Cart
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
        </a></li> --}}
        <div id="userManagement" ontouchstart="">
            @if (auth()->user())
            <li><a href="/">Welcome {{ auth()->user()->name }}</a></li>
            @else
            <li>Welcome Guest</li>
            @endif
            <div class="dropdown">
                <div class="dropdownMargin">
                    @if (auth()->check())
                        <a href="/dashboard">{{ __('Dashboard') }}</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <input type="hidden" name="logout" value="">
                            <a class="logout_link" onclick="this.parentNode.submit();">{{ __('Logout') }}</a>
                        </form>
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