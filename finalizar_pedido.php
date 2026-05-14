<?php
include('config.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produtos = json_decode($_POST['produtos'], true);
    
    if (empty($produtos)) {
        echo json_encode(['success' => false, 'message' => 'Carrinho vazio.']);
        exit;
    }

    $total = 0;
    foreach ($produtos as $item) {
        $total += $item['price'];
    }

    // 1. Insere o pedido principal (Usando ID de cliente 1 como exemplo)
    // Ajuste os nomes das colunas conforme sua tabela 'pedido'
    $data_atual = date('Y-m-d H:i:s');
    $sql_pedido = "INSERT INTO pedido (data_pedido, total, id_cliente) VALUES ('$data_atual', '$total', 1)";

    if ($conn->query($sql_pedido) === TRUE) {
        $id_pedido = $conn->insert_id;

        // 2. Aqui você poderia inserir os itens em uma tabela 'itens_pedido' 
        // caso ela exista, percorrendo o array $produtos novamente.

        echo json_encode([
            'success' => true, 
            'order_id' => $id_pedido
        ]);
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'Erro no banco: ' . $conn->error
        ]);
    }
}
?>