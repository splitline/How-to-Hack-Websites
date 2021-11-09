<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <title>Meow</title>
</head>
<body>
    <div class="container">
    <section class="hero is-danger">
        <div class="hero-body">
            <div class="container">
            <h1 class="title">
                Meow
            </h1>
            <h2 class="subtitle">
                nyan.
            </h2>
            </div>
        </div>
    </section>
    <?php
    $news = $db->query("select * from news");
    while($res = $news->fetch_assoc()):
    ?>
    <p>
        <a href="/view.php?id=<?=$res['id']?>"><?=$res['title']?></a>
    </p>
    <?php endwhile; ?>
    </div>
</body>
</html>