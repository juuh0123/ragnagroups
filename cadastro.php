<?php require_once((dirname(__FILE__))."/funcoes.php");
	if(!verificaLogin2()){
		//echo "Eu sou a tela de cadastro. Aqui dentro vai todo PHP e HTML para o cadastro.";
		loadCSS('bootstrap');
		loadCSS('cad');
		loadJS('jquery');
		//loadJS('bootstrap');
	 ?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>RagnaGroups | Tudo Sobre Ragnarok :)</title>
		<meta name="description" content="">
		<meta name="author" content="Junior">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
	</head>
	<body>
		<div id="topo"></div>
		<div id="wrap">
			<header>
				<div class="logocad">LOGO</div>	
				<h1>Cadastro</h1>
			</header>
			<form action="" method="post">
				<div class="form-group">
			  	<label for="name">Name</label>
			  	<input type="text" id="username" class="form-control" placeholder="Enter your name">
			  </div>
			  <div class="form-group">
			  	<label for="username">Username</label>
			  	<input type="text" id="username" class="form-control" placeholder="Enter your username">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="checkbox">
			    <label>
			      <input type="checkbox"> <a href="#" data-toggle="modal" data-target="#myModal">Termos de uso</a> <!-- Button trigger modal -->
			    </label>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			  <div class="g-recaptcha" data-sitekey="6LeubxYTAAAAANARyG_ZJ8qqXeHUK2wVkE41Ub5l"></div>
			</form>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Termos de uso</h4>
			      </div>
			      <div class="modal-body">
			        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- Modal -->
		</div>
		
	</body>
	
	
	<?php	
			$secret = "6LeubxYTAAAAANARyG_ZJ8qqXeHUK2wVkE41Ub5l";
			$response = null;
			$reCaptcha = new ReCaptcha($secret);
			
			if($_POST["g-recaptcha-response"]){
				$response = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
		    	);
			}
		//print_r($usuario->camposValores);
	}
	include('footer.php');	
?>