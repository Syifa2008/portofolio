<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- logo -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #a8d8ff; /* Light blue background */
            color: #f7a8b8; /* Pastel pink text */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Navbar Styles */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.8rem 2rem;
            background: rgba(168, 216, 255, 0.9); /* Light blue navbar */
            border-bottom: 2px solid #f7a8b8; /* Pastel pink border */
            box-shadow: 0px 4px 10px rgba(247, 168, 184, 0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: background 0.3s ease;
        }

        nav.scrolled {
            background: rgba(168, 216, 255, 0.8); /* More transparent on scroll */
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #f7a8b8;
        }

        .menu {
            display: flex;
            gap: 1rem;
            margin-right: auto; /* Align closer to the left */
            padding-left: 2rem;
        }

        a {
            color: #f7a8b8;
            text-decoration: none;
            font-weight: 600;
            padding: 0.6rem 1.2rem;
            border: 2px solid transparent;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(247, 168, 184, 0.1); /* Light pastel pink background */
            z-index: 0;
            transition: left 0.3s ease;
        }

        a:hover::before {
            left: 0;
        }

        a:hover {
            color: #ffffff;
            border-color: #f7a8b8;
            box-shadow: 0px 0px 10px rgba(247, 168, 184, 0.6), 0px 0px 20px rgba(247, 168, 184, 0.3);
        }

        a:focus-visible {
            outline: 2px dashed #f7a8b8;
            outline-offset: 4px;
        }

        .dark-mode-toggle {
            cursor: pointer;
            padding: 0.5rem 1rem;
            background-color: #f7a8b8;
            color: #a8d8ff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: absolute;
            left: 90%;
            transform: translateX(-50%); /* Membuat tombol berada tepat di tengah */
        }

        .dark-mode-toggle:hover {
            background-color: #ffffff;
            color: #a8d8ff;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.6);
        }

        main {
            margin-top: 5rem; /* Adjust to make space for fixed navbar */
            padding: 2rem;
            text-align: center;
            color: #f7a8b8;
        }

        footer {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%); /* Memindahkan footer agar berada di tengah */
            padding: 1rem;
            color: #f7a8b8;
            text-align: center;
        }

        footer a {
            color: #f7a8b8;
            text-decoration: none;
        }
    </style>
</head>
<body>
<nav id="navbar">
    <div class="logo">My portfolio</div>
    @if (Route::has('login'))
        <div class="menu">
            <!-- Added Home link here -->
            <a href="{{ route('home.index') }}">Home</a>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Toggle Mode</button>
</nav>

<main>
    <h1>Welcome to My portfolio</h1>
    <p>This is a cyber-themed dark mode interface with a responsive navbar.</p>
</main>

<!-- Footer -->
<footer>
    <p>&copy; 2024 My Portfolio. All Rights Reserved.</p>
</footer>

<!-- Scripts -->
<script>
    const navbar = document.getElementById('navbar');

    // Change navbar style on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Dark Mode Toggle
    function toggleDarkMode() {
        document.body.classList.toggle('light-mode');
        if (document.body.classList.contains('light-mode')) {
            document.body.style.backgroundColor = '#ffffff';
            document.body.style.color = '#f7a8b8'; /* Light pastel pink text */
        } else {
            document.body.style.backgroundColor = '#a8d8ff';
            document.body.style.color = '#f7a8b8'; /* Light pastel pink text */
        }
    }
</script>
</body>
</html>