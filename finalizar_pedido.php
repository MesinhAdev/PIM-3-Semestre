<?php

include('config.php');

session_start();

$nome = $_POST['nome'];

$endereco = $_POST['endereco'];

$tipoPagamento = $_POST['tipo_pagamento'];

$total = 199.90;

/*
-----------------------------------
SALVA O PEDIDO
-----------------------------------
*/

$sqlPedido = "
INSERT INTO pedido
(
    nome_cliente,
    endereco
)

VALUES
(
    '$nome',
    '$endereco'
)
";

$conn->query($sqlPedido);

/*
-----------------------------------
PEGA O ID DO PEDIDO CRIADO
-----------------------------------
*/

$idPedido = $conn->insert_id;

/*
-----------------------------------
SALVA O PAGAMENTO
-----------------------------------
*/

$sqlPagamento = "
INSERT INTO pagamento
(
    tipo_pagamento,
    status_pagamento,
    valor_pagamento,
    id_pedido
)

VALUES
(
    '$tipoPagamento',
    'Pendente',
    '$total',
    '$idPedido'
)
";

$conn->query($sqlPagamento);

/*
-----------------------------------
REDIRECIONA
-----------------------------------
*/

header("Location: sucesso.php");

?>

