<?php

include("config.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

$total = 0;

foreach ($_SESSION['cart'] as $item) {

    $total += $item['preco'] * $item['quantidade'];
}

$sql = "INSERT INTO pedidos
(
    nome_cliente,
    email,
    telefone,
    endereco,
    cidade,
    estado,
    cep,
    total
)
VALUES
(
    ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssssssd",
    $nome,
    $email,
    $telefone,
    $endereco,
    $cidade,
    $estado,
    $cep,
    $total
);

$stmt->execute();

$pedido_id = $stmt->insert_id;

foreach ($_SESSION['cart'] as $item) {

    $sqlItem = "INSERT INTO pedido_itens
    (
        pedido_id,
        produto_id,
        nome_produto,
        preco,
        quantidade
    )
    VALUES
    (
        ?, ?, ?, ?, ?
    )";

    $stmtItem = $conn->prepare($sqlItem);

    $stmtItem->bind_param(
        "iisdi",
        $pedido_id,
        $item['id'],
        $item['nome'],
        $item['preco'],
        $item['quantidade']
    );

    $stmtItem->execute();
}

unset($_SESSION['cart']);

header("Location: sucesso.php");
exit;
?>