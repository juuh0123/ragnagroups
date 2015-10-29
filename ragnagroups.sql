`script 'do' banco de dados ragnagroups`;

DROP DATABASE IF EXISTS ragnagroups;
CREATE DATABASE  ragnagroups;
USE ragnagroups;

CREATE TABLE IF NOT EXISTS `usuarios`(
	id			INT AUTO_INCREMENT PRIMARY KEY,
	login		VARCHAR(50) UNIQUE NOT NULL,
	nome		varchar(50) NOT NULL,
	senha		VARCHAR(50) NOT NULL,
	email 		VARCHAR(80) UNIQUE NOT NULL,
	ativo   	CHAR(2), /*s ou n para ativo ou inativo*/
	dataCad		date NOT NULL,
	foto		VARCHAR(200), /*foto de perfil*/
	post		VARCHAR(100), /*esse campo é para pegar os id's dos post do usuario*/ 
	topico 		VARCHAR(100), /*esse campo deve receber os id's dos tópico do usuário, apenas topicos criados por ele.*/	
	ip			varchar(20) /*guardar os ip's do usuário*/
);

CREATE TABLE IF NOT EXISTS `topico`(
	topID			INT AUTO_INCREMENT PRIMARY KEY,
	topAutor		VARCHAR(50) NOT null unique, /*nome do autor do topico*/
	topNome			VARCHAR(100) NOT NULL UNIQUE, /*o nome do topico deve ser unico, caso tenha algo relacionado o mesmo deve ser um post dentro do topico */
	topPost			VARCHAR not null, /*esse campo deve conte todos posts, perguntas, respostas relacionados aos topicos, onde deve pegar o login/id do usario que comentar*/
	topConteudo 	VACHAR NOT NULL, /*esse campo deve pegar todo conteudo do topico, ou seja, listar todos tópicos, caso queira pegar os posts daquele topico uso o campo topPost*/
	topDate			DATE /*data de criação do topico*/
);

CREATE TABLE IF NOT EXISTS `posts`( /*cada post deve estar atrelado à um tópico.*/
	postID			INT AUTO_INCREMENT PRIMARY KEY,
	postAutor		VARCHAR(50) NOT NULL UNIQUE, /*esse campo deve receber o login ou id do usuario autor do post*/
	postNome		VARCHAR(100) UNIQUE NOT NULL, /*nome do tópico ou post*/
	postConteudo	VARCHAR NOT NULL, /*ess campo recebe todo conteudo do post, devo converter com php todos cararetes para htmml specil chars...*/
	postData		DATE /*data de criação do post*/
);




 