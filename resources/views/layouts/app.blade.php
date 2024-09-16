<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/base.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/header.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/footer.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Online Store')</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- header -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">PIXEL PLAZA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link" href="{{ route('game.index') }}">Games</a>
                    <a class="nav-link" href="{{ route('game.create') }}">Create Game</a>
                    <a class="nav-link" href="{{ route('game.shoppingCart') }}">Shopping Cart</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link shopping-cart-icon position-relative" href="{{ route('game.shoppingCart') }}" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-shopping-cart"></i>
                            @if(session()->has('cart') && count(session('cart')) > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                            @if(session()->has('cart') && count(session('cart')) > 0)
                                @foreach(App\Models\Game::find(session('cart')) as $game)
                                    <li><a class="dropdown-item" href="{{ route('game.show', ['id' => $game->getId()]) }}">{{ $game->getName() }}</a></li>
                                @endforeach
                            @else
                                <li><a class="dropdown-item" href="#">No items in cart</a></li>
                            @endif
                        </ul>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="{{ route('custom-user.index') }}">Users</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom-user.create') }}">Create User</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.index') }}">Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.create') }}">Create Category</a></li>
                        <li><a class="dropdown-item" href="{{ route('review.index') }}">Reviews</a></li>
                        <li><a class="dropdown-item" href="{{ route('review.create') }}">Create Review</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <header class="masthead bg-slate-950 text-black text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'Homepage')</h2>
        </div>
    </header>

    <!-- header -->

    <div class="container my-4 flex-grow-1">
        @yield('content')
    </div>
    <!-- footer -->
    <footer class="bg-dark text-center text-lg-start text-white mt-auto">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white">Online Store</h5>
                    <p>
                        Your one-stop shop for all your needs.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0 text-white">
                        <li><a href="{{ route('home.index') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ route('game.index') }}" class="text-white text-decoration-none">Games</a></li>
                        <li><a href="{{ route('custom-user.index') }}" class="text-white text-decoration-none">Users</a></li>
                        <li><a href="{{ route('category.index') }}" class="text-white text-decoration-none">Categories</a></li>
                        <li><a href="{{ route('review.index') }}" class="text-white text-decoration-none">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Follow Us</h5>
                    <ul class="list-unstyled mb-0">
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