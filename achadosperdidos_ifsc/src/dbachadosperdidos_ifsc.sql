-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2018 às 00:25
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbachadosperdidos_ifsc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetos`
--

CREATE TABLE `objetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cor` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `situacao` tinyint(4) NOT NULL,
  `dtSituacao` date NOT NULL,
  `localSituacao` varchar(200) NOT NULL,
  `recompensa` bit(1) DEFAULT NULL,
  `valRecompensa` decimal(10,0) DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `ativo` bit(1) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `imagem` varchar(120) NOT NULL,
  `dtPublicacao` date NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `objetoId` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `perfilId` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for table `publicacoes`
ALTER TABLE `publicacoes`
  ADD KEY `FKUsuarioPublicacao` (`usuarioId`),
  ADD KEY `FKObjetoPublicacao` (`objetoId`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD KEY `FKPerfilUsuario` (`perfilId`);
--
-- Limitadores para a tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `FKObjetoPublicacao` FOREIGN KEY (`objetoId`) REFERENCES `objetos` (`id`),
  ADD CONSTRAINT `FKUsuarioPublicacao` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FKPerfilUsuario` FOREIGN KEY (`perfilId`) REFERENCES `perfis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
