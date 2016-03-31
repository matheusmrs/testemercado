-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Mar-2016 às 22:57
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mercado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE IF NOT EXISTS `mercadoria` (
  `mer_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `mer_tipo` varchar(15) NOT NULL,
  `mer_nome` varchar(15) NOT NULL,
  `mer_quantidade` int(100) NOT NULL,
  `mer_preco` double NOT NULL,
  `mer_negocio` varchar(10) NOT NULL,
  PRIMARY KEY (`mer_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `mercadoria`
--

INSERT INTO `mercadoria` (`mer_codigo`, `mer_tipo`, `mer_nome`, `mer_quantidade`, `mer_preco`, `mer_negocio`) VALUES
(2, 'Sabonete', 'Pampers', 3, 5, 'Compra'),
(3, 'teste', 'teste', 3, 3, 'Compra');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
