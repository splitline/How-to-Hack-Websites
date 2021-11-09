<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Proxy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="column is-10 is-offset-1">
                <a href="/">⬅ HOME</a>
                <form action="/preview.php">
                    <input class="input" type="text" name="url" value="<?= $_GET['url'] ?? '' ?>" placeholder="https://example.com">
                </form>
                <br>
                <?php if (isset($_GET['url'])) : ?>
                    <?php
                    $ch = curl_init($url = $_GET['url']);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $html = curl_exec($ch);
                    $title = preg_match('/<title>(.+)<\/title>/i', $html, $matches_title);
                    $description = preg_match('/<meta\s+name="description"\s+content="([^"]+)"/i', $html, $matches_desc);
                    ?>

                    <div class="column is-6 is-offset-3">
                        <h3 class="title is-5">Preview card</h3>
                        <div class="box">
                            <h3 class="title"><?= $title ? $matches_title[1] : $url ?></h3>
                            <?= $description ? "<p>$matches_desc[1]</p>" : '' ?>
                            <a href="<?= $url ?>"><?= $url ?></a>
                        </div>
                    </div>
                    <hr>
                    <h3 class="title is-5">Debug</h3>
                    <pre><?= htmlentities($html) ?></pre>
                    <?php curl_close($ch); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>

</html>