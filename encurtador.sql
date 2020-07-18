-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jul-2020 às 00:34
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `encurtador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `url` varchar(1000) NOT NULL,
  `shorturl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `url`
--

INSERT INTO `url` (`id`, `userid`, `hits`, `url`, `shorturl`) VALUES
(47, 'teste5', 0, 'http://www.a.com', 'http://localhost/SSOqStuPnF');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;
