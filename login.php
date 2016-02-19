<?php require_once((dirname(__FILE__))."/funcoes.php");?> 
<!--NESSA CLASSE EU PRECISO VALIDAR SE A SESSAO JÁ ESTA ABERTA SE SIM MANDO PARA O FORUM SENAO PARA LOGIN AS DUAS VAO SE TELAS DENTRO DO FORUM.PHP-->
<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ragnagroups</title>
		<?php loadCSS('login'); loadCSS('bootstrap');?>
	</head>
	<body>
		<?php 
			$sessao = new sessao();
			if($sessao->getNvars() > 0 || $sessao->getVar('logado')!= TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):	
			//if($sessao->getNvars() <= 0 || $sessao->getVar('logado')!= TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):
				loadModulo('forum','login');
			else:
				loadModulo('forum','home');
			endif;
		?>
		<footer>
			<small><p>© Copyright 2015, Desenvolvido por <a href="#" class="copyright" target="_blank">Daniel Vieira Junior</a> - Todos os direitos reservados.</p></small>
		</footer> 
	</body>
</html>