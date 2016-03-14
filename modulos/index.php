<?php
	require_once('../funcoes.php'); //não chamo o funcoes.php, chamo o autoload->funcoes
	protegeArquivo(basename(__FILE__));//tenho que chamar em todas minhas classes
	
	$sessao = new sessao();
	
	if($sessao->getNvars() <= 0){
		redireciona('index.php');
	}
	else{
		redireciona('painel.php?m=forum&t=home');
	}
?>