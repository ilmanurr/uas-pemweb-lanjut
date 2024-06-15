<!DOCTYPE html>
<html>

<head>
    <title>Berita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .navbar {
        background-color: #333;
        overflow: hidden;
        z-index: 1;
        width: 100%;
        position: fixed;
    }

    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 24px 20px;
        text-decoration: none;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        position: relative;
        z-index: 0;
        /* Set z-index lower than navbar */
    }

    .hero-section {
        color: white;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        z-index: 0;
        /* Set z-index lower than navbar */
        height: calc(100vh - 50px);
        /* Set height to fill the viewport minus navbar height */
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        /* Hide overflow to ensure the image fits nicely */
    }

    .container h1 {
        margin: 50px 0 30px 0;
    }

    .hero-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        margin-top: 0;
    }

    .footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="{{ route('home') }}">Home</a>
        @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        @else
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        @foreach($posts as $post)
        @if($loop->first)
        <img src="{{ asset('storage/img/'.$post->image) }}" alt="{{ $post->title }}">
        @endif
        @endforeach
    </div>
    <!-- End Hero Section -->

    <div class="container">
        <!-- Loop berita di sini -->
        <h1>Berita Terbaru</h1>
        @foreach($posts as $post)
        <div class="card">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
        @endforeach
        <!-- Akhir Loop -->
    </div>

    <div class="footer">
        <p>&copy; 2024 Website Berita</p>
    </div>
</body>

</html>