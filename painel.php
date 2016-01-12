<?php  
include('funcoes.php'); 
//protegeArquivo(basename(__FILE__));
include('header.php'); 
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
			redireciona('login.php?erro=3');
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