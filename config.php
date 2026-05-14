<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "lord_camisetas";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão com banco.");
}

$conn->set_charset("utf8mb4");
?>