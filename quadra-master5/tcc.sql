-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Abr-2021 às 02:29
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id_agendamento` int(11) NOT NULL,
  `id_quadra` int(11) NOT NULL,
  `id_estabelecimento` int(11) NOT NULL,
  `horario_ini` time NOT NULL,
  `horario_fin` time NOT NULL,
  `data` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimentos`
--

CREATE TABLE `estabelecimentos` (
  `id_estabelecimento` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cpfcnpj` varchar(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estabelecimentos`
--

INSERT INTO `estabelecimentos` (`id_estabelecimento`, `nome`, `email`, `telefone`, `endereco`, `cpfcnpj`, `login`, `senha`, `status`) VALUES
(1, 'Ginasio Bola na Rede', 'email@teste.com', '5555-5555', 'endereco da rua teseendereco da rua tese', '1313213', 'bolanarede', '4c16795ac8778d6c89d67e65502ee81f', 1),
(2, 'TesteUsuario', 'email@email.com', '131232131231', 'end 1', '12321312312312', 'fulanosilva', '123', 1),
(5, 'oi', 'oi@oi.com', '3123213', 'testeste', '123123123', 'testeoi', 'c6022b450935ef7ea2a40e2ded0fb284', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quadra`
--

CREATE TABLE `quadra` (
  `id_quadra` int(11) NOT NULL,
  `tipo_quadra` varchar(60) NOT NULL,
  `horario_inicial` time NOT NULL,
  `horario_final` time NOT NULL,
  `image` varchar(60) NOT NULL,
  `id_estabelecimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quadra`
--

INSERT INTO `quadra` (`id_quadra`, `tipo_quadra`, `horario_inicial`, `horario_final`, `image`, `id_estabelecimento`) VALUES
(10, 'Futsal', '09:00:00', '22:00:00', '1_ginasio_mib.png', 1),
(11, 'Multi esportes', '09:00:00', '22:00:00', '1_ginasio_volvoFH42020062.jpg', 1),
(12, 'Futsal', '09:00:00', '22:00:00', '1_ginasio_Captura de Tela 2020-12-01 às 12.05.59.png', 1),
(13, 'Vôlei', '09:00:00', '22:00:00', '1_ginasio_mohamed.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dnasc` date NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `telefone`, `dnasc`, `cpf`, `endereco`, `login`, `senha`, `status`) VALUES
(1, 'Estefan Hense', 'tefagh@hotmail.com', '3278-0847', '1997-08-15', '03633678147', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'Estefangh', 'aa1bf4646de67fd9086cf6c79007026c', 1),
(2, 'Estefan', 'tefagh@hotmail.com', '3278-0847', '1993-09-23', '03533579082', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'testee', 'testee', 1),
(3, 'teste1', 'tefagh@hotmail.com', '3278-0847', '1996-04-26', '035.335.780', 'Rua BarÃ£o de Santa Tecla, numero 1035, Pelotas Vila Princesa', 'teste1', 'e959088c6049f11', 1),
(4, 'Fulano da silva', 'sdufhiu@gmail.com', '654564654', '1994-08-15', '03669847852', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'testelogin', '06168ab720cfd41', 1),
(5, 'teste2', 'teste2@gmail.com', '3986465484', '1994-07-16', '04577806784', 'rua tal pelotas iusfghiuh', 'teste2', '38851536d87701d', 1),
(6, 'testeaula', 'testeaula@gmail.com', '36987564565', '1997-08-15', '06578904753', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'testeaula', '66fa4f8107d2ed1', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Índices para tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD PRIMARY KEY (`id_estabelecimento`);

--
-- Índices para tabela `quadra`
--
ALTER TABLE `quadra`
  ADD PRIMARY KEY (`id_quadra`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  MODIFY `id_estabelecimento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `quadra`
--
ALTER TABLE `quadra`
  MODIFY `id_quadra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
