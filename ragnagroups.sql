`script 'do' banco de dados ragnagroups`;

DROP DATABASE IF EXISTS ragnagroups;
CREATE DATABASE  ragnagroups;
USE ragnagroups;

CREATE TABLE IF NOT EXISTS `usuarios`(
	id				INT AUTO_INCREMENT PRIMARY KEY,
	login			VARCHAR(50) UNIQUE NOT NULL,
	nome		VARCHAR(50) NOT NULL,
	senha		VARCHAR(50) NOT NULL,
	email 		VARCHAR(80) UNIQUE NOT NULL,
	ativo   		CHAR(2), /*s ou n para ativo ou inativo*/
	dataCad	DATE NOT NULL,
	foto			VARCHAR(200), /*foto de perfil*/
	post			VARCHAR(500), /*esse campo é para pegar os id's dos post do usuario*/ 
	topico 		VARCHAR(100), /*esse campo deve receber os id's dos tópico do usuário, apenas topicos criados por ele.*/	
	ip				VARCHAR(20) /*guardar os ip's do usuário*/
);

CREATE TABLE IF NOT EXISTS `topico`(
	topID				INT AUTO_INCREMENT PRIMARY KEY,
	topAutor			VARCHAR(50) NOT NULL, /*nome do autor do topico ou login*/
	topNome			VARCHAR(100) NOT NULL UNIQUE, /*o nome do topico deve ser unico, caso tenha algo relacionado o mesmo deve ser um post dentro do topico */
	topPost				VARCHAR NOT NULL, /*esse campo deve conter todos posts, perguntas, respostas relacionados aos topicos, onde deve pegar o login/id do usario que comentar*/
	topConteudo 		VARCHAR NOT NULL, /*esse campo deve pegar todo conteudo do topico, ou seja, listar todos pots, caso queira pegar os posts daquele topico uso o campo topPost*/
	topDate				TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' /*data de criação do topico*/
);

CREATE TABLE IF NOT EXISTS `posts`( /*cada post deve estar atrelado à um tópico.*/
	postID				INT AUTO_INCREMENT PRIMARY KEY,
	postAutor			VARCHAR(50) NOT NULL UNIQUE, /*esse campo deve receber o login ou id do usuario autor do post*/
	postNome			VARCHAR(100) UNIQUE NOT NULL, /*nome do tópico ou post*/
	postConteudo	VARCHAR(500) NOT NULL, /*ess campo recebe todo conteudo do post, devo converter com php todos cararetes para htmml special chars...*/
	postData			TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' /*data de criação do post*/
);

INSERT INTO usuarios(id, login, nome, senha, email, ativo, dataCad, foto, post, topico, ip) VALUES(1, 'admin', 'daniel', 'admin', 'djr@br.ibm.com', 's', '10-01-2016',  'null', 'null', 'null', 'null');


 