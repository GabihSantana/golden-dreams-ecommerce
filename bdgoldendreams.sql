-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/07/2024 às 02:36
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
-- Banco de dados: `bdgoldendreams`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbadms`
--

CREATE TABLE `tbadms` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbadms`
--

INSERT INTO `tbadms` (`id_adm`, `nome`, `idade`, `telefone`, `email`, `senha`) VALUES
(1, 'Isabella', 19, '11934543676', 'isa@adm.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbfuncionarios`
--

CREATE TABLE `tbfuncionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbfuncionarios`
--

INSERT INTO `tbfuncionarios` (`id_funcionario`, `nome`, `idade`, `telefone`, `email`, `senha`) VALUES
(1, 'Domenico', 18, '1140028923', 'domenico@funcionario.com', '123'),
(7, 'Gabriela', 19, '123456789', 'gabi@func.com', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `id` int(11) NOT NULL,
  `produto` varchar(200) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`id`, `produto`, `qtde`, `valor`, `foto`) VALUES
(1, 'Anel de Prata 925g', 100, 130.00, '6c2f73ae138b9abeee43b4bc9aff946a.jpg'),
(2, 'Anel Aliança - Prata 950g', 350, 150.00, '58e5bfeed2ccb83076f2ff40263d973c.jpg'),
(3, 'Anel de Patinhas de Animal - Ouro 1k', 100, 400.00, 'b0a3df711d1ffebf470f773114477a88.jpg'),
(4, 'Brinco Argola - Ouro 1k', 400, 200.00, '5f3b9007e3ad50171ba2349133a8c4d0.jpg'),
(5, 'Brinco de Coração - 925g', 500, 100.00, '966da04f33e77adbe75e0733bf061e84.jpeg'),
(6, 'Brinco de Pérola - Ouro 925g ', 300, 250.00, 'b55762dee8cce83308e9a966e2eb9792.jpg'),
(7, 'Brinco de Gota - Ouro 3k', 100, 550.00, 'b9e2a7c6683a895c58ba5dd913020807.jpeg'),
(8, 'Colar de Coração - Prata 925g', 450, 120.00, '82cd281dd5bb3de73600ef1ad1149aa7.jpg'),
(9, 'Colar Olho Grego - Prata 950g', 350, 180.00, '3f335c4a41592dd4f1857a541f2fb3be.jpg'),
(10, 'Colar Triplo de Medalhas - Ouro 5k', 300, 800.00, '22cd87e3a9a6a8bb0bb39812bdbb6a71.jpg'),
(11, 'Gargantinlha - Prata 950g', 400, 300.00, 'b8c65da2e0f77c1e5ae5033762d557a1.jpg'),
(12, 'Pulseira de Bolinhas - Ouro 2k', 300, 300.00, 'e17ea25c4e2822af8cedcdfa149703c0.jpg'),
(13, 'Pulseira de Flores - Ouro 1k', 400, 250.00, '2ee2bb9e4cfe7c7d9103b408a49d9248.png'),
(14, 'Pulseira de Pedras Coloridas - Ouro 950g', 350, 280.00, '67e55785396ba1a4d343f55616f88728.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbadms`
--
ALTER TABLE `tbadms`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `tbfuncionarios`
--
ALTER TABLE `tbfuncionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbadms`
--
ALTER TABLE `tbadms`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbfuncionarios`
--
ALTER TABLE `tbfuncionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
