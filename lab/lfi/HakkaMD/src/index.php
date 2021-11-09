<?php
session_start();
if (!isset($_SESSION['notes'])) $_SESSION['notes'] = [];
if (!isset($_GET['module'])) header("Location: /?module=module/home.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HakkaMD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="column is-6 is-offset-3">
                <?php include($_GET['module']) ?>
                <p>
                    <a href="/?module=module/home.php">首頁</a> |
                    <a href="/?module=module/list.php">筆記列表</a> |
                    <a href="/phpinfo.php">phpinfo()</a>
                </p>
            </div>
        </div>
    </section>
</body>

</html>