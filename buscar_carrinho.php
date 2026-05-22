<?php

include("../config.php");

if (!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = [];
}

echo json_encode($_SESSION['cart']);
?>