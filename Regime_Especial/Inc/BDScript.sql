-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jan-2022 às 20:32
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `BDRegime_Especial`
--
CREATE DATABASE IF NOT EXISTS `BDRegime_Especial` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `BDRegime_Especial`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Registro`
--

CREATE TABLE `Registro` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Data_Nasc` date NOT NULL,
  `Celular` varchar(16) NOT NULL,
  `Endereco` varchar(150) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Registro`
--

INSERT INTO `Registro` (`ID`, `Nome`, `RG`, `CPF`, `Data_Nasc`, `Celular`, `Endereco`, `Usuario`, `Senha`) VALUES
(1, 'Lucas Lopes Marinho', '45.388.310-2', '404.125.388-81', '1997-11-11', '(19) 9 9883-2214', 'Rua Manoel Antônio da Fonseca, Nº 468', 'lucaslopes2012', 'Dukemon@1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Registro`
--
ALTER TABLE `Registro`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Registro`
--
ALTER TABLE `Registro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
