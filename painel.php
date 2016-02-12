<?php  
include('funcoes.php'); 
include('header.php'); 
//protegeArquivo(basename(__FILE__));

if(isset($_GET['m'])):
	$modulo = $_GET['m'];
else: 
	$modulo = "";
endif;
if(isset($_GET['t'])):
	 $tela = $_GET['t'];
else:
	$tela = "";
endif; 		
?>
<div id="content">
	<?php 
		if($modulo && $tela):
			loadModulo($modulo, $tela);
			//echo 'subiu o modulo!';
		else:
			//echo '<p>Escolha uma opção de menu ao lado.</>';
			//echo "$modulo - $tela";
			//echo 'Modulo e/ou Tela não encontrado! Utilize sempre o Menu principal ou links para navegação.';
			loadModulo('forum','home');
			//exit;
			//redireciona('login.php?erro=3');
		endif;		
	?>
</div><!--content-->
<?php //include('sidebar.php'); ?>
<?php include('footer.php'); ?>


<!--<?php 
	require_once('funcoes.php');
	verificaLogin();
	echo 'Eu sou o painel.php';
	
?>
<p><a href="?logoff=true">Sair</a></p>
<p><?php $sessao = new sessao();
		 $sessao->printAll();
	?>
</p>