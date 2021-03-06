USE mytcc;

-- Inclui os alunos com os seus respectivos usuarios

INSERT INTO StatusProjeto (id, statusProjeto) VALUES
(null, 'Aguardando');
INSERT INTO StatusProjeto (id, statusProjeto) VALUES
(null, 'Recusado');
INSERT INTO StatusProjeto (id, statusProjeto) VALUES
(null, 'Aceito');
INSERT INTO StatusProjeto (id, statusProjeto) VALUES
(null, 'Rejeitado');

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(1, 'ms.castanheira@gmail.com', '1234', 'aluno');
INSERT INTO Aluno (id, idUsuario, nome, matricula, endereco, telefone, cidade, estado, bairro) VALUES
(1, 1, 'Marcos', 123456, 'Rua Jackson de Figueiredo, 295','5198450033','Porto Alegre', 'RS', 'Sarandi');

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(2, 'thiago@gmail.com', '1234', 'aluno');
INSERT INTO Aluno (id, idUsuario, nome, matricula, endereco, telefone, cidade, estado, bairro) VALUES
(2, 2, 'Thiago', 234567, 'Rua dos Andradas, 295','5182901771','Porto Alegre', 'RS', 'Centro');

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(3, 'cristiano@gmail.com', '1234', 'aluno');
INSERT INTO Aluno (id, idUsuario, nome, matricula, endereco, telefone, cidade, estado, bairro) VALUES
(3, 3, 'Cristiano', 345678,'Av Cavalhada, 295','5192257575','Porto Alegre', 'RS', 'Cavalhada');

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(4, 'peppyno@gmail.com', '1234', 'aluno');
INSERT INTO Aluno (id, idUsuario, nome, matricula, endereco, telefone, cidade, estado, bairro) VALUES
(4, 4, 'Luís Henrique Paim' , 181202822, 'Rua 7 de Setembro, 295','5191633250','Porto Alegre', 'RS', 'Rio Branco');

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(5, 'vanessa@gmail.com', '1234', 'aluno');
INSERT INTO Aluno (id, idUsuario, nome, matricula, endereco, telefone, cidade, estado, bairro) VALUES
(5, 5, 'Vanessa', 567890, 'Rua Cel Genuíno, 295','5195559118','Porto Alegre', 'RS', 'Centro');


-- Área de interesse

INSERT INTO AreaInteresse (nomeArea) VALUES
('Desenvolvimento Desktop'),
('Desenvolvimento Web'),
('Banco de Dados'),
('Gerência de Projetos'),
('Teste de Software');


-- Inclui os professores com os seus respectivos usuarios

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(6, 'rafael@senacrs.com.br', '4321', 'professor');
INSERT INTO Professor (id, idUsuario, matricula, nome, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
(1, 6, 123456, 'Rafael Jeffman', 'Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 5, 1, 1);

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(7, 'aline@senacrs.com.br', '4321', 'professor');
INSERT INTO Professor (id, idUsuario, matricula, nome, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
(2, 7, 234567, 'Aline', 'Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 3, 0, 1);

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(8, 'ries@senacrs.com.br', '4321', 'professor');
INSERT INTO Professor (id, idUsuario, matricula, nome, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
(3, 8, 345678, 'Luiz Henrique Ries', 'Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 4, 1, 0);

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(9, 'carbonera@senacrs.com.br', '4321', 'professor');
INSERT INTO Professor (id, idUsuario, matricula, nome, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
(4, 9, 456789, 'Carbonera','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 6, 0, 1);

INSERT INTO Usuario (id, email, senha, tipo) VALUES
(10, 'casacurta@gmail.com', '4321', 'professor');
INSERT INTO Professor (id, idUsuario, matricula, nome, endereco, telefone, cidade, estado, bairro, numVagas, turnoDia, turnoNoite) VALUES
(5, 10, 567890, 'Gustavo','Rua Cel Genuíno, 130','5130221044','Porto Alegre', 'RS', 'Centro', 2, 1, 1);


-- Relaciona Professor com Área de Interesse

INSERT INTO ProfessorAreaInteresse
SELECT
	A.id,
    P.id
FROM Professor P
CROSS JOIN AreaInteresse A
WHERE
	P.Matricula = '123456'
    AND A.nomeArea IN (
		'Desenvolvimento Desktop',
        'Desenvolvimento Web',
        'Teste de Software'
	);

INSERT INTO ProfessorAreaInteresse
SELECT
	A.id,
    P.id
FROM Professor P
CROSS JOIN AreaInteresse A
WHERE
	P.Matricula = '234567'
    AND A.nomeArea IN (
		'Desenvolvimento Desktop',
		'Desenvolvimento Web',
		'Banco de Dados',
		'Gerência de Projetos',
		'Teste de Software'
	);

INSERT INTO ProfessorAreaInteresse
SELECT
	A.id,
    P.id
FROM Professor P
CROSS JOIN AreaInteresse A
WHERE
	P.Matricula = '345678'
    AND A.nomeArea IN (
		'Desenvolvimento Desktop',
		'Desenvolvimento Web',
		'Teste de Software'
	);

INSERT INTO ProfessorAreaInteresse
SELECT
	A.id,
    P.id
FROM Professor P
CROSS JOIN AreaInteresse A
WHERE
	P.Matricula = '456789'
    AND A.nomeArea IN (
		'Banco de Dados',
		'Teste de Software'
	);

INSERT INTO ProfessorAreaInteresse
SELECT
	A.id,
    P.id
FROM Professor P
CROSS JOIN AreaInteresse A
WHERE
	P.Matricula = '567890'
    AND A.nomeArea IN (
		'Desenvolvimento Desktop',
		'Desenvolvimento Web',
		'Banco de Dados',
		'Gerência de Projetos',
		'Teste de Software'
	);