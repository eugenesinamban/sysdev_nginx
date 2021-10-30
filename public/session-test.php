<?php
session_start();

$count = isset($_SESSION['hoge']) ? intval($_SESSION['hoge']) : 0;
$count++;
$_SESSION['hoge'] = strval($count);
?>

<?= $_SESSION['hoge'] ?>
