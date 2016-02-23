<?php require_once((dirname(__FILE__))."/funcoes.php");
require_once('classes/autoload.php');
require_once((dirname(__FILE__))."/recaptchalib.php");
	if(verificaLogin2()){//valida se o usuário já está logado, se sim, não deve deixa-lo ver a página de cadastro.
		loadCSS('bootstrap');
		loadCSS('cad');
		loadJS('geral');
		loadJS('jquery');
		loadJS('jquery-validate');
		loadJS('jquery-validate-messages');
		loadJS('bootstrap');
		
		/*try{ 
		$secret = "6LeubxYTAAAAANARyG_ZJ8qqXeHUK2wVkE41Ub5l";
			$response = null;
			$reCaptcha = new ReCaptcha($secret);
			if(@$_POST["g-recaptcha-response"]){
				$response = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
		    	);
			}
		}catch(exception $e){
			echo "Ocorreu um erro de conexão com o ReCaptcha.<p>".$e->getFile()."</p><p>".$e->getLine()."</p><p>".$e->getMessage();	
		}*/
		if(isset($_POST['cadastrar'])){//cadastrar 
		//if ($response != null && $response->success) {
			trataString(); die();
			$user = new usuarios(array(
				'nome'=>antiInject(strtolower($_POST['nome'])),
				'login'=>antiInject(strtolower($_POST['login'])),
				'email'=>antiInject(strtolower($_POST['email'])),
				'senha'=>codificaSenha($_POST['senha']),
				'user_dir'=>diretorio($_POST['login']),
				'ip'=> ($_SERVER['REMOTE_ADDR']),
				//'termo'=>($_POST['termo']), na vdd esse campo nao é necessario ainda, pois o usuario só consegue se cadastrar
				'ativo'=>'s',//se o checkbox termos de uso estiver ativo, mas se ele entrar sem js ativo nao consigo ter provas de que
				'dataCad'=>date('Y-m-d H:i:s')//ele concordou com os termos, ele poderia alegar que o site apresentou erro e ele nao
		));//concordou com nada
			if($user->existeRegistro('login',$_POST['login'])):
				printMSG('Este login já está cadastrado, escolha outro nome de usuário.','erro');
				$duplicado = TRUE;
			endif;
			if($user->existeRegistro('email',$_POST['email'])):
				printMSG('Este email já está cadastrado, escolha outro endereço.','erro');
				$duplicado = TRUE;
			endif;
			if(@$duplicado != TRUE):
				$sessao = new sessao();
				$user->inserir($user);
				if($user->linhasafetadas==1):
					printMSG('Dados inseridos com sucesso. <a href="login.php">Ir para tela de login</a>');
					unset($_POST);
				endif;
			endif;
			//}//captcha
			//else echo "O preenchimento do Captcha é necessário para provar que você não é um robô.";
		}//cadastrar-Fim
?>	
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8; IE=edge,chrome=1" />
		<title>RagnaGroups | Cadastro</title>
		<meta name="description" content="Ragnagroups, fórum, database, tutoriais, videos, sugestões, sobre, tudo sobre ragnarok">
		<meta name="author" content="Daniel Vieira Junior">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<meta name="robots" content="index, follow" />
		<meta name="google" content="nositelinkssearchbox" />
		<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
		<script type="text/javascript">
				$(document).ready(function(){
					$(".cadForm").validate({
						rules:{
							nome:{required:true, minlength:8},
							email:{required:true, email:true},
							login:{required:true, minlength:6},
							senha:{required:true, rangelength:[8,16]},
							senhaconf:{required:true, equalTo:"#senha"},
							termo:{required:true},
						}
					});
				});
			</script>
	</head>
	<body>
		<div id="topo">Logo</div>
		<div id="wrap">
			<div class="geral">
			<header>
				<h1>Cadastro</h1>
			</header>
			<form action="" method="post" name="cadForm" class="cadForm">
				<div class="form-group">
			  	<label for="name">Name</label>
			  	<input type="text" id="username" name="nome" class="form-control" placeholder="Enter your name" autocomplete="off">
			  </div>
			  <div class="form-group">
			  	<label for="username">Username</label>
			  	<input type="text" id="username" class="form-control" name="login" placeholder="Enter your username" required="required" autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" autocomplete="off" required="">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Password" autocomplete="off" onkeyup="validPass();">
			  	<table id="mostra"></table>
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
			</div><!-- Geral -->
		</div><!--wrap-->
	</body>
</html>		
	<?php		
	}//verificaLogin
	else{
		redireciona('painel.php?m=forum&t=home');
	}	
	
?>