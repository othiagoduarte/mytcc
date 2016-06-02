USE mytcc;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/05/2016 às 01:54
-- Versão do servidor: 10.1.10-MariaDB
-- Versão do PHP: 5.6.19



--
-- Banco de dados: `mytcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(11),
  `cpf` varchar(9) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `matricula`, `email`, `telefone`, `cpf`, `idUsuario`) VALUES
(1, 'Marcos', 123456, 'ms.castanheira@gmail.com', '5198450033', '123456000', 15),
(2, 'Thiago', 234567, 'thiago@gmail.com', '5182901771', '234567000', 16),
(3, 'Cristiano', 345678, 'cristiano@gmail.com', '5192257575', '345678000', 17),
(4, 'Luis Henrique', 456789, 'lh@gmail.com', '5191633250', '456789000', 18),
(5, 'Vanessa', 567890, 'vanessa@gmail.com', '5195559118', '567890000', 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `areainteresse`
--

CREATE TABLE `areainteresse` (
  `id` int(11) NOT NULL,
  `nomeArea` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `areainteresse`
--

INSERT INTO `areainteresse` (`id`, `nomeArea`) VALUES
(1, 'Desenvolvimento Desktop'),
(2, 'Desenvolvimento Web'),
(3, 'Banco de Dados'),
(4, 'Gerência de Projetos'),
(5, 'Teste de Software');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orientacao`
--

CREATE TABLE `orientacao` (
  `id` int(11) NOT NULL,
  `idProjeto` int(11) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `okAluno` bit(1) NOT NULL,
  `okProfessor` bit(1) NOT NULL,
  `anotacoesAluno` varchar(500) DEFAULT NULL,
  `anotacoesProfessor` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(11),
  `numVagas` int(11) NOT NULL,
  `turnoDia` bit(1) NOT NULL,
  `turnoNoite` bit(1) NOT NULL,
  `cpf` varchar(9) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `matricula`, `email`, `telefone`, `numVagas`, `turnoDia`, `turnoNoite`, `cpf`, `idUsuario`) VALUES
(1, 'Rafael', 123456, 'rafael@senacrs.com.br', '5130221044', 5, b'1', b'1', '000123456', 22),
(2, 'Aline', 234567, 'aline@senacrs.com.br', '5130221044', 3, b'0', b'1', '000234567', 23),
(3, 'Ries', 345678, 'ries@senacrs.com.br', '5130221044', 4, b'1', b'0', '000345678', 24),
(4, 'Carbonera', 456789, 'carbonera@senacrs.com.br', '5130221044', 6, b'0', b'1', '000456789', 25),
(5, 'Lizandro', 567890, 'rafael@senacrs.com.br', '5130221044', 2, b'1', b'1', '000567890', 26),
(6, 'Sr. Coordenador', 101010, 'admin@admin.com', '5133333333', 1, b'1', b'1', '000101010', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professorareainteresse`
--

CREATE TABLE `professorareainteresse` (
  `idAreaInteresse` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `professorareainteresse`
--

INSERT INTO `professorareainteresse` (`idAreaInteresse`, `idProfessor`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(3, 2),
(3, 4),
(3, 5),
(4, 2),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `resumo` varchar(500) NOT NULL,
  `idAreaInteresse` int(11) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `motivoRecusa` varchar(500) DEFAULT NULL,
  `mensagem` varchar(500) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `statusProjeto` int(11) NOT NULL,
  `dataSolicitacao` date NOT NULL,
  `dataResposta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `statusprojeto`
--

CREATE TABLE `statusprojeto` (
  `id` int(11) NOT NULL,
  `statusProjeto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `statusprojeto`
--

INSERT INTO `statusprojeto` (`id`, `statusProjeto`) VALUES
(1, 'Aguardando'),
(2, 'Recusado'),
(3, 'Aceito'),
(4, 'Rejeitado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `senha`, `tipo`) VALUES
(14, '000101010', 'admin', 'c'),
(15, '123456000', '123', 'a'),
(16, '234567000', '123', 'a'),
(17, '345678000', '123', 'a'),
(18, '456789000', '123', 'a'),
(19, '567890000', '123', 'a'),
(22, '000123456', '123', 'p'),
(23, '000234567', '123', 'p'),
(24, '000345678', '123', 'p'),
(25, '000456789', '123', 'p'),
(26, '000567890', '123', 'p');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula_2` (`matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `matricula` (`matricula`);

--
-- Índices de tabela `areainteresse`
--
ALTER TABLE `areainteresse`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orientacao`
--
ALTER TABLE `orientacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Orientacao_0` (`idProjeto`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula_2` (`matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `matricula` (`matricula`);

--
-- Índices de tabela `professorareainteresse`
--
ALTER TABLE `professorareainteresse`
  ADD PRIMARY KEY (`idAreaInteresse`,`idProfessor`),
  ADD KEY `FK_ProfessorAreaInteresse_1` (`idProfessor`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Projeto_0` (`idAluno`),
  ADD KEY `FK_Projeto_1` (`idProfessor`),
  ADD KEY `FK_Projeto_2` (`idAreaInteresse`);

--
-- Índices de tabela `statusprojeto`
--
ALTER TABLE `statusprojeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `areainteresse`
--
ALTER TABLE `areainteresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `orientacao`
--
ALTER TABLE `orientacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `statusprojeto`
--
ALTER TABLE `statusprojeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `orientacao`
--
ALTER TABLE `orientacao`
  ADD CONSTRAINT `FK_Orientacao_0` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`);

--
-- Restrições para tabelas `professorareainteresse`
--
ALTER TABLE `professorareainteresse`
  ADD CONSTRAINT `FK_ProfessorAreaInteresse_0` FOREIGN KEY (`idAreaInteresse`) REFERENCES `areainteresse` (`id`),
  ADD CONSTRAINT `FK_ProfessorAreaInteresse_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`);

--
-- Restrições para tabelas `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `FK_Projeto_0` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `FK_Projeto_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `FK_Projeto_2` FOREIGN KEY (`idAreaInteresse`) REFERENCES `areainteresse` (`id`);


