DROP DATABASE IF EXISTS ragnagroups;
CREATE DATABASE ragnagroups;
USE ragnagroups;

CREATE TABLE usuario(
	email	VARCHAR(100) PRIMARY KEY NOT NULL,
	nome	VARCHAR(100) NOT NULL,
	senha	VARCHAR(40)	NOT NULL,
	foto	VARCHAR(80)
)ENGINE=MyISAM;

