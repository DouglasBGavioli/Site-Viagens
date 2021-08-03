-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2020 às 22:51
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siteviagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `codigo` int(11) NOT NULL,
  `arqui` varchar(200) NOT NULL,
  `dat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`codigo`, `arqui`, `dat`) VALUES
(1, '37478e00b153b167ad5f9a6c313be85a.jpg', '2020-12-03 19:53:12'),
(2, '5153793b90e335294c6e1065324989a4.jpg', '2020-12-03 19:53:37'),
(3, '4a6b27b9ccbdee9b38b735a1b7c981e9jfif', '2020-12-03 19:53:56'),
(4, 'b0c14f9f5a6115ebef56383a08c3d6cdjfif', '2020-12-03 19:54:24'),
(5, 'dc1a6ae5401bd98964e45bcfd704c444jfif', '2020-12-03 19:54:57'),
(6, '00e16220a4510f0b15120b42a55e214a.jpg', '2020-12-03 19:59:53'),
(7, '6d0f80a6e706ef0be5b0d05a0d14d8b3.jpg', '2020-12-03 20:00:40'),
(8, '7d54f8789810c9031c50bcd2a1c96b1f.jpg', '2020-12-03 20:02:06'),
(9, 'bb4bf47984eb7f306b2bcd7227d39d5a.jpg', '2020-12-03 20:03:02'),
(10, '49ab1dcd6561860f1779feb1d031d6ce.jpg', '2020-12-03 20:04:57'),
(11, 'aa0688f81b94f89e4c03419534c2f6ca.jpg', '2020-12-03 20:06:32'),
(12, 'd1b4d15d6c169a50059395402d9d907f.jpg', '2020-12-03 20:48:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cria`
--

CREATE TABLE `cria` (
  `idViagem` int(11) DEFAULT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participa`
--

CREATE TABLE `participa` (
  `id` int(40) NOT NULL,
  `nomeAluno` varchar(40) NOT NULL,
  `rgAluno` varchar(40) NOT NULL,
  `cpfAluno` varchar(40) NOT NULL,
  `idViagem` int(40) NOT NULL,
  `pagamento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `rgProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(30) NOT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `cpfProfessor` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `rgProfessor`, `nomeProfessor`, `senha`, `cpfProfessor`) VALUES
(1, 2147483647, 'Douglas', '81dc9bdb52d04dc20036dbd8313ed055', '03745304080');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem`
--

CREATE TABLE `viagem` (
  `idViagem` int(11) NOT NULL,
  `localViagem` varchar(50) NOT NULL,
  `dataViagem` date DEFAULT NULL,
  `valorViagem` decimal(6,2) NOT NULL,
  `distanciaViagem` decimal(6,2) NOT NULL,
  `descricaoViagem` text NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `tipoTransporte` varchar(40) DEFAULT NULL,
  `empresa` varchar(40) DEFAULT NULL,
  `capacidadeBus` int(11) DEFAULT NULL,
  `professorResponsavel` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `viagem`
--

INSERT INTO `viagem` (`idViagem`, `localViagem`, `dataViagem`, `valorViagem`, `distanciaViagem`, `descricaoViagem`, `titulo`, `tipoTransporte`, `empresa`, `capacidadeBus`, `professorResponsavel`) VALUES
(6, 'Jaguari', '2020-12-12', '50.00', '40.00', 'Teste', 'Jaguari', 'onibus', 'Sao Pedro', 50, 'Eduardo'),
(7, 'Santiago', '2020-02-20', '15.00', '0.00', 'Teste', 'Santiago', 'Van', 'Azul', 16, 'Eduardo'),
(8, 'Santa Maria', '2020-10-10', '50.00', '200.00', 'Teste', 'UFSM', 'Onibus', 'Amarelo', 80, 'Eduardo'),
(9, 'Erechin', '2020-12-12', '50.00', '150.00', 'Teste', 'Uri Erechin', 'Onibus', 'Branco', 60, 'Eduardo'),
(11, 'Ijui', '2021-10-10', '60.00', '200.00', 'TEste', 'Interop X', 'Onibus', 'Preto', 70, 'Eduardo'),
(12, 'Ijui', '2020-12-12', '50.00', '150.00', 'Testes', 'Ijui', 'Onibus', 'Verde', 60, 'Eduardo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `cria`
--
ALTER TABLE `cria`
  ADD KEY `idProfessor` (`idProfessor`),
  ADD KEY `idViagem` (`idViagem`);

--
-- Índices para tabela `participa`
--
ALTER TABLE `participa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Índices para tabela `viagem`
--
ALTER TABLE `viagem`
  ADD PRIMARY KEY (`idViagem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `participa`
--
ALTER TABLE `participa`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `viagem`
--
ALTER TABLE `viagem`
  MODIFY `idViagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cria`
--
ALTER TABLE `cria`
  ADD CONSTRAINT `cria_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`),
  ADD CONSTRAINT `cria_ibfk_2` FOREIGN KEY (`idViagem`) REFERENCES `viagem` (`idViagem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
