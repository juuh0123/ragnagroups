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
			//$timeline = new Timeline();
			echo "<a href='?m=forum&t=newtopic' class='btn btn-primary newtopic'>Novo Tópico</a>";
			//$timeLine->select($timeLine);
			$timeline = new Topico();
			$timeline->select($timeline);
			echo "<article class='topiclist'><table class='table table-striped'>";
			while($res = $timeline->retornaDados()):
				?>
				    <tr>
					<span>
						<td><h4><a href="#"><?php echo $res->top_name?></a></h4>
							<span><?php echo $res->top_obj?></span>
						</td>	
					</span>
					</tr>
				<?php
			endwhile;
			echo "</table></article>";
		break;
	case 'newtopic':
		try{ 
		if(isset($_POST['newtopic']) && !empty($_POST['top_name']) && !empty($_POST['top_obj'])){
			//echo "entrou no if do topico";
			date_default_timezone_set ( "America/Sao_Paulo" );
			$topic = new Topico(array(
				'top_name' => antiInject($_POST['top_name']),
				'top_obj' => antiInject($_POST['top_obj']),
				'top_date' => date('Y-m-d H:i:s', time()),
			));
			$topic->inserir($topic);
			redireciona('painel.php?m=forum&t=home');
		}
		}//try
		catch(exception $e){
			echo $e->getMessage();
		}
		?>
		<div class="newtopic">
			<header>
				<h1>Criar um novo tópico</h1>
			</header>
			<article>
			<form class="form-group formnewtopic" method="post">
				<label>Título</label><br />
				<input type="text" name="top_name" size="80" class="form-control newinput"/>
				<label>Objetivo</label><br />
				<textarea class="form-control newinput"  name="top_obj" rows="3"></textarea>
				<button class="btn btn-default" type="submit" name="newtopic">Criar</button>
			</form>
			</article>
		</div>
		<?php
	break;		
	case 'cadastro':
		echo "Hello! I'm the registration screen.";
	break; 		
	default:
		echo 'Página não encontrada';
		break;	
endswitch;		
?>