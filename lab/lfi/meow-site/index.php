<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/?page=inc/home">🐱</a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/?page=inc/home">
                    Home
                </a>
                <a class="navbar-item" href="/?page=inc/about">
                    About
                </a>
                <a class="navbar-item" href="/admin.php">
                    Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 1em;">
        <?php
        if (isset($_GET['page']))
            include($_GET['page'] . ".php");
        else
            include("inc/home.php");
        ?>
    </div>
</body>

</html>