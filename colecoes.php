<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleções - Lorde das Camisetas</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <div class="logo"><img src="logo.png" alt="Logo"></div>
    <nav>
        <a href="index.php">Início</a>
        <a href="colecoes.php">Coleções</a>
        <a href="sobre.php">Sobre</a>
        <a href="contato.php">Contato</a>
    </nav>
    <div class="header-actions">
        <button class="cart-button" onclick="toggleCart()">🛒 <span id="cart-count">0</span></button>
    </div>
</header>

<section class="products" style="margin-top: 80px;">
    <h2>NOSSAS COLEÇÕES</h2>
    <div class="product-grid">
        <div class="product-card">
            <img src="IMG/tenis1.jpeg" alt="Cyberpunk">
            <div class="product-info">
                <h3>Peças personalizadas!</h3>
                <p>Tênis e bonés</p>
                <a href="index.php"><button>VER PRODUTOS</button></a>
            </div>
        </div>

        <div class="product-card">
            <img src="IMG/saia1.jpeg" alt="Gothic">
            <div class="product-info">
                <h3>Coleção Pirigótica</h3>
                <p>A essência das trevas</p>
                <a href="index.php"><button>VER PRODUTOS</button></a>
            </div>
        </div>
    </div>
</section>

<script src="script.js"></script>
</body>
</html>