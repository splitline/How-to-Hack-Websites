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
    <?php
    $res = $db->query("select * from news where id=".$_GET['id'])->fetch_assoc();
    ?>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
            <h1 class="title">
                <?=$res['title']?>
            </h1>
            </div>
        </div>
    </section>
    <div class="container">
    <?=$res['content']?>
    </div>
</body>
</html>