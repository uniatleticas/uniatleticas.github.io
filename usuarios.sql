-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 02-Maio-2018 às 00:37
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `sobrenome`, `email`, `confirmar_email`, `senha`, `confirmar_senha`, `curso`, `cidade`) VALUES
(1, 'PhilBess', 'Philipe', 'Bessa de Carvalho', 'philipebessajp@gmail.com', 'philipebessajp@gmail.com', '16b58001e5de4f6cf709061245f8a5d1', '16b58001e5de4f6cf709061245f8a5d1', 'SI', 'JP'),
(2, 'Mari', 'Maria', 'Clara', 'maria@gmail.com', 'maria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'SI', 'PM'),
(3, 'Lari', 'Larissa', 'Maciel', 'larissa@gmail.com', 'larissa@gmail.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 'SI', 'JP'),
(4, 'Dani', 'Daniel', 'Araujo', 'daniel@gmail.com', 'daniel@gmail.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'SI', 'JP'),
(5, 'Jor', 'Jorge', 'Souza', 'jorge@gmail.com', 'jorge@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'SI', 'JP'),
(6, 'jcarlos', 'José', 'Carlos', 'jcarlos_2013@hotmail.com', 'jcarlos_2013@hotmail.com', 'fda51388cafc00ebd2b3d21b77e7e3ec', 'fda51388cafc00ebd2b3d21b77e7e3ec', 'SI', 'Patos de Minas'),
(7, 'teste', 'teste', 'fulano', 'teste@teste.com', 'teste@teste.com', 'f9f240a02ee017ad04834e6516b8f2ce', 'f9f240a02ee017ad04834e6516b8f2ce', 'SI', 'Patos de Minas'),
(8, 'teste2', 'Jonas', 'Carvalho', 'jonas@teste.com', 'jonas@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'SI', 'Carmo do Paranaíba'),
(9, 'gianvelox', 'Gian', 'Michel', 'gianveloxsi@gmail.com', 'gianveloxsi@gmail.com', 'a8e0a09388d92d2a17633e4e5adbdc66', 'a8e0a09388d92d2a17633e4e5adbdc66', 'SI', 'Patos de Minas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
