-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2018 às 02:15
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twiter_clone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tweet` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tweets`
--

INSERT INTO `tweets` (`id`, `id_usuario`, `tweet`, `data`) VALUES
(1, 3, 'Esse é um tweet teste!!', '2018-12-06 16:57:58'),
(2, 3, 'Esse é um tweet testssse!!', '2018-12-06 16:59:25'),
(3, 3, 'dhsahdsahd', '2018-12-06 17:23:26'),
(4, 3, 'Mais um novo tweet', '2018-12-06 17:33:13'),
(5, 3, 'dasasdasdasd', '2018-12-06 17:33:26'),
(6, 2, 'Aksahdgash', '2018-12-06 18:40:54'),
(7, 2, 'dasdhasdh', '2018-12-06 18:40:57'),
(8, 2, 'Teste de aplicação', '2018-12-06 18:45:21'),
(9, 2, 'Testtsatdtas', '2018-12-06 18:49:05'),
(10, 2, 'sadasdhahsd', '2018-12-06 18:49:09'),
(11, 2, 'Hoje estou testando as coisas', '2018-12-06 18:51:50'),
(12, 2, 'teste de twitter', '2018-12-06 19:09:10'),
(13, 2, 'Novo twett', '2018-12-06 19:12:44'),
(14, 2, 'Novo twett', '2018-12-06 19:12:44'),
(15, 3, 'New twitter', '2018-12-06 19:30:16'),
(16, 3, 'sdadasdasd', '2018-12-06 19:39:26'),
(17, 3, 'sadsadsadas', '2018-12-06 20:04:24'),
(18, 3, 'tweeeasdasd', '2018-12-06 21:25:32'),
(19, 2, 'dasdasdsadas', '2018-12-06 22:38:25'),
(20, 2, '123123123', '2018-12-06 22:38:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Jorge', 'jorge@teste.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Jumento', 'pauloleitecosta14@gmail.com', '4297f44b13955235245b2497399d7a93'),
(3, 'Paulo', 'pauloleitecosta1201@gmail.com', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_seguidores`
--

CREATE TABLE `usuarios_seguidores` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario_seguido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios_seguidores`
--

INSERT INTO `usuarios_seguidores` (`id`, `id_usuario`, `id_usuario_seguido`) VALUES
(10, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
