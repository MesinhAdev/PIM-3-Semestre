-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/05/2026 às 23:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lord_camisetas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nome`) VALUES
(1, 'Camisetas '),
(2, 'Femininos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `E-mail` varchar(100) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`Id`, `Nome`, `E-mail`, `Senha`, `Telefone`) VALUES
(1, 'LUIZ OTAVIO MARTINS DA COSTA', 'luizeka0905@gmail.com', 'bolinha', '5519971038258');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `Id_Estoque` int(11) NOT NULL,
  `Id_Pedido` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Subtotal` float NOT NULL,
  `Id_Produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `tipo_pagamento` varchar(100) NOT NULL,
  `status_pagamento` varchar(100) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Data_Pedido` datetime NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Valor_Total` float NOT NULL,
  `Id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nome_cliente` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `nome_cliente`, `email`, `telefone`, `endereco`, `cidade`, `estado`, `cep`, `total`, `data_pedido`) VALUES
(3, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 19:51:42'),
(4, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 158.00, '2026-05-14 19:56:30'),
(5, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 19:57:42'),
(6, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 20:49:01'),
(7, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 20:49:21'),
(8, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 20:55:30'),
(9, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 21:00:28'),
(10, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 21:01:01'),
(11, 'Luiz Otávio Martins da Costa', 'luizeka0905@gmail.com', '971038258', 'Rua Luiz Pessoto 103', 'Limeira', 'SÃO PAULO', '13486-250', 79.00, '2026-05-14 21:02:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_itens`
--

CREATE TABLE `pedido_itens` (
  `id_item` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido_itens`
--

INSERT INTO `pedido_itens` (`id_item`, `pedido_id`, `produto_id`, `nome_produto`, `preco`, `quantidade`) VALUES
(1, 1, 2, 'Camiseta Gatinho', 79.00, 1),
(2, 1, 3, 'Camiseta Resolution', 79.00, 1),
(3, 2, 1, 'Camiseta toxicality', 79.00, 1),
(4, 3, 2, 'Camiseta Gatinho', 79.00, 1),
(5, 4, 4, 'Camiseta CorvoCego', 79.00, 1),
(6, 4, 2, 'Camiseta Gatinho', 79.00, 1),
(7, 5, 2, 'Camiseta Gatinho', 79.00, 1),
(8, 6, 2, 'Camiseta Gatinho', 79.00, 1),
(9, 7, 2, 'Camiseta Gatinho', 79.00, 1),
(10, 8, 2, 'Camiseta Gatinho', 79.00, 1),
(11, 9, 3, 'Camiseta Resolution', 79.00, 1),
(12, 10, 2, 'Camiseta Gatinho', 79.00, 1),
(13, 11, 2, 'Camiseta Gatinho', 79.00, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `preco`, `id_categoria`, `quantidade_estoque`, `imagem`) VALUES
(1, 'Camiseta toxicality', 'camiseta algodão', 79, 1, 10, 'IMG\\toxicality.jpeg'),
(2, 'Camiseta Gatinho', 'Camiseta algodão estampada ', 79, 2, 10, 'IMG\\gatinhogritando.jpeg'),
(3, 'Camiseta Resolution', 'Camiseta Algodão estampada', 79, 3, 10, 'IMG\\resolutioncamiseta.jpeg'),
(4, 'Camiseta CorvoCego', 'camiseta estampada corvo cego', 79, 4, 10, 'IMG\\corvocegopreto.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`Id_Estoque`),
  ADD UNIQUE KEY `Id_Pedido` (`Id_Pedido`),
  ADD UNIQUE KEY `Id_Produto` (`Id_Produto`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD UNIQUE KEY `Id_Pedido` (`id_pedido`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD UNIQUE KEY `Id_Cliente` (`Id_Cliente`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices de tabela `pedido_itens`
--
ALTER TABLE `pedido_itens`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD UNIQUE KEY `Id_Categoria` (`id_categoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `Id_Estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pedido_itens`
--
ALTER TABLE `pedido_itens`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
