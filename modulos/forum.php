<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
loadCSS('style');
switch($tela):
	case 'login':
		//echo 'ola eu sou a tela de login';
			$sessao = new sessao();
			//if($sessao->getNvars() > 0 || $sessao->getVar('logado')!= TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):
			// no arquivo login.php eu vou validar se há alguma sessao em aberta, se sim mando para modulo forum tela home
			//senao mando para forum case login onde valido novamente a senha, para evitar do usuario voltar na tela de login, com 
			//esse if eu mando para class usuario metodo doLogin que vai criar a sessao e tals e depois manda para o forum home
			if($sessao->getNvars()==0 && $sessao->getVar('logado') != TRUE && $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):	
				if(isset($_POST['logar']))://logar é do form
				$user = new usuarios();
				$user->setValor('login', antiInject($_POST['usuario']));//campo do form
				$user->setValor('senha', antiInject($_POST['senha']));
				if($user->doLogin($user)):
					redireciona('painel.php?m=forum&t=home');
				else:
					redireciona('login.php?erro=2');	
					//echo '<div class="erro">Dados incorretos ou usuário inativo.</div>';
				endif;	
			endif;
			?>	
			<script type="text/javascript">
				$(document).ready(function(){
					$(".userForm").validate({
						rules:{
							usuario:{required:true, minlength:3},
							senha:{required:true, rangelength:[4,10]},
						}
					});
				}); 
			</script>
			<div class="logo">RagnaGroups! LOGO</div>
			<div class="login-block">
				<h1>Efetue o login para continuar</h1>
				<form class="userForm" method="post" action="">
					<input type="text" size="35" name="usuario" placeholder="Username" id="username" autocomplete="off" value="<?php //echo $_POST['usuario']; ?>" />
					<input type="password" size="35" name="senha" placeholder="Password" id="password" autocomplete="off" value="<?php //echo $_POST['senha']; ?>" />
					<button name="logar">Entrar</button>
					<!--<input class="radius5" type="submit" name="logar" value="Login"/>-->
				</form>
				<nav>
					<p><a href="cadastro.php" id="link" class="btn btn-link">Não possui acesso?</a></p>
				</nav>	
			</div>	
			<?php
							@$erro = $_GET['erro'];
							switch($erro):
								case 1:
									echo '<div class="sucesso">Você fez logoff do sistema.</div>';
									break;
								case 2:
									echo '<div class="erro">Dados incorretos ou usuário inativo.</div>';
									break;
								case 3:
									echo '<div class="erro">Faça login antes de acessar a página solicitada.</div>';	
									break;
							endswitch;
						?>
			<?php
			//CASO A SESSAO JA TENHO SIDO ABERTA, LOGIN JA EFETUADO, VAI MANDAR PRO HOME.
			else:
				redireciona('painel.php?m=forum&t=home');
			endif;
	break;
	case 'home':
			$timeLine = new Timeline();
			//$timeLine->select($timeLine);
			
		break;
	case 'cadastro':
		echo "Hello! I'm the registration screen.";
	break; 		
	default:
		echo 'Página não encontrada';
		break;	
endswitch;		
?>