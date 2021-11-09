<?php
if (isset($_POST['note'])) $_SESSION['notes'][] = $_POST['note'];
header("Location: /?module=module/list.php");
