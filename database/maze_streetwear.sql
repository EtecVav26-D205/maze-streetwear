-- phpMyAdmin SQL Dump
-- Banco de dados: maze_streetwear
-- MariaDB 10.4.32
-- PHP 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Banco de dados
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `maze_streetwear`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `maze_streetwear`;

-- --------------------------------------------------------
-- Estrutura da tabela `produtos`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Dados da tabela `produtos`
-- --------------------------------------------------------

INSERT INTO `produtos`
  (`id`, `nome`, `categoria`, `preco`, `estoque`, `imagem`)
VALUES
  (1, 'Camiseta Oversized', 'Camiseta', 89.90, 100, 'camisa-os1.jpg'),
  (2, 'Calça Baggy', 'Calça', 120.90, 100, 'calca.jpg'),
  (3, 'Boné Maze', 'Boné', 50.00, 100, 'bone.jpg'),
  (4, 'Moletom', 'Moletom', 89.90, 150, 'coletom-os2.jpg');

-- Próximo ID
ALTER TABLE `produtos` AUTO_INCREMENT = 5;

COMMIT;
