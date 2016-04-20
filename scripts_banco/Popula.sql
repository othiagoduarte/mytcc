-- Aluno

INSERT INTO Aluno (nome, matricula, email, endereco, telefone, cidade, estado, bairro) VALUES
('Marcos',123456,'ms.castanheira@gmail.com','Rua Jackson de Figueiredo, 295','5198450033','Porto Alegre', 'RS', 'Sarandi');

INSERT INTO Aluno (nome, matricula, email, endereco, telefone, cidade, estado, bairro) VALUES
('Thiago',234567,'thiago@gmail.com','Rua dos Andradas, 295','5182901771','Porto Alegre', 'RS', 'Centro');

INSERT INTO Aluno (nome, matricula, email, endereco, telefone, cidade, estado, bairro) VALUES
('Cristiano',345678,'cristiano@gmail.com','Av Cavalhada, 295','5192257575','Porto Alegre', 'RS', 'Cavalhada');

INSERT INTO Aluno (nome, matricula, email, endereco, telefone, cidade, estado, bairro) VALUES
('Luis Henrique',456789,'lh@gmail.com','Rua 7 de Setembro, 295','5191633250','Porto Alegre', 'RS', 'Centro');

INSERT INTO Aluno (nome, matricula, email, endereco, telefone, cidade, estado, bairro) VALUES
('Vanessa',567890,'vanessa@gmail.com','Rua Cel Genuíno, 295','5195559118','Porto Alegre', 'RS', 'Centro');


-- Área de interesse

INSERT INTO AreaInteresse (nomeArea) VALUES
('Desenvolvimento Desktop'),
('Desenvolvimento Web'),
('Banco de Dados'),
('Gerência de Projetos'),
('Teste de Software');


-- Professor

INSERT INTO Professor (nome, matricula, email, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
('Rafael',123456,'rafael@senacrs.com.br','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 5, 1, 1);

INSERT INTO Professor (nome, matricula, email, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
('Aline',234567,'aline@senacrs.com.br','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 3, 0, 1);

INSERT INTO Professor (nome, matricula, email, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
('Ries',345678,'ries@senacrs.com.br','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 4, 1, 0);

INSERT INTO Professor (nome, matricula, email, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
('Carbonera',456789,'carbonera@senacrs.com.br','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 6, 0, 1);

INSERT INTO Professor (nome, matricula, email, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
('Lizandro',567890,'rafael@senacrs.com.br','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 2, 1, 1);


-- Relaciona Professor com Área de Interesse

INSERT INTO ProfessorAreaInteresse (idAreaInteresse,idProfessor) VALUES
(1,10),
(2,9),
(3,8),
(4,8),
(5,6),
(1,7),
(2,7),
(3,8),
(4,7),
(5,10);