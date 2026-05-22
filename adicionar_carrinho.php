<?php

include("../config.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['produto_id'])) {

    echo json_encode([
        "success" => false,
        "message" => "Produto inválido."
    ]);

    exit;
}

$produto_id = intval($data['produto_id']);

$sql = "SELECT * FROM produto WHERE id_produto = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $produto_id);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {

    echo json_encode([
        "success" => false,
        "message" => "Produto não encontrado."
    ]);

    exit;
}

$produto = $result->fetch_assoc();

if (!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = [];
}

$itemExiste = false;

foreach ($_SESSION['cart'] as &$item) {

    if ($item['id'] == $produto_id) {

        $item['quantidade']++;

        $itemExiste = true;

        break;
    }
}

if (!$itemExiste) {

    $_SESSION['cart'][] = [

        "id" => $produto['id_produto'],

        "nome" => $produto['nome'],

        "preco" => $produto['preco'],

        "imagem" => $produto['imagem'],

        "quantidade" => 1
    ];
}

echo json_encode([
    "success" => true,
    "message" => "Produto adicionado."
]);
?>