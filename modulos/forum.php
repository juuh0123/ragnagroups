<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
loadCSS('style');
loadJS('geral');
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
					<input type="text" size="35" name="usuario" placeholder="Username" id="username" autocomplete="off" autofocus>
					<input type="password" size="35" name="senha" placeholder="Password" id="password" autocomplete="off">
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
			echo "<a href='?m=forum&t=newtopic' class='btn btn-primary newtopic' id='btnnew'>Novo Tópico</a>";
			//$timeLine->select($timeLine);
			$timeline = new Topico();
			$user = new usuarios();	
			$sessao = new sessao();
			$id = $sessao->getVar('loginuser');
			$nome = ucwords($sessao->getVar('nomeuser'));
			$user->conecta();
			$query = "SELECT foto FROM usuarios WHERE login='$id'";
			$result = mysql_query($query);
			if($row = mysql_fetch_assoc($result)){
				if($row['foto'] != ''){
					$profile = "<a href='?m=forum&t=profile'><img class='img-thumbnail' src='asset/picture/profile/".$id.'/'.$row['foto']."' style='height:120px; width:120px;'>
					<p><span>$nome</span></p></a>";
					
				}
				else{
					//$profile = "<img class='img-thumbnail' src='asset/picture/profile/default.png' style='height:120px; width:120px;>";
					$profile = "<div id='divupload'><input type='file' class='upload'></div>
					<p><span><a href='?m=forum&t=profile'>$nome</a></span></p>";
				}	
			}
			//$user->extrasSelect = "foto FROM usuarios WHERE login='".$sessao->getVar('loginuser');
			//print $sessao->getVar('loginuser');
			//$user->selectCampos($user);
			$timeline->extrasSelect = "ORDER BY top_date DESC;";
			$timeline->select($timeline);
			?>
				<div class="photo profile">
					<section><?php echo $profile; ?>
					<p><?php $user->extrasSelect = "WHERE login='".$sessao->getVar('loginuser')?></p></section><!--src=''-->
				</div>
			<?php
			echo "<article class='topiclist'><table class='table table-striped'>";
			
			while($res = $timeline->retornaDados()):
				?>
				    <tr>
					<span>
						<td><h4 class="top_name"><a href="?m=topico&t=<?php print $res->top_name;?>"><?php echo ucfirst($res->top_name);?></a></h4>
								<span class="top_user_name"><h5>Criado por <?php echo "<a href='?m=forum&t=profile'>$res->top_user_name</a>";?></h5></span>
							<span class="top_obj"><?php echo ucfirst($res->top_obj)?></span>
						</td>	
					</span>
					</tr>
				<?php
			endwhile;
			echo "</table></article>";
			mysql_close();
		break;//HOME
	case 'logoff':
		  	$user = new usuarios();
			$user->doLogout();
			session_destroy();
			mysql_close();
		break;	
	case 'newtopic':
		$user = new usuarios();
		$sessao = new sessao();
		$id = $sessao->getVar('loginuser');
		$query = "SELECT id FROM usuarios WHERE login='$id'";
		$user = mysql_query($query);
		$user = mysql_fetch_assoc($user);
		try{ 
		if(isset($_POST['newtopic']) && !empty($_POST['top_name']) && !empty($_POST['top_obj'])){
			//echo "entrou no if do topico";
			date_default_timezone_set ( "America/Sao_Paulo" );  //OBS: antes de cadastrar direto no banco eu devo enviar para o adm aprovar
			$topic = new Topico(array( //
				'top_name' => antiInject($_POST['top_name']),
				'top_obj' => antiInject($_POST['top_obj']),
				'top_date' => date('Y-m-d H:i:s', time()),
				'top_user_id' => $user['id'],
				'top_user_name'=> $sessao->getVar('nomeuser'),
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
				<h1>Criar novo tópico</h1>
				<section class="topiclaw">
					<p class="text-muted"><strong>Leia com atenção: </strong>Antes de criar um novo tópico elabore um <mark>Título</mark> que seja abrangente,
					que englobe todo um contexto, assunto ou discussão.</p>
					<p class="text-muted"><strong>Exemplo:</strong> Quests, ou seja, se eu não estou especificando qual a quest, este tópico será responsável por englobar
					todas as quests do jogo. Outros exemplos seriam: Guia do Up!, PVP, WOE, Venda e Compra de equipamentos, etc.</p>
					<p class="text-muted"><strong>OBS: </strong>Erros de Português não serão aceitos no <mark>Título</mark> ou <mark>Descrição</mark> do Tópico.</p>
					<p class="text-danger"><strong>A criação de Tópicos passa pela aprovação do Adminitrador, sendo assim, o tópico criado não aparecerá no mesmo instante.</strong></p>
				</section>
			</header>
			<article>
			<form class="form-group formnewtopic" method="post">
				<label>Título</label><br />
				<input type="text" name="top_name" maxlength="70" class="form-control newinput" required>
				<label>Descrição</label><br />
				<textarea class="form-control newinput"  name="top_obj" maxlength="400" rows="3" required></textarea>
				<button class="btn btn-default" type="submit" name="newtopic">Criar</button>
			</form>
			</article>
		</div>
		<?php
	break;		
	case 'cadastro':
		echo "Hello! I'm the registration screen.";
	break;//cadastro
	case 'profile':
		?>
			<header>
				<h1>Meu perfil</h1>
			</header>
			<article>	
		<?php
			$user = new usuarios();
			$sessao = new sessao();
			$id = $sessao->getVar('loginuser');
			
			$user->extrasSelect = "WHERE login='".$id."'";
			$user->select($user);
			$user->conecta();
			$query = "SELECT foto FROM usuarios WHERE login='$id'";
			$result = mysql_query($query);
			if($row = mysql_fetch_assoc($result)){
				if($row['foto'] != null){
					echo "<img id='perfil' data-toggle='tooltip' data-placement='right' title='Alterar foto de perfil' class='img-thumbnail' src='asset/picture/profile/".$id.'/'.$row['foto']."' style='height:120px; width:120px;'>";
					
				}
				else{
					//$profile = "<img class='img-thumbnail' src='asset/picture/profile/default.png' style='height:120px; width:120px;>";
					echo "<img class='img-thumbnail' src='asset/picture/profile/default.png' style='height:120px; width:120px;'>";
				}	
			}	
			while($res = $user->retornaDados()):
				print "<p class='text-muted'><ul>";
				//print "<li><strong>Login:</strong> ".$res->login."</li><br />";	
				print "<li class='text-muted'><strong>Nome:</strong> ".ucwords($res->nome)."</li><br />";
				print "<li class='text-muted'><strong>Email:</strong> ".$res->email."</li><br />";
				print "<li class='text-muted'><strong>Desde:</strong> ".$res->dataCad."</li><br />";
				print "</ul></p>";
			endwhile;
			?>
			</article>	
			<?php
		break;//profile 		
	default:
		echo "<div class='telaerror'></div>";
		break;//default	
endswitch;		
?>