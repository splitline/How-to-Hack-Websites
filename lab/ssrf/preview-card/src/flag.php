<?php
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') die("Only for localhost user.");
?>
<form action="/flag.php" method="post">
    Do you want the FLAG? <input type="text" name="givemeflag" value="no">
    <input type="submit">
</form>
<?php
if (isset($_POST['givemeflag']) && $_POST['givemeflag'] === 'yes')
    echo "FLAG:", getenv('FLAG');
