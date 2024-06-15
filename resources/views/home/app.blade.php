<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('newstemplate/img/ienews-logo.png') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap Ecommerce Template" name="keywords">
    <meta content="Bootstrap Ecommerce Template Free Download" name="description">

    <!-- Favicon -->
    <link href="{{ asset('newstemplate/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('newstemplate/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('newstemplate/lib/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('newstemplate/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Top Header Start -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="logo">
                        <a href="">
                            <img src="{{ asset('newstemplate/img/ienews-logo.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="search">
                        <form action="{{ route('search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="social">
                        @auth
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome, {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->level === 'admin')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                                @elseif(auth()->user()->level === 'pengelola')
                                <a class="dropdown-item" href="{{ route('pengelola.dashboard') }}">Dashboard
                                    Pengelola</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                        @else
                        <div>
                            <a href="{{ route('login') }}" class="nav-item">Login</a>
                            <a href="{{ route('register') }}" class="nav-item">Register</a>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Header End -->

    <!-- Header Start -->
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav m-auto">
                        <a href="{{ route('home') }}" id="nav-home" class="nav-item nav-link">Home</a>
                        @foreach($categories as $categoryItem)
                        <a href="{{ route('category.posts', $categoryItem->id) }}"
                            id="nav-category-{{ $categoryItem->id }}"
                            class="nav-item nav-link">{{ $categoryItem->title }}</a>
                        @endforeach
                        <a href="{{ route('contact') }}" id="nav-contact" class="nav-item nav-link">Contact Us</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header End -->

    <!-- content -->
    @yield('content')

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; 2024 <a href="https://github.com/ilmanurr">IENEWS | Ilma Nur Hidayah</a>. All
                        Rights
                        Reserved</p>
                </div>
                <div class="col-md-6 template-by">
                    <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('newstemplate/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('newstemplate/lib/slick/slick.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('newstemplate/js/main.js') }}"></script>

</body>

</html>