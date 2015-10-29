<?php require_once("funcoes.php"); 
protegeArquivo(basename(__FILE__));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt_BR" lang="pt_BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ragnagroups | Home</title>
		<?php
			//loadCSS('reset');
			loadCSS('style');
			//loadJS('jquery');
			//loadJS('geral');
		?>
	</head>
	<body class="painel">
		<div id="wrapper">
			<div id="header" style="background-color: #8FFF6A">
				<h1>Aqui vai o logo e uma barra de menu</h1>
				<ul>
					<li>Fórum</li>
					<li>Membros</li>
					<li>Regras</li>
					<li>Suporte</li>
				</ul>
			</div><!--header-->
			<form action="" enctype="multipart/form-data" method="post">
				<label for="username">Nome de Usuário</label>
				<input  type="text" name="username" id="username"  value tabindex="1" />
				<label for="password">Senha</label>
				<input  type="password" name="password" id="password"  tabindex="2" />
				<input type="submit" class="radius5" name="login" id="login" value="Entrar" />
				</form>	
				
				
		