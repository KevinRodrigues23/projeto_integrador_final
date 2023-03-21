-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Mar-2023 às 16:18
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
-- Banco de dados: `first_work`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `CNPJ` varchar(100) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `Local` varchar(100) DEFAULT NULL,
  `Hora_Funcionamento` varchar(100) DEFAULT NULL,
  `Logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `CNPJ`, `nome`, `Local`, `Hora_Funcionamento`, `Logo`) VALUES
(1, '189489', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_vaga`
--

CREATE TABLE `log_vaga` (
  `id` int(11) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `reg_cnpj` int(11) NOT NULL,
  `reg_vaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `CPF` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `Data_nascimento` date DEFAULT NULL,
  `formacao` varchar(300) DEFAULT NULL,
  `Endereco` varchar(200) DEFAULT NULL,
  `Bairro` varchar(200) DEFAULT NULL,
  `Estado` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `rede_social` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `CPF`, `telefone`, `Data_nascimento`, `formacao`, `Endereco`, `Bairro`, `Estado`, `email`, `descr`, `img`, `rede_social`) VALUES
(1, 'dsa', '', '', '0000-00-00', '', '', '', '', '', '', '', ''),
(2, 'ty', '000', '', '0000-00-00', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `id` int(11) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Salario` float NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `Requisitos` varchar(250) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_emp` int(11) DEFAULT NULL,
  `Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id_vaga` int(11) NOT NULL,
  `Cargo` text NOT NULL,
  `Salario` float NOT NULL,
  `Carga_horaria` datetime NOT NULL,
  `Requisitos` text NOT NULL,
  `Categoria` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id_vaga`, `Cargo`, `Salario`, `Carga_horaria`, `Requisitos`, `Categoria`, `id_usuario`, `id_emp`) VALUES
(1, 'Administração', 2000, '2023-03-21 14:31:05', 'trabalha todos os dias', 'item', 0, 0),
(2, 'medico', 2000, '2023-03-21 14:57:08', 'dsadsadas', 'item', 0, 0),
(3, 'Pedreiro', 1000, '2023-03-21 15:05:15', 'se bom em pedreiro', 'item', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_vaga`
--
ALTER TABLE `log_vaga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_cnpj` (`reg_cnpj`),
  ADD KEY `reg_vaga` (`reg_vaga`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id_vaga`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `log_vaga`
--
ALTER TABLE `log_vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id_vaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `log_vaga`
--
ALTER TABLE `log_vaga`
  ADD CONSTRAINT `log_vaga_ibfk_1` FOREIGN KEY (`reg_cnpj`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `log_vaga_ibfk_2` FOREIGN KEY (`reg_vaga`) REFERENCES `vaga` (`id`);

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `vaga_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `vaga_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empresa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
