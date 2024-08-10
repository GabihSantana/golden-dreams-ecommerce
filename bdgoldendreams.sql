-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/08/2024 às 04:00
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarFuncionario` (IN `p_codigo` INT, IN `p_nome` VARCHAR(100), IN `p_idade` INT, IN `p_telefone` VARCHAR(20), IN `p_email` VARCHAR(100), IN `p_senha` VARCHAR(50))   BEGIN
	UPDATE tbfuncionarios SET nome=p_nome, idade=p_idade, telefone=p_telefone, email=p_email, senha=p_senha WHERE id_funcionario=p_codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarProdutoComImg` (IN `codigo_prod` INT, IN `p_produto` VARCHAR(200), IN `p_qtde` INT, IN `p_valor` DECIMAL(10,2), IN `p_foto` VARCHAR(200))   BEGIN
	UPDATE tbprodutos SET produto = p_produto, qtde = p_qtde, valor = p_valor, foto= p_foto WHERE id = codigo_prod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarProdutoSemImg` (IN `codigo_prod` INT, IN `p_produto` VARCHAR(200), IN `p_qtde` INT, IN `p_valor` DECIMAL(10,2))   BEGIN
	UPDATE tbprodutos SET produto = p_produto, qtde = p_qtde, valor = p_valor WHERE id = codigo_prod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarFuncionario` (IN `codigo` INT)   BEGIN
	
    SELECT * FROM tbfuncionarios WHERE id_funcionario = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProduto` (IN `p_valor` VARCHAR(200))   BEGIN
	SELECT * FROM tbprodutos WHERE produto LIKE CONCAT('%', p_valor, '%') ORDER BY produto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarProduto` (IN `codigo_prod` INT)   BEGIN
	SELECT * FROM tbprodutos WHERE id = codigo_prod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `criarFuncionario` (IN `p_nome` VARCHAR(100), IN `p_idade` INT, IN `p_telefone` VARCHAR(20), IN `p_email` VARCHAR(100), IN `p_senha` VARCHAR(50))   BEGIN
	
    INSERT INTO tbfuncionarios(nome, idade, telefone, email, senha) VALUES (p_nome, p_idade, p_telefone, p_email, p_senha);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `criarProduto` (IN `p_produto` VARCHAR(200), IN `p_qtde` INT, IN `p_valor` DECIMAL(10,2), IN `p_foto` VARCHAR(200))   BEGIN
    INSERT INTO tbprodutos(produto, qtde, valor, foto) VALUES (p_produto, p_qtde, p_valor, p_foto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletarFuncionario` (IN `codigo` INT)   BEGIN

	DELETE from tbfuncionarios WHERE id_funcionario = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletarProduto` (IN `codigo_produto` INT)   BEGIN
	DELETE from tbprodutos where id = codigo_produto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarFuncionarios` ()   BEGIN
	SELECT * FROM tbfuncionarios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarProdutos` ()   BEGIN

	SELECT * FROM tbprodutos;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificaAdm` (IN `p_email` VARCHAR(100), IN `p_senha` VARCHAR(50))   BEGIN
	SELECT * FROM tbadms WHERE email = p_email AND senha = p_senha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificaFunc` (IN `p_email` VARCHAR(100), IN `p_senha` VARCHAR(50))   BEGIN
    SELECT * FROM tbfuncionarios WHERE email = p_email AND senha = p_senha;
END$$

DELIMITER ;

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
(7, 'Gabriela', 19, '123456789', 'gabi@func.com', '123'),
(11, 'Julio', 22, '11954342324', 'julio@func.com', '123');

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
(1, 'Anel Diamante Prata 950g', 100, 130.00, '6c2f73ae138b9abeee43b4bc9aff946a.jpg'),
(2, 'Anel Aliança - Prata 950g', 350, 150.00, '58e5bfeed2ccb83076f2ff40263d973c.jpg'),
(3, 'Anel de Patinhas de Animal - Ouro 1k', 100, 400.00, 'b0a3df711d1ffebf470f773114477a88.jpg'),
(4, 'Brinco Argola - Ouro 1k', 400, 200.00, '5f3b9007e3ad50171ba2349133a8c4d0.jpg'),
(5, 'Brinco de Coração - 925g', 500, 100.00, '966da04f33e77adbe75e0733bf061e84.jpeg'),
(6, 'Brinco de Pérola - Ouro 925g ', 300, 250.00, 'b55762dee8cce83308e9a966e2eb9792.jpg'),
(7, 'Brinco de Gota - Ouro 3k', 100, 540.00, 'b9e2a7c6683a895c58ba5dd913020807.jpeg'),
(8, 'Colar de Coração - Prata 925g', 450, 150.00, '82cd281dd5bb3de73600ef1ad1149aa7.jpg'),
(9, 'Colar Olho Grego - Prata 950g', 300, 180.00, '3f335c4a41592dd4f1857a541f2fb3be.jpg'),
(10, 'Colar Triplo de Medalhas - Ouro 5k', 300, 800.00, '22cd87e3a9a6a8bb0bb39812bdbb6a71.jpg'),
(11, 'Gargantinlha - Prata 950g', 400, 300.00, 'b8c65da2e0f77c1e5ae5033762d557a1.jpg'),
(12, 'Pulseira de Bolinhas - Ouro 2k', 300, 300.00, 'e17ea25c4e2822af8cedcdfa149703c0.jpg');

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
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
