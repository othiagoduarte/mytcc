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

CREATE TABLE IF NOT EXISTS `orientacao` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProjeto` int(11) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `local` varchar(100) DEFAULT NULL,
  `anotacoesAgendamento` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Orientacao_0` (`idProjeto`),
  KEY `FK_Orientacao_1` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `orientacao`
--

INSERT INTO `orientacao`(`id`, `idProjeto`, `datahora`, `anotacoesAgendamento`, `status`, `feedback`) VALUES
(1, 5, '2016/05/15 10:10:00', null, 4, 'boa orientacao'),
(2, 5, '2016/05/16 10:10:00', null, 3, null),
(3, 5, '2016/05/17 10:10:00', null, 4, 'boa orientacao'),
(4, 5, '2016/05/18 10:10:00', null, 4, 'boa orientacao'),
(5, 5, '2016/05/19 10:10:00', null, 5, null),
(6, 5, '2016/05/20 10:10:00', null, 4, 'boa orientacao'),
(7, 5, '2016/05/21 10:10:00', null, 5, null),
(8, 6, '2016/05/16 10:10:00', null, 4, 'boa orientacao'),
(9, 6, '2016/05/17 10:10:00', null, 4, 'boa orientacao'),
(10, 6, '2016/05/18 10:10:00', null, 4, 'boa orientacao'),
(11, 12, '2016/05/15 10:10:00', null, 4, 'boa orientacao'),
(12, 12, '2016/05/16 10:10:00', null, 4, 'boa orientacao'),
(13, 12, '2016/05/17 10:10:00', null, 5, null),
(14, 12, '2016/05/18 10:10:00', null, 4, 'boa orientacao'),
(15, 12, '2016/05/19 10:10:00', null, 4, 'boa orientacao'),
(16, 12, '2016/05/20 10:10:00', null, 5, null),
(17, 16, '2016/05/15 10:10:00', null, 4, 'boa orientacao'),
(18, 16, '2016/05/16 10:10:00', null, 4, 'boa orientacao'),
(19, 16, '2016/05/17 10:10:00', null, 4, 'boa orientacao'),
(20, 16, '2016/05/18 10:10:00', null, 4, 'boa orientacao'),
(21, 5, '2016/06/13 10:10:00', null, 1, null),
(22, 5, '2016/06/14 10:10:00', null, 1, null),
(23, 5, '2016/06/15 10:10:00', null, 1, null),
(24, 5, '2016/06/16 10:10:00', null, 1, null),
(25, 5, '2016/06/17 10:10:00', null, 1, null);

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
-- Extraindo dados da tabela `projeto`
--
INSERT INTO `projeto`(`id`, `idAluno`, `idProfessor`, `titulo`, `resumo`, `idAreaInteresse`, `turno`, `motivoRecusa`, `mensagem`, `status`, `numOrientacoes`, `dataSolicitacao`, `dataResposta`) 
VALUES
-- Solicitacoes do Marcos
(1, 1, 1, 'projeto do marcos', 'resumo do projeto do marcos', 1, 'noite', null, null, 1, 0, '2016/05/10', null),
(2, 1, 2, 'projeto do marcos', 'resumo do projeto do marcos', 1, 'noite', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(3, 1, 3, 'projeto do marcos', 'resumo do projeto do marcos', 1, 'noite', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(4, 1, 4, 'projeto do marcos', 'resumo do projeto do marcos', 1, 'noite', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(5, 1, 5, 'projeto do marcos', 'resumo do projeto do marcos', 1, 'noite', 'gostei', null, 3, 0, '2016/05/10', '2016/05/11'),
-- Solicitacoes do Thiago
(6, 2, 1, 'projeto do thiago', 'resumo do projeto do thiago', 2, 'n', 'gostei', null, 3, 0, '2016/05/10', '2016/05/11'),
(7, 2, 2, 'projeto do thiago', 'resumo do projeto do thiago', 2, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(8, 2, 3, 'projeto do thiago', 'resumo do projeto do thiago', 2, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(9, 2, 4, 'projeto do thiago', 'resumo do projeto do thiago', 2, 'n', null, null, 1, 0, '2016/05/10', null),
(10, 2, 5, 'projeto do marcos', 'resumo do projeto do thiago', 2, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
-- Solicitacoes do Cristiano
(11, 3, 1, 'projeto do cristiano', 'resumo do projeto do cristiano', 3, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(12, 3, 2, 'projeto do cristiano', 'resumo do projeto do cristiano', 3, 'n', 'gostei', null, 3, 0, '2016/05/10', '2016/05/11'),
(13, 3, 3, 'projeto do cristiano', 'resumo do projeto do cristiano', 3, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(14, 3, 4, 'projeto do cristiano', 'resumo do projeto do cristiano', 3, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(15, 3, 5, 'projeto do cristiano', 'resumo do projeto do cristiano', 3, 'n', null, null, 1, 0, '2016/05/10', null),
-- Solicitacoes do Luis Henrqiue
(16, 4, 1, 'projeto do luis', 'resumo do projeto do luis', 4, 'n', 'gostei', null, 3, 0, '2016/05/10', '2016/05/11'),
(17, 4, 2, 'projeto do luis', 'resumo do projeto do luis', 4, 'n', null, null, 1, 0, '2016/05/10', null),
(18, 4, 3, 'projeto do luis', 'resumo do projeto do luis', 4, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(19, 4, 4, 'projeto do luis', 'resumo do projeto do luis', 4, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(20, 4, 5, 'projeto do luis', 'resumo do projeto do luis', 4, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
-- Solicitacoes da Vanessa
(21, 5, 1, 'projeto da vanessa', 'resumo do projeto da vanessa', 5, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(22, 5, 2, 'projeto da vanessa', 'resumo do projeto da vanessa', 5, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(23, 5, 3, 'projeto da vanessa', 'resumo do projeto da vanessa', 5, 'n', 'nao gostei', null, 2, 0, '2016/05/10', '2016/05/11'),
(24, 5, 4, 'projeto da vanessa', 'resumo do projeto da vanessa', 5, 'n', 'gostei', null, 3, 0, '2016/05/10', '2016/05/11'),
(25, 5, 5, 'projeto da vanessa', 'resumo do projeto da vanessa', 5, 'n', 'nao gostei', null, 1, 0, '2016/05/10', '2016/05/11');
-- ------------------------------------------------------

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
