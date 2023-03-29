-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Mar-2023 às 04:22
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `firstwork`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `titulo` text NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`id`, `nome`, `titulo`, `conteudo`) VALUES
(1, 'Kevin', 'Presidente bolsonaro', 'Programa de TV e projeto de conteúdo digital audiovisual. Uma das iniciativas de maior relevância e reconhecimento público do Instituto CPFL na área cultural é o Café Filosófico CPFL. Desde 2003, os encontros são gravados na sede do Instituto CPFL, em Campinas, transmitidos via lives nas redes sociais, disponibilizados gratuitamente na internet, editados e exibidos na TV Cultura. \n\nTodos os programas e lives ficam disponíveis gratuitamente nos canais do Youtube do café e do instituto. Conheça os formatos do programa:'),
(2, 'Kevin', 'Pedreiro', 'dasdasdsdasdas'),
(3, 'dsadsa', 'dasd', 'dasdas'),
(4, 'empresa fisrt', 'programador', 'dasd asdasdasd asd asd asdasdas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boxmessages`
--

CREATE TABLE `boxmessages` (
  `id_boxMessage` int(11) NOT NULL,
  `placed_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `nome_boxMessage` varchar(255) NOT NULL,
  `email_boxMessage` varchar(255) NOT NULL,
  `telefone_boxMessage` varchar(20) NOT NULL,
  `address_boxMessage` text NOT NULL,
  `payment_status` enum('pending','completed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `boxmessages`
--

INSERT INTO `boxmessages` (`id_boxMessage`, `placed_on`, `nome_boxMessage`, `email_boxMessage`, `telefone_boxMessage`, `address_boxMessage`, `payment_status`) VALUES
(1, '2023-03-28 14:54:22', 'dsadas', 'dsa@gmail.com', '1651618', 'dasdasdasdas', 'pending');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(14, 1, 10, 'Empresa localizada na cidade de Tanguá/RJ do ramo Comércio, contrata Representante Comercial. Atribu', 1300, 0, '14562369_5498791.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(7, 'aaa', 800, 'gordo-e-magro-mulher-gorda-e-magra-1598016339193_v2_900x506.jpg'),
(8, 'PEDREIRO', 2000, '1.png'),
(9, 'Enviar currículo (grátis). O seu currículo será analisado, em breve enviaremos um feedback.', 4445, 'Shopping-online-on-website-or-mobile-application-Clipart-PNG.png'),
(10, 'Enviar currículo (grátis). O seu currículo será analisado, em breve enviaremos um feedback', 20000, '14562369_5498791.jpg'),
(11, 'programador', 2000, '14562369_5498791.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'kevin', 'kevin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'a', 'a@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `boxmessages`
--
ALTER TABLE `boxmessages`
  ADD PRIMARY KEY (`id_boxMessage`);

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `boxmessages`
--
ALTER TABLE `boxmessages`
  MODIFY `id_boxMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
