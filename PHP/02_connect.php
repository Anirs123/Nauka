<?php
$host = '';
$user = '';
$pass = '';
$db = '';


$conn = new mysqli($host, $user, $pass, $db);
$conn -> set_charset("utf8");
$conn -> close();
?>