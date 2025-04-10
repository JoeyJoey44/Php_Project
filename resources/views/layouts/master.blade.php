<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <style>
        
        .home-page-text {
            display: flex;
            align-items: center; 
            justify-content: center; 
            flex: 1; 
            height: 80vh; 
        }


        .home-page-text img {
            width: 300px; 
            height: auto;
            margin-right: 30px; 
        }

        
        .description-box {
            background-color: #1D1D1D; 
            color: #E0E0E0; 
            padding: 30px; 
            border-radius: 15px;
            font-size: 20px; 
            width: 300px; 
            height: 300px; 
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center; 
            overflow: hidden; 
        }
    </style>
</head>
<body>


    <header class="header">
        <h1>NoteZilla</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="{{ route('welcome.index') }}">Home</a></li>
            <li><a href="{{ route('about.index') }}">About</a></li>
            <li><a href="{{ route('users.index') }}">Admin Page</a></li>
            <li><a href="{{ route('admin.summaries.index') }}">Lecture Summaries</a></li>

        </ul>
    </nav>

  


    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>


    
    
    <footer class="footer">
        <p>© Amal, Dina, James, Joey</p>
    </footer>

    <script>
        window.onload = function() {
            document.body.classList.add('loaded');
        };
    </script>

</body>
</html>