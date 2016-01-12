<?php require_once("funcoes.php"); ?>
<!DOCTYPE>
<html lang="pt_BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>RagnaGroups | Tudo Sobre Ragnarok :)</title>
		<meta name="description" content="">
		<meta name="author" content="Junior">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<?php
			//loadCSS('reset');
			loadCSS('index');
			loadCSS('normalize');
		?>
	</head>
	<body center clearfix>
		<div id="wrap">
			<section class="billboard light">
				<header>
				<!--<div class="archer">
				<a href="#"><img src="image/archer.jpg" width="100px" height="100px"></a>
				</div>-->
					<div id="sidebar">
						<nav>
						<ul>
							<a href="login.php" title="Forum"><li>Fórum</li></a>
							<a onclick="location.href='painel.php?m=database&t=home'"><li>Database</li></a>
							<a href="#"><li>Tutoriais</li></a>
							<a href="#"><li>Videos</li></a>
							<a href="#"><li>Sugestões</li></a>
							<a href="#" id="ultimo"><li>Sobre</li></a>
						</ul>
						</nav>
					</div><!--sidebar-->
				<div class="shadow"></div><!--shadow-->
				</header>
			</section>
			<footer>
				<small><p>© Copyright 2015, Desenvolvido por <a href="#" class="copyright" target="_blank">Daniel Vieira Junior</a> - Todos os direitos reservados.
					<br/><textNode>É proibida a reprodução total ou parcial de qualquer conteúdo deste site.</textNode></p>		
				</small>
			</footer>
		</div><!--wrap-->
	</body>
</html>