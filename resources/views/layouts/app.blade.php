<!doctype html>
<html lang="en">
<!-- Esteban, Jonathan -->
<head>
    <title>@yield('title', 'Online Store')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/header.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet" />
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Logo --> 
    <link rel="icon" href="{{ asset('images/pixel_plaza.svg') }}" type="image/x-icon">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- header -->

    <nav class="navbar navbar-expand-lg shadow-sm custom-navbar">
        <div class="container header">
            <img src="{{ asset('images/pixel_plaza.svg') }}" alt="Pixel Plaza" class="logo">
            <a class="navbar-brand" href="{{ route('home.index') }}">PIXEL PLAZA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @include('partials.language-selector')
                    <a class="nav-link" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                    <a class="nav-link" href="{{ route('game.index') }}">{{ __('Games') }}</a>
                    @auth
                        <a class="nav-link active" href="{{ route('order.index') }}">{{ __('Orders') }}</a> 
                    @endauth
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div> 
                    @guest 
                        <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a> 
                        <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a> 
                    @else 
                        <div class="nav-item">
                            <a class="nav-link shopping-cart-icon position-relative" href="{{ route('game.shoppingCart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                @if(session()->has('cart') && count(session('cart')) > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count(session('cart')) }}
                                    </span>
                                @endif
                            </a>
                        </div>
                        @if(Auth::user()->is_admin)
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin-game.index') }}">Games</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-game.create') }}">Create Game</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-custom-user.index') }}">Users</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-custom-user.create') }}">Create User</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-category.index') }}">Categories</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-category.create') }}">Create Category</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-review.index') }}">Reviews</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin-review.create') }}">Create Review</a></li>
                                </ul>
                            </div>
                        @endif
                        <form id="logout" action="{{ route('logout') }}" method="POST"> 
                            <a role="button" class="nav-link active" 
                            onclick="document.getElementById('logout').submit();">{{ __('Logout') }}</a> 
                        @csrf 
                        </form> 
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- header -->

    <div class="container my-4 flex-grow-1">
        @yield('content')
    </div>
    <!-- footer -->
    <footer class="">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white title-footer">{{ __('Online Store') }}</h5>
                    @auth
                        <p class="text-white">
                            {{ __('Logged as') }} : {{ Auth::user()->getName() }}
                            @if(Auth::user()->is_admin)
                                (Admin)
                            @endif
                        </p>
                    @endauth
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">{{ __('Links') }}</h5>
                    <ul class="list-unstyled mb-0 list-links">
                        <li><a href="{{ route('home.index') }}" class="text-white text-decoration-none">{{ __('Home') }}</a></li>
                        <li><a href="{{ route('game.index') }}" class="text-white text-decoration-none">{{ __('Games') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">{{ __('Follow Us') }}</h5>
                    <ul class="list-unstyled mb-0 list-links">
                        <li><a href="https://twitter.com/danielgarax" class="text-white text-decoration-none">Twitter</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Facebook</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
        </script>
</body>

</html>