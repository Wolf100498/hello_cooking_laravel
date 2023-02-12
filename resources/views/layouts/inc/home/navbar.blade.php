<header>
    <nav class="navbar">
        <a tabIndex='0' href='/' class="navbar-logo">Hello<span>Cooking</span>
        </a>
        <div class="nav__center">
            <button class="nav__menu-btn open-menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="nav__menu-container" id="menu">
                <ul class="nav__menu">
                    <li class={{ Route::current()->uri() == '/' ? 'nav__menu-item ' : 'nav__menu-item active' }}>
                        <a href={{ route('home') }}>Home</a>
                    </li>
                    <li class="nav__menu-item">
                        <a href={{ route('recipes.index') }}>Recipes</a>
                    </li>
                    <li class="nav__menu-item">
                        <a href={{ route('about') }}>About</a>
                    </li>
                    <li class="nav__menu-item">
                        <a href={{ route('contact') }}>Contact</a>
                    </li>
                </ul>
                <div class="nav__action-mobile">
                    @guest
                        @if (Route::has('login'))
                            <a class="navbar_login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="navbar_login" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="nav-item dropup">
                            <button id="navbarDropdown" class="nav-link dropdown-toggle navbar_login" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </button>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ route('orders.index') }}" class="dropdown-item text-center">Orders</a>
                                <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            <div id="mobile-cart">
                <a class="btn position-relative" href={{ route('cart') }}><i
                        class="fa-solid fa-cart-shopping"></i><span id="cart-count"
                        class="translate-middle badge rounded-pill bg-danger position-absolute"
                        style="font-size: 12px">{{ count((array) session('cart')) }}</span></a>

            </div>

        </div>
        <div class="nav__right">
            <a class="btn position-relative" href={{ route('cart') }}><i class="fa-solid fa-cart-shopping"></i><span
                    class="top-0 start-100 translate-middle badge rounded-pill bg-danger position-absolute"
                    style="font-size: 12px">{{ count((array) session('cart')) }}</span></a>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <a class="navbar_login" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="navbar_login" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="nav-item dropdown">
                    <button id="navbarDropdown" class="nav-link dropdown-toggle navbar_login" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </button>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="{{ route('orders.index') }}" class="dropdown-item">Orders</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            @endguest
        </div>
    </nav>
</header>
