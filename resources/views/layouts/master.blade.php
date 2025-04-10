<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <h1>PHP Project</h1>
    </header>

    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('welcome.index') }}">Home</a></li>
            <li><a href="{{ route('features.index') }}">Features</a></li>
            <li><a href="{{ route('about.index') }}">About</a></li>
            <li><a href="{{ route('faq.index') }}">FAQ</a></li>
            <li><a href="{{ route('users.index') }}">Admin Page</a></li>

        </ul>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>© Amal, Dina, James, Joey</p>
    </footer>

    <!-- Optional JS (for Bootstrap alerts, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.onload = function () {
            document.body.classList.add('loaded');
        };
    </script>
</body>

</html>
