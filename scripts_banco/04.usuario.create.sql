USE mytcc;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
);

ALTER TABLE aluno
ADD COLUMN cpf VARCHAR(9);

ALTER TABLE aluno ADD
UNIQUE KEY cpf (cpf);

ALTER TABLE professor
ADD COLUMN cpf VARCHAR(9);

ALTER TABLE professor ADD
UNIQUE KEY cpf (cpf);

UPDATE aluno
SET cpf = left(concat(matricula, '', '000000'), 9)
WHERE id <> -1;

UPDATE professor
SET cpf = right(concat('000000', '', matricula), 9)
WHERE id <> -1;

ALTER TABLE aluno
MODIFY COLUMN cpf VARCHAR(9) NOT NULL;

ALTER TABLE professor
MODIFY COLUMN cpf VARCHAR(9) NOT NULL;

INSERT INTO usuario
	SELECT
		NULL,
		cpf,
        '123',
        CAST('a' AS CHAR(1))
	FROM aluno;

INSERT INTO usuario
	SELECT
		NULL,
		cpf,
        '123',
        CAST('p' AS CHAR(1))
	FROM professor;

ALTER TABLE aluno
ADD COLUMN idUsuario int(11);

ALTER TABLE professor
ADD COLUMN idUsuario int(11);

UPDATE aluno
INNER JOIN usuario
	ON usuario.user = aluno.cpf
SET aluno.idUsuario = usuario.id;

UPDATE professor
INNER JOIN usuario
	ON usuario.user = professor.cpf
SET professor.idUsuario = usuario.id;

ALTER TABLE aluno
MODIFY COLUMN idUsuario int(11) NOT NULL;

ALTER TABLE professor
MODIFY COLUMN idUsuario int(11) NOT NULL;