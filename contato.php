<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Lorde das Camisetas</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .contact-form {
            max-width: 600px;
            margin: 120px auto;
            background: #111;
            padding: 40px;
            border-radius: 20px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            background: #222;
            border: 1px solid #333;
            color: white;
            border-radius: 10px;
            font-family: inherit;
        }
        .contact-form h2 { margin-bottom: 20px; color: #ff3131; }
    </style>
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
</header>

<div class="contact-form">
    <h2>Fale Conosco</h2>
    <p style="margin-bottom: 20px; color: #ccc;">Dúvidas, sugestões ou elogios? Mande uma mensagem!</p>
    <form action="#" method="POST">
        <input type="text" placeholder="Seu Nome" required>
        <input type="email" placeholder="Seu E-mail" required>
        <textarea rows="5" placeholder="Sua Mensagem" required></textarea>
        <button type="submit" class="checkout" style="width: 100%;">ENVIAR MENSAGEM</button>
    </form>
</div>

</body>
</html>