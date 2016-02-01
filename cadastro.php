<?php require_once((dirname(__FILE__))."/funcoes.php");
require_once((dirname(__FILE__))."/recaptchalib.php");
	if(!verificaLogin2()){
		//echo "Eu sou a tela de cadastro. Aqui dentro vai todo PHP e HTML para o cadastro.";
		loadCSS('bootstrap');
		loadCSS('cad');
		loadJS('jquery');
		loadJS('jquery-validate');
		loadJS('jquery-validate-messages');
		loadJS('bootstrap');
		
		
		$secret = "6LeubxYTAAAAANARyG_ZJ8qqXeHUK2wVkE41Ub5l";
			$response = null;
			$reCaptcha = new ReCaptcha($secret);
			
			if(@$_POST["g-recaptcha-response"]){
				$response = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
		    	);
			}

		if(isset($_POST['cadastrar'])){//cadastrar 
		if ($response != null && $response->success) {	
			$user = new usuarios(array(
				'nome'=>antiInject($_POST['nome']),
				'login'=>antiInject($_POST['login']),
				'email'=>antiInject($_POST['email']),
				'senha'=>codificaSenha($_POST['senha']),
				'ativo'=>'s',
				'dataCad'=>date('Y-m-d H:i:s')
		));
			if($user->existeRegistro('login',$_POST['login'])):
				printMSG('Este login já está cadastrado, escolha outro nome de usuário.','erro');
				$duplicado = TRUE;
			endif;
			if($user->existeRegistro('email',$_POST['email'])):
				printMSG('Este email já está cadastrado, escolha outro endereço.','erro');
				$duplicado = TRUE;
			endif;
			if(@$duplicado != TRUE):
				$user->inserir($user);
				if($user->linhasafetadas==1):
					printMSG('Dados inseridos com sucesso. <a href="'.ADMURL.'?m=forum&t=login">Ir para tela de login</a>');
					unset($_POST);
				endif;
			endif;
			}//captcha
			else echo "O preenchimento do Captcha é necessário para provar que você não é um robô.";
		}//cadastrar-Fim
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
		<script type="text/javascript">
				$(document).ready(function(){
					$(".cadForm").validate({
						rules:{
							nome:{required:true, minlength:8},
							email:{required:true, email:true},
							login:{required:true, minlength:5},
							senha:{required:true, rangelength:[4,10]},
							senhaconf:{required:true, equalTo:"#senha"},
							termo:{required:true},
						}
					});
				});
			</script>
	</head>
	<body>
		<div id="topo"></div>
		<div id="wrap">
			<header>
				<div class="logocad">LOGO</div>	
				<h1>Cadastro</h1>
			</header>
			<form action="" method="post" name="cadForm" class="cadForm">
				<div class="form-group">
			  	<label for="name">Name</label>
			  	<input type="text" id="username" name="nome" class="form-control" placeholder="Enter your name" autocomplete="off">
			  </div>
			  <div class="form-group">
			  	<label for="username">Username</label>
			  	<input type="text" id="username" class="form-control" name="login" placeholder="Enter your username" autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" autocomplete="off" required="">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
			  </div>
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="termo"> <a href="#" data-toggle="modal" data-target="#myModal">Termos de uso</a> <!-- Button trigger modal -->
			    </label>
			  </div>
			  <button type="submit" class="btn btn-default" name="cadastrar">Submit</button>
			  <div class="g-recaptcha" data-sitekey="6LeubxYTAAAAANARyG_ZJ8qqXeHUK2wVkE41Ub5l"></div>
			</form>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Termos de uso RagnaGroups</h4>
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
	}//verificaLogin	
	include('footer.php');	
?>