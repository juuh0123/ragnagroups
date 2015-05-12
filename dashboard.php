<?php
	//include_once 'validaIntruso.php';
	//include_once 'verificaLogin.php';
	//include_once 'conectaMysql';
?>

<!DOCTYPE html>
<html lang="PT-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>RagnaGroups | Tudo Sobre Ragnarok :)</title>
		<meta name="description" content="">
		<meta name="author" content="Daniel Vieira Junior">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/dashboard.css" type="text/css">
		<link rel="stylesheet" href="css/normalize.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
			<section>	
				<header>
					<div id="wrap">	
					<div id="login">
						<!--<span>Login</span>-->
						<form action="login.php" method="post" enctype="multipart/form-data">
							<input type="text" name="username" id="username" maxlength="40" size="40" placeholder="E-mail" class="user" />
							<input type="password" name="password" id="password" maxlength="12" size="20" placeholder="Senha"/>
							<button>Entrar</button>
							<a href="cadastro.html">Cadastrar</a>
						</form>
					</div>	
					<div id="logo">
						<a href="index.html">
							<img src="image/Ragnarok.jpg" alt="ragnarok" value="ragnarok" alt="HOME">
						</a>
					</div>
					<div id="sidebar">
						<ul>
							<a href="#"><li>Fórum</li></a>
							<a href="#"><li>Últimos Posts</li></a>
							<a href="#"><li>Membros</li></a>
							<a href="#"><li>Regras</li></a>
							<a href="#"><li>Sugestões</li></a>
						</ul>	
					</div>
					<div id="centro">
						<h2><span><a href="#">Novidades e Notícias</a></span></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
								euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
								aliquip ex ea commodo consequat</p>
						<h2><span><a href="#">Ragnarok Dúvidas</a></span></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
								euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
								aliquip ex ea commodo consequat</p>
						<h2><span><a href="#">Sessão Perguntas e Respostas</a></span></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
								euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
								aliquip ex ea commodo consequat</p>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
								euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
								aliquip ex ea commodo consequat</p>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
								euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
								aliquip ex ea commodo consequat</p>		
						<h2 class="ultimo"><span><a href="#" style="border-right: none">Reporte de Erros</a></span></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
								euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
								aliquip ex ea commodo consequat</p>	
					</div>
					</div>
				</header>
			</section>
			<footer>
				<nav>
					<small>© Copyright 2058, Example Corporation</small>
				</nav>		
			</footer>
			<div class="shadow">	
			</div>
	</body>
</html>	
		