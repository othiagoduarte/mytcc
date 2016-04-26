USE mytcc;

-- Limpar banco

/*
ALTER TABLE ProfessorAreaInteresse DROP FOREIGN KEY FK_ProfessorAreaInteresse_0;
ALTER TABLE ProfessorAreaInteresse DROP FOREIGN KEY FK_ProfessorAreaInteresse_1;

ALTER TABLE Projeto DROP FOREIGN KEY FK_Projeto_0;
ALTER TABLE Projeto DROP FOREIGN KEY FK_Projeto_1;
ALTER TABLE Projeto DROP FOREIGN KEY FK_Projeto_2;

ALTER TABLE Orientacao DROP FOREIGN KEY FK_Orientacao_0;

DROP TABLE Aluno;

DROP TABLE AreaInteresse;

DROP TABLE Professor;

DROP TABLE ProfessorAreaInteresse;

DROP TABLE Projeto;

DROP TABLE Orientacao;
*/

-- Criar banco

CREATE TABLE Aluno (
 id INT NOT NULL AUTO_INCREMENT,
 idUsuario INT NOT NULL,
 matricula INT NOT NULL,
 endereco VARCHAR(70) NOT NULL,
 telefone VARCHAR(11) NOT NULL,
 cidade VARCHAR(50) NOT NULL,
 estado VARCHAR(2) NOT NULL,
 bairro VARCHAR(50) NOT NULL,
 PRIMARY KEY (id),
 KEY(matricula)
);

ALTER TABLE Aluno ADD UNIQUE (matricula);
ALTER TABLE Aluno ADD CONSTRAINT FK_Aluno_0 FOREIGN KEY (idUsuario) REFERENCES Usuario (id);

CREATE TABLE Professor (
 id INT NOT NULL AUTO_INCREMENT,
 idUsuario INT NOT NULL,
 matricula INT NOT NULL,
 endereco VARCHAR(50) NOT NULL,
 telefone VARCHAR(11) NOT NULL,
 cidade VARCHAR(50) NOT NULL,
 estado VARCHAR(2) NOT NULL,
 bairro VARCHAR(50) NOT NULL,
 numVagas INT NOT NULL,
 turnoDia BIT(1) NOT NULL,
 turnoNoite BIT(1) NOT NULL,
 PRIMARY KEY (id),
 KEY (matricula)
);

ALTER TABLE Professor ADD UNIQUE (matricula);
ALTER TABLE Professor ADD CONSTRAINT FK_Usuario_0 FOREIGN KEY (idUsuario) REFERENCES Usuario (id);

CREATE TABLE Usuario (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(70) NOT NULL,
  nome VARCHAR(50) NOT NULL,
  senha VARCHAR(16) NOT NULL,
  PRIMARY KEY (id)    
);

CREATE TABLE AreaInteresse (
 id INT NOT NULL AUTO_INCREMENT,
 nomeArea VARCHAR(50) NOT NULL,
 PRIMARY KEY (id)
);


CREATE TABLE ProfessorAreaInteresse (
 idAreaInteresse INT NOT NULL,
 idProfessor INT NOT NULL
);

ALTER TABLE ProfessorAreaInteresse ADD CONSTRAINT PK_ProfessorAreaInteresse PRIMARY KEY (idAreaInteresse,idProfessor);


CREATE TABLE Projeto (
 id INT NOT NULL AUTO_INCREMENT,
 idAluno INT NOT NULL,
 idProfessor INT NOT NULL,
 titulo VARCHAR(100) NOT NULL,
 resumo VARCHAR(500) NOT NULL,
 idAreaInteresse INT NOT NULL,
 turno VARCHAR(10) NOT NULL,
 motivoRecusa VARCHAR(500),
 mensagem VARCHAR(500),
 status VARCHAR(10),
 PRIMARY KEY (id)
);


CREATE TABLE Orientacao (
 id INT NOT NULL AUTO_INCREMENT,
 idProjeto INT NOT NULL,
 datahora TIMESTAMP NOT NULL,
 okAluno BIT(1) NOT NULL,
 okProfessor BIT(1) NOT NULL,
 anotacoesAluno VARCHAR(500),
 anotacoesProfessor VARCHAR(500),
 PRIMARY KEY (id)
);


ALTER TABLE ProfessorAreaInteresse ADD CONSTRAINT FK_ProfessorAreaInteresse_0 FOREIGN KEY (idAreaInteresse) REFERENCES AreaInteresse (id);
ALTER TABLE ProfessorAreaInteresse ADD CONSTRAINT FK_ProfessorAreaInteresse_1 FOREIGN KEY (idProfessor) REFERENCES Professor (id);


ALTER TABLE Projeto ADD CONSTRAINT FK_Projeto_0 FOREIGN KEY (idAluno) REFERENCES Aluno (id);
ALTER TABLE Projeto ADD CONSTRAINT FK_Projeto_1 FOREIGN KEY (idProfessor) REFERENCES Professor (id);
ALTER TABLE Projeto ADD CONSTRAINT FK_Projeto_2 FOREIGN KEY (idAreaInteresse) REFERENCES AreaInteresse (id);


ALTER TABLE Orientacao ADD CONSTRAINT FK_Orientacao_0 FOREIGN KEY (idProjeto) REFERENCES Projeto (id);


