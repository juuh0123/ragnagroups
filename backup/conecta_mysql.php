<?php
	$conexao = mysql_connect("localhost", "root", "");
	mysql_select_db("ragnagroups");
	//Teste, arrumar acentuação que vem do php para mysql
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
?>




