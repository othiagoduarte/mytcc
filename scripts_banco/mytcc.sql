--
-- Base de Dados: `mytcc`
--
CREATE DATABASE IF NOT EXISTS `mytcc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mytcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `cpf` varchar(9) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_2` (`matricula`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `matricula` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `matricula`, `email`, `telefone`, `cpf`, `idUsuario`) VALUES
(1, 'Marcos', 123456, 'ms.castanheira@gmail.com', '5198450033', '123456000', 15),
(2, 'Thiago', 234567, 'thiago@gmail.com', '5182901771', '234567000', 16),
(3, 'Cristiano', 345678, 'cristiano@gmail.com', '5192257575', '345678000', 17),
(4, 'Luis Henrique', 456789, 'lh@gmail.com', '5191633250', '456789000', 18),
(5, 'Vanessa', 567890, 'vanessa@gmail.com', '5195559118', '567890000', 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `areainteresse`
--

CREATE TABLE IF NOT EXISTS `areainteresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeArea` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `areainteresse`
--

INSERT INTO `areainteresse` (`id`, `nomeArea`) VALUES
(1, 'Desenvolvimento Desktop'),
(2, 'Desenvolvimento Web'),
(3, 'Banco de Dados'),
(4, 'Gerência de Projetos'),
(5, 'Teste de Software');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orientacao`
--

CREATE TABLE IF NOT EXISTS `orientacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProjeto` int(11) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anotacoesAgendamento` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Orientacao_0` (`idProjeto`),
  KEY `FK_Orientacao_1` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `numVagas` int(11) NOT NULL,
  `turnoDia` bit(1) NOT NULL,
  `turnoNoite` bit(1) NOT NULL,
  `cpf` varchar(9) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_2` (`matricula`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `matricula` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `professor`
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
-- Estrutura da tabela `professorareainteresse`
--

CREATE TABLE IF NOT EXISTS `professorareainteresse` (
  `idAreaInteresse` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  PRIMARY KEY (`idAreaInteresse`,`idProfessor`),
  KEY `FK_ProfessorAreaInteresse_1` (`idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professorareainteresse`
--

INSERT INTO `professorareainteresse` (`idAreaInteresse`, `idProfessor`) VALUES
(1, 1),
(2, 1),
(5, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(1, 3),
(2, 3),
(5, 3),
(3, 4),
(5, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAluno` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `resumo` varchar(500) NOT NULL,
  `idAreaInteresse` int(11) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `motivoRecusa` varchar(500) DEFAULT NULL,
  `mensagem` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `numOrientacoes` int(11) NOT NULL,
  `dataSolicitacao` date NOT NULL,
  `dataResposta` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Projeto_0` (`idAluno`),
  KEY `FK_Projeto_1` (`idProfessor`),
  KEY `FK_Projeto_2` (`idAreaInteresse`),
  KEY `FK_Projeto_3` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusorientacao`
--

CREATE TABLE IF NOT EXISTS `statusorientacao` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `statusorientacao`
--

INSERT INTO `statusorientacao` (`id`, `status`) VALUES
(1, 'Enviada'),
(2, 'Agendada'),
(3, 'Recusada'),
(4, 'Compareceu'),
(5, 'Não compareceu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusprojeto`
--

CREATE TABLE IF NOT EXISTS `statusprojeto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusProjeto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `statusprojeto`
--

INSERT INTO `statusprojeto` (`id`, `statusProjeto`) VALUES
(1, 'Aguardando'),
(2, 'Recusado'),
(3, 'Aceito'),
(4, 'Rejeitado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `usuario`
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
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `orientacao`
--
ALTER TABLE `orientacao`
  ADD CONSTRAINT `FK_Orientacao_0` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`),
  ADD CONSTRAINT `FK_Orientacao_1` FOREIGN KEY (`status`) REFERENCES `statusorientacao` (`id`);

--
-- Limitadores para a tabela `professorareainteresse`
--
ALTER TABLE `professorareainteresse`
  ADD CONSTRAINT `FK_ProfessorAreaInteresse_0` FOREIGN KEY (`idAreaInteresse`) REFERENCES `areainteresse` (`id`),
  ADD CONSTRAINT `FK_ProfessorAreaInteresse_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `FK_Projeto_0` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `FK_Projeto_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `FK_Projeto_2` FOREIGN KEY (`idAreaInteresse`) REFERENCES `areainteresse` (`id`),
  ADD CONSTRAINT `FK_Projeto_3` FOREIGN KEY (`status`) REFERENCES `statusprojeto` (`id`);
