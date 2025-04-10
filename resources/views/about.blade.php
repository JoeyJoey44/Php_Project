<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Importing the CSS file -->
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
        </ul>
    </nav>

    <section class="home-page-text">
        <div class="description-box">
            <p>
                This project was made for COMP 3975.
                <br>
                <br>
                - Amal, Dina, James, Joey

            </p>
        </div>
    </section>

    <footer class="footer">
        <p>© Amal, Dina, James, Joey</p>
    </footer>

</body>
<script>
    window.onload = function() {
        document.body.classList.add('loaded');
    };
</script>

</html>
