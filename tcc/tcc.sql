-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Dez-2018 às 14:26
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

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
  `senha` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estabelecimentos`
--

INSERT INTO `estabelecimentos` (`id_estabelecimento`, `nome`, `email`, `telefone`, `endereco`, `cpfcnpj`, `login`, `senha`, `status`) VALUES
(1, 'Ginasio Bola na Rede', 'bolanarede@gmail.com', '3278-0847', 'Rua BarÃ£o de Santa Tecla, numero 1035, Pelotas Vila Princesa', '05366478049', 'bolanarede', 'bolanarede', 1);

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
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `telefone`, `dnasc`, `cpf`, `endereco`, `login`, `senha`, `status`, `imagem`) VALUES
(1, 'Estefan Hense', 'tefagh@hotmail.com', '3278-0847', '1997-08-15', '03633678147', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'Estefangh', 'teste123', 1, ''),
(2, 'Estefan', 'tefagh@hotmail.com', '3278-0847', '1993-09-15', '03533579082', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'testee', 'testee', 1, 'foto fb.jpg'),
(3, 'teste1', 'tefagh@hotmail.com', '3278-0847', '1996-04-26', '035.335.780', 'Rua BarÃ£o de Santa Tecla, numero 1035, Pelotas Vila Princesa', 'teste1', 'e959088c6049f11', 1, 'odair.jpg'),
(4, 'Fulano da silva', 'sdufhiu@gmail.com', '654564654', '1994-08-15', '03669847852', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'testelogin', '06168ab720cfd41', 1, 'fototeste.jpg'),
(5, 'teste2', 'teste2@gmail.com', '3986465484', '1994-07-16', '04577806784', 'rua tal pelotas iusfghiuh', 'teste2', '38851536d87701d', 1, 'Squirrel_posing.jpg'),
(6, 'testeaula', 'testeaula@gmail.com', '36987564565', '1997-08-15', '06578904753', 'Pelotas, Vila Princesa, Dom AntÃ´nio Zattera, numero 92', 'testeaula', '66fa4f8107d2ed1', 1, 'testeaulaaa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD PRIMARY KEY (`id_estabelecimento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  MODIFY `id_estabelecimento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
