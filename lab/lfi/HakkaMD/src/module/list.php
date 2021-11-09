<h1 class="title">筆記列表</h1>
<?php foreach ($_SESSION['notes'] as $note) : ?>
    <div class="box">
        <?= nl2br($note) ?>
    </div>
<?php endforeach; ?>