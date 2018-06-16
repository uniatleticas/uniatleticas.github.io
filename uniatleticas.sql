-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 15-Jun-2018 às 23:19
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniatleticas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletica_si`
--

DROP TABLE IF EXISTS `atletica_si`;
CREATE TABLE IF NOT EXISTS `atletica_si` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `msg` varchar(140) NOT NULL,
  `data_inclusao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `msg`
--

INSERT INTO `msg` (`id_msg`, `id_usuario`, `msg`, `data_inclusao`) VALUES
(4, 1, 'Teste de projeto integrador UniAtleticas', '2018-04-17 21:54:45'),
(5, 1, 'Bem vindo ao twitter', '2018-04-17 21:59:29'),
(6, 1, 'eae men', '2018-04-17 22:01:44'),
(7, 1, 'opa', '2018-04-18 10:11:52'),
(8, 1, 'jc', '2018-04-18 10:20:27'),
(9, 1, 'Mari', '2018-04-18 10:42:16'),
(10, 1, 'Marii', '2018-04-18 17:24:31'),
(11, 2, 'opa tudo bom ', '2018-04-18 20:31:10'),
(12, 3, 'eae gnt', '2018-04-18 20:32:01'),
(13, 3, 'asfsdfsg', '2018-04-18 20:52:44'),
(14, 4, 'eae pessoa', '2018-04-18 21:07:07'),
(15, 1, 'oi', '2018-04-18 21:08:41'),
(16, 1, 'eae', '2018-04-19 18:39:07'),
(17, 1, 'oooopa', '2018-04-19 18:49:22'),
(18, 1, 'eae men', '2018-04-19 18:55:40'),
(19, 6, 'Olá!', '2018-05-14 18:02:43'),
(20, 9, 'Olá!', '2018-05-14 18:04:24'),
(21, 6, 'icha', '2018-05-14 18:06:22'),
(22, 9, 'oi', '2018-05-14 18:09:15'),
(23, 9, 'oi', '2018-05-14 18:17:31'),
(24, 7, 'oi', '2018-06-15 18:39:27'),
(25, 10, 'teste php ok ;)', '2018-06-15 19:14:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `confirmar_email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `confirmar_senha` varchar(32) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `novasenha` varchar(32) NOT NULL,
  `confirmarnovasenha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `sobrenome`, `email`, `confirmar_email`, `senha`, `confirmar_senha`, `curso`, `cidade`, `novasenha`, `confirmarnovasenha`) VALUES
(1, 'PhilBess', 'Philipe', 'Bessa de Carvalho', 'philipebessajp@gmail.com', 'philipebessajp@gmail.com', '16b58001e5de4f6cf709061245f8a5d1', '16b58001e5de4f6cf709061245f8a5d1', 'SI', 'JP', '', ''),
(2, 'Mari', 'Maria', 'Clara', 'maria@gmail.com', 'maria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'SI', 'PM', '', ''),
(3, 'Lari', 'Larissa', 'Maciel', 'larissa@gmail.com', 'larissa@gmail.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 'SI', 'JP', '', ''),
(4, 'Dani', 'Daniel', 'Araujo', 'daniel@gmail.com', 'daniel@gmail.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'SI', 'JP', '', ''),
(5, 'Jor', 'Jorge', 'Souza', 'jorge@gmail.com', 'jorge@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'SI', 'JP', '', ''),
(6, 'jcarlos', 'José', 'Carlos', 'jcarlos_2013@hotmail.com', 'jcarlos_2013@hotmail.com', 'fda51388cafc00ebd2b3d21b77e7e3ec', 'fda51388cafc00ebd2b3d21b77e7e3ec', 'SI', 'Patos de Minas', '', ''),
(7, 'teste', 'teste', 'fulano', 'teste@teste.com', 'teste@teste.com', 'f9f240a02ee017ad04834e6516b8f2ce', 'f9f240a02ee017ad04834e6516b8f2ce', 'SI', 'Patos de Minas', '', ''),
(8, 'teste2', 'Jonas', 'Carvalho', 'jonas@teste.com', 'jonas@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'SI', 'Carmo do Paranaíba', '', ''),
(9, 'gianvelox', 'Gian', 'Michel', 'gianveloxsi@gmail.com', 'gianveloxsi@gmail.com', 'a8e0a09388d92d2a17633e4e5adbdc66', 'a8e0a09388d92d2a17633e4e5adbdc66', 'SI', 'Patos de Minas', '', ''),
(10, 'gian123', 'gian', 'Michel', 'gianveloxxsi@gmail.com', 'gianveloxxsi@gmail.com', 'a8e0a09388d92d2a17633e4e5adbdc66', 'a8e0a09388d92d2a17633e4e5adbdc66', 'SI', 'Patos de Minas', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_seguidores`
--

DROP TABLE IF EXISTS `usuarios_seguidores`;
CREATE TABLE IF NOT EXISTS `usuarios_seguidores` (
  `id_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `seguindo_id_usuario` int(11) NOT NULL,
  `data_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_seguidor`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_seguidores`
--

INSERT INTO `usuarios_seguidores` (`id_usuario_seguidor`, `id_usuario`, `seguindo_id_usuario`, `data_registro`) VALUES
(12, 2, 1, '2018-04-18 20:16:29'),
(13, 2, 3, '2018-04-18 20:31:18'),
(14, 3, 1, '2018-04-18 20:31:45'),
(15, 3, 2, '2018-04-18 20:31:50'),
(16, 4, 1, '2018-04-18 21:06:42'),
(17, 4, 2, '2018-04-18 21:06:48'),
(18, 4, 3, '2018-04-18 21:06:53'),
(20, 1, 4, '2018-04-18 21:54:56'),
(21, 9, 6, '2018-06-15 19:16:17'),
(22, 10, 6, '2018-06-15 19:18:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
