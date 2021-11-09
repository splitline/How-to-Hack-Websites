<?php
$db = new mysqli('meow-db', 'user', 'pa55w0rd', 'catdb');
if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_errno);
}
?> 