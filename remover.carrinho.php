<?php

include("../config.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['index'])) {
    exit;
}

$index = intval($data['index']);

if (isset($_SESSION['cart'][$index])) {

    array_splice($_SESSION['cart'], $index, 1);
}

echo json_encode([
    "success" => true
]);
?>