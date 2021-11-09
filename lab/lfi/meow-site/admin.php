<h1>Admin Panel</h1>
<form>
    <input type="text" name="username" value="admin">
    <input type="password" name="password">
    <input type="submit" value="Submit">
</form>

<?php
$admin_account = array("username" => "admin", "password" => "lab_password");
if (
    isset($_GET['username']) && isset($_GET['password']) &&
    $_GET['username'] === $admin_account['username'] && $_GET['password'] === $admin_account['password']
) {
    echo "<h1>LOGIN SUCCESS!</h1><p>".getenv('FLAG')."</p>";
}

?>