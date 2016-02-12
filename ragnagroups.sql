`script 'do' banco de dados ragnagroups`;

DROP DATABASE IF EXISTS ragnagroups;
CREATE DATABASE  ragnagroups;
USE ragnagroups;

CREATE TABLE IF NOT EXISTS `users`(
	user_id						INT AUTO_INCREMENT PRIMARY KEY,
	user_login					VARCHAR(50) UNIQUE NOT NULL,
	user_name				VARCHAR(50) NOT NULL,
	user_pass					VARCHAR(50) NOT NULL,
	user_mail 					VARCHAR(80) UNIQUE NOT NULL,
	user_ativo   				CHAR(2), /*s ou n para ativo ou inativo*/
	user_date					DATE NOT NULL,/*data de criação da conta*/
	user_photo				VARCHAR(200), /*foto de perfil*/
	user_post_id	(ce)		VARCHAR(500), /*esse campo é para pegar os id's dos post do usuario*/ 
	user_topic_id (ce)		VARCHAR(100), /*esse campo deve receber os id's dos tópico do usuário, apenas topicos criados por ele.*/	
	user_ip						VARCHAR(20) /*guardar os ip's do usuário*/
);

CREATE TABLE IF NOT EXISTS `topics`(
	top_id					INT AUTO_INCREMENT PRIMARY KEY,
	top_user_id (ce)	VARCHAR(50) NOT NULL, /*nome do autor do topico ou login*/
	top_name				VARCHAR(100) NOT NULL UNIQUE, /*o nome do topico deve ser unico, caso tenha algo relacionado o mesmo deve ser um post dentro do topico */
	top_obj 					VARCHAR(100) NOT NULL, /*esse campo vai ser a descrição dada pelo usuário no momento em ele criar o topico, vai conter a descrição*/
	top_post				VARCHAR NOT NULL, /*esse campo deve conter todos posts, perguntas, respostas relacionados aos topicos, onde deve pegar o login/id do usario que comentar*/
	top_container		VARCHAR NOT NULL, /*esse campo deve pegar todo conteudo do topico, ou seja, listar todos pots, caso queira pegar os posts daquele topico uso o campo topPost*/
	top_date				TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' /*data de criação do topico*/
);

CREATE TABLE IF NOT EXISTS `posts`( /*cada post deve estar atrelado à um tópico.*/
	post_id					INT AUTO_INCREMENT PRIMARY KEY,
	post_user_id	(ce)	VARCHAR(50) NOT NULL UNIQUE, /*esse campo deve receber o login ou id do usuario autor do post*/
	post_name			VARCHAR(100) UNIQUE NOT NULL, /*nome do post*/
	post_container		VARCHAR(500) NOT NULL, /*ess campo recebe todo conteudo do post, ouse ja, os comentarios, devo converter com php todos cararetes para htmml special chars...*/
	/*Este post_container pode ser um atributo multivalorado ou uma nova entidade, ex: postConteudo possui: coments(a string contendo o comentario todo), date coments(data do comentario), user_coments(o id do usuario q comentou)*/
	post_date				TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00', /*data de criação do post*/
	post_top_id	(ce)	INT /*Este campo é responsável por pegar o id do topico ao qual ele pertence, ou seja, ou post sempre esta dentro de um topico*/ 
);

CREATE TABLE IF NOT EXISTS `coments`(/*todo comentario esta contido em um post e a um user, talvez, preciso ver...se há um relaciomento tbm entre os comentarios e os topicos*/
	com_id					INT AUTO_INCREMENT PRIMARY KEY,
	com_user_id (ce) 	INT NOT NULL, /*chave estrangeira, identifica o usuário que comentou, quem comentou*/
	com_post_id (ce) 	INT NOT NULL, /*Chave estrangeira, a qual post pertence/esta atrelado*/
	com_container 		VARCHAR(500) NOT NULL,  /*Contem a string do comentario, ou seja, o input textArea que o usuario submeter eu vou jogar aqui depois de validar seu conteudo*/
	com_date				TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00'/*quando foi comentado*/
);
INSERT INTO usuarios(id, login, nome, senha, email, ativo, dataCad, foto, post, topico, ip) VALUES(1, 'admin', 'daniel', 'admin', 'djr@br.ibm.com', 's', '10-01-2016',  'null', 'null', 'null', 'null');


 