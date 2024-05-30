-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/05/2024 às 14:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nordicfinance`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(35) NOT NULL,
  `idTipoMovimentacao` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`, `idTipoMovimentacao`, `idUsuario`) VALUES
(1, 'Rendas Principais', 1, NULL),
(2, 'Rendas Adicionais', 1, NULL),
(3, 'Bônus e prêmios', 1, NULL),
(4, 'Vendas', 1, NULL),
(5, 'Benefícios', 1, NULL),
(6, 'Investimento', 1, NULL),
(7, 'Residência', 2, NULL),
(8, 'Alimentação', 2, NULL),
(9, 'Transporte', 2, NULL),
(10, 'Saúde', 2, NULL),
(11, 'Educação', 2, NULL),
(12, 'Cartão de Crédito', 2, NULL),
(13, 'Lazer', 2, NULL),
(14, 'Pessoal', 2, NULL),
(15, 'Seguros', 2, NULL),
(16, 'Impostos', 2, NULL),
(17, 'Animais Domésticos', 2, NULL),
(18, 'Vouchers', 3, NULL),
(19, 'Outros', 1, NULL),
(20, 'Outros', 2, NULL),
(21, 'Entre contas', 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `coabitanteusuario`
--

CREATE TABLE `coabitanteusuario` (
  `idCoabitanteUsuario` int(11) NOT NULL,
  `nomeCoabitante` varchar(50) NOT NULL,
  `idUsuarioPrincipal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `coabitanteusuario`
--

INSERT INTO `coabitanteusuario` (`idCoabitanteUsuario`, `nomeCoabitante`, `idUsuarioPrincipal`) VALUES
(1, 'Nicole Bergamo de Santana', 1),
(2, 'Camila', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `idMovimentacao` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idSubCategoria` int(11) DEFAULT NULL,
  `idTipoMovimentacao` int(11) DEFAULT NULL,
  `dataAviso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`idMovimentacao`, `descricao`, `data`, `valor`, `idUsuario`, `idCategoria`, `idSubCategoria`, `idTipoMovimentacao`, `dataAviso`) VALUES
(1, 'Salário Guilherme', '2024-06-01 00:00:00', 2438.16, 1, 1, 1, 1, NULL),
(2, 'Nicole', '2024-06-01 00:00:00', 3650.00, 1, 1, 1, 1, NULL),
(3, 'Presente tia da Nicole', '2024-06-01 00:00:00', 200.00, 1, 19, 46, 1, NULL),
(4, 'Guilherme', '2024-06-01 00:00:00', 143.00, 1, 3, 4, 1, NULL),
(5, 'Guilherme', '2024-06-01 00:00:00', 540.00, 1, 18, 44, 3, NULL),
(6, '', '2024-06-07 00:00:00', 1786.72, 1, 7, 47, 2, NULL),
(7, '', '2024-06-07 00:00:00', 182.78, 1, 7, 13, 2, NULL),
(8, 'Contadora (IR)', '2024-06-01 00:00:00', 160.00, 1, 20, 48, 2, NULL),
(9, '', '2024-06-05 00:00:00', 3681.37, 1, 12, 30, 2, NULL),
(10, 'Poupança Forçada', '2024-06-01 00:00:00', 100.00, 1, 21, 49, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSubCategoria` int(11) NOT NULL,
  `nomeSubCategoria` varchar(35) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `nomeSubCategoria`, `idCategoria`, `idUsuario`) VALUES
(1, 'Salário', 1, NULL),
(2, '13º Salário', 1, NULL),
(3, 'Freelancer', 2, NULL),
(4, 'PLR', 3, NULL),
(5, 'Outros Bônus', 3, NULL),
(6, 'Itens Pessoais', 4, NULL),
(7, 'Investimentos', 4, NULL),
(8, 'Seguro Desemprego', 5, NULL),
(9, 'Bolsa Familia', 5, NULL),
(10, 'Lucros', 6, NULL),
(11, 'Aluguel', 7, NULL),
(12, 'Água', 7, NULL),
(13, 'Energia Elétrica', 7, NULL),
(14, 'Gás', 7, NULL),
(15, 'Condomínio', 7, NULL),
(16, 'Manutenção e Reparos', 7, NULL),
(17, 'Supermercado', 8, NULL),
(18, 'Restaurantes', 8, NULL),
(19, 'Aplicativos de delivery', 8, NULL),
(20, 'Combustível', 9, NULL),
(21, 'Transporte Publico', 9, NULL),
(22, 'Manutenção', 9, NULL),
(23, 'Estacionamento', 9, NULL),
(24, 'Medicamentos', 10, NULL),
(25, 'Plano de Saúde', 10, NULL),
(26, 'Plano Odontológico', 10, NULL),
(27, 'Mensalidade Escolar', 11, NULL),
(28, 'Livros e materiais', 11, NULL),
(29, 'Cursos', 11, NULL),
(30, 'Cartão - Completo', 12, NULL),
(31, 'Ingressos', 13, NULL),
(32, 'Viagem', 13, NULL),
(33, 'Barbearia e Salão de Belezada', 14, NULL),
(34, 'Produtos de Higiene Pessoal', 14, NULL),
(35, 'Vestuário e acessórios', 14, NULL),
(36, 'Residêncial', 15, NULL),
(37, 'Automóvel', 15, NULL),
(38, 'Vida', 15, NULL),
(39, 'Imposto de Renda', 16, NULL),
(40, 'Alimentação', 17, NULL),
(41, 'Medicamentos e Vacinas', 17, NULL),
(42, 'Outros', 17, NULL),
(43, 'Vale Refeição', 18, NULL),
(44, 'Vale Alimentação', 18, NULL),
(45, 'Vale Transporte', 18, NULL),
(46, 'Outros', 19, NULL),
(47, 'Financiamento', 7, NULL),
(48, 'Outros', 20, NULL),
(49, 'Poupança', 21, NULL),
(50, 'Tesouro Direto', 21, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipomovimentacao`
--

CREATE TABLE `tipomovimentacao` (
  `idTipoMovimentacao` int(11) NOT NULL,
  `especieMovimentacao` enum('Positivo','Negativo','Neutro') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipomovimentacao`
--

INSERT INTO `tipomovimentacao` (`idTipoMovimentacao`, `especieMovimentacao`) VALUES
(1, 'Positivo'),
(2, 'Negativo'),
(3, 'Neutro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descricao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `descricao`) VALUES
(1, 'Adm'),
(2, 'Comum');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  `sexo` enum('Masculino','Feminino') DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `fotoPerfil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `dataNasc`, `telefone`, `cpf`, `email`, `senha`, `sexo`, `idTipoUsuario`, `fotoPerfil`) VALUES
(1, 'Guilherme Davila de Souza', '1999-02-10', '(47)99790-1880', '08143419932', 'davilaa754@gmail.com', '202cb962ac59075b964b07152d234b70', 'Masculino', 1, 'dist/img/fotoPerfilGuilherme.jpg'),
(2, 'Eduardo Angeli', '2004-11-15', '(47)99999-9999', '08143419934', 'a@a.com.br', '202cb962ac59075b964b07152d234b70', 'Masculino', 1, NULL),
(3, 'Matheus Borba', '1111-02-10', '(47)99999-9999', '08143419935', 'b@b.com.br', '202cb962ac59075b964b07152d234b70', 'Masculino', 1, NULL),
(4, 'Convidado', '1000-01-01', '', '', '', '202cb962ac59075b964b07152d234b70', 'Masculino', 1, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `idTipoMovimentacao` (`idTipoMovimentacao`);

--
-- Índices de tabela `coabitanteusuario`
--
ALTER TABLE `coabitanteusuario`
  ADD PRIMARY KEY (`idCoabitanteUsuario`),
  ADD KEY `idUsuarioPrincipal` (`idUsuarioPrincipal`);

--
-- Índices de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`idMovimentacao`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idSubCategoria` (`idSubCategoria`),
  ADD KEY `idTipoMovimentacao` (`idTipoMovimentacao`);

--
-- Índices de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSubCategoria`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices de tabela `tipomovimentacao`
--
ALTER TABLE `tipomovimentacao`
  ADD PRIMARY KEY (`idTipoMovimentacao`);

--
-- Índices de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `coabitanteusuario`
--
ALTER TABLE `coabitanteusuario`
  MODIFY `idCoabitanteUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `idMovimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tipomovimentacao`
--
ALTER TABLE `tipomovimentacao`
  MODIFY `idTipoMovimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`idTipoMovimentacao`) REFERENCES `tipomovimentacao` (`idTipoMovimentacao`);

--
-- Restrições para tabelas `coabitanteusuario`
--
ALTER TABLE `coabitanteusuario`
  ADD CONSTRAINT `coabitanteusuario_ibfk_1` FOREIGN KEY (`idUsuarioPrincipal`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `movimentacao_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `movimentacao_ibfk_3` FOREIGN KEY (`idSubCategoria`) REFERENCES `subcategoria` (`idSubCategoria`),
  ADD CONSTRAINT `movimentacao_ibfk_4` FOREIGN KEY (`idTipoMovimentacao`) REFERENCES `tipomovimentacao` (`idTipoMovimentacao`);

--
-- Restrições para tabelas `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
