<?php

$host = "sql313.infinityfree.com";
$user = 'if0_43431517';
$password = 'WG40CoqeiH';
$database = "if0_43431517_steelguard";

$mysqli = mysqli_connect($host, $user, $password, $database);

if (!$mysqli) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

mysqli_set_charset($mysqli, "utf8mb4");

?>
