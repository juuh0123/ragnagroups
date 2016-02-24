<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
loadJS('jquery-validate');
loadJS('jquery-validate-messages');
loadCSS('login');
//$teste = dirname(__FILE__);
//echo $teste;
	switch($tela):
		case 'login':
			//$sessao = new sessao();
			if($sessao->getNvars() > 0 || $sessao->getVar('logado')!= TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']) redireciona('home.php');
			if(isset($_POST['logar']))://logar é do form
				$user = new usuarios();
				$user->setValor('login', $_POST['usuario']);//campo do form
				$user->setValor('senha', $_POST['senha']);
				if($user->doLogin($user)):
					redireciona('home.php');
				else:
					redireciona('?erro=2');	
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
			<!--<div id="loginForm">-->
				<div class="login-card">
    			<h1>Log-in</h1><br>
				<form class="userForm" method="post" action="">
					<!--<fieldset>
						<legend>Acesso restrito, identifique-se</legend>
						<ul>
							<li>
								<label for="usuario">Usuário:</label>-->
								<input type="text" size="35" name="usuario" placeholder="Usuário" />
							</li>
							<li>
								<!--<label for="senha">Senha:</label>-->
								<input type="password" size="35" name="senha" placeholder="senha" value="<?php //echo $_POST['senha']; ?>" />
							</li>
							<li class="center"><input class="radius5" class="login login-submit" type="submit" name="logar" value="Login"/></li>
						</ul>
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
					<!--</fieldset>-->
					 <div class="login-help">
   						 <a href="#">Registre-se</a> • <a href="#">Esqueceu a senha?</a>
  					</div>
				</form>
			</div>	
			<?php
			break;
		default:
			echo '<p>A tela solicita não existe.</p>';
			break;		
	endswitch;