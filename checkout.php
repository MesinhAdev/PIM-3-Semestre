<?php
include("config.php");

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}

$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['preco'] * $item['quantidade'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="checkout-container">

    <h1>Finalizar Compra</h1>

    <div class="checkout-grid">

        <div class="checkout-products">

            <h2>Seu Pedido</h2>

            <?php foreach($_SESSION['cart'] as $item): ?>

                <div class="checkout-item">

                    <img src="<?php echo $item['imagem']; ?>" width="80">

                    <div>

                        <h3>
                            <?php echo $item['nome']; ?>
                        </h3>

                        <p>
                            Quantidade:
                            <?php echo $item['quantidade']; ?>
                        </p>

                        <p>
                            R$
                            <?php echo number_format($item['preco'], 2, ',', '.'); ?>
                        </p>

                    </div>

                </div>

            <?php endforeach; ?>

            <h2 class="checkout-total">

                Total:
                R$ <?php echo number_format($total, 2, ',', '.'); ?>

            </h2>

        </div>

        <div class="checkout-form">

            <form action="finalizar_compra.php" method="POST">

                <h2>Dados do Cliente</h2>

                <input type="text" name="nome" placeholder="Nome completo" required>

                <input type="email" name="email" placeholder="E-mail" required>

                <input type="text" name="telefone" placeholder="Telefone" required>

                <input type="text" name="cep" placeholder="CEP" required>

                <input type="text" name="cidade" placeholder="Cidade" required>

                <input type="text" name="estado" placeholder="Estado" required>

                <textarea name="endereco" placeholder="Endereço completo" required></textarea>

                <button type="submit">
                    FINALIZAR PEDIDO
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>