<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorde das Camisetas</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header>

    <div class="logo">
        <img src="logo.png" alt="Logo">
    </div>

    <nav>
        <a href="index.php">Início</a>
        <a href="colecoes.php">Coleções</a>
        <a href="sobre.php">Sobre</a>
        <a href="contato.php">Contato</a>
    </nav>

    <div class="header-actions">

        <button class="cart-button" onclick="toggleCart()">
            🛒 <span id="cart-count">0</span>
        </button>

    </div>

</header>

<section class="hero">

    <div class="overlay"></div>

    <div class="hero-content">

        <h1>
            MODA ALTERNATIVA
            <span>NERD • GÓTICA • GAMER</span>
        </h1>

        <p>
            Vista sua personalidade.
            Peças exclusivas para quem nasceu fora do padrão.
        </p>

        <a href="#produtos">
            <button>
                EXPLORAR COLEÇÃO
            </button>
        </a>

    </div>

</section>

<section class="products" id="produtos">

    <h2>DESTAQUES</h2>

    <div class="product-grid">

        <?php

        $sql = "SELECT * FROM produto";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                $nome = htmlspecialchars($row['nome'], ENT_QUOTES);

                $preco = $row['preco'];

                $img = $row['imagem'];

                ?>

                <div class="product-card">

                    <img src="<?php echo $img; ?>" alt="<?php echo $nome; ?>">

                    <div class="product-info">

                        <h3>
                            <?php echo $nome; ?>
                        </h3>

                        <p>
                            R$ <?php echo number_format($preco, 2, ',', '.'); ?>
                        </p>

                        <button onclick="addToCart(<?php echo $row['id_produto']; ?>)">
                            Adicionar
                        </button>

                    </div>

                </div>

                <?php
            }
        }
        ?>

    </div>

</section>

<div class="cart" id="cart">

    <div class="cart-header">

        <h2>Seu Carrinho</h2>

        <button onclick="toggleCart()">
            ✖
        </button>

    </div>

    <div id="cart-items"></div>

    <div class="cart-footer">

        <h3>
            Total:
            <span id="cart-total">
                R$ 0,00
            </span>
        </h3>

        <button class="checkout" onclick="checkout()">
            FINALIZAR COMPRA
        </button>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>