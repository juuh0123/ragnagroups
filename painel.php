<?php  
require_once(dirname(__FILE__)."/funcoes.php");
if(verificaLogin2()):
	redireciona('login.php?erro=3');
endif;	
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
#Em análise para adentrar no perfil do usuarios, ex: m=forum&t=profile/Gustavo-Vieira ou posso simplesmente criar um novo modulo
#com nome de profile e mandar pra lá ao invés de forum, ai ficar assim m=profile&t=Gustavo-Vieira
if(isset($_GET['/'])):
	$profile = $_GET['/'];
else:
	$profile = "";
endif;
#		 		
?>
<div id="content">
	<?php 
		if($modulo && $tela):
			if($modulo == 'profile'){
				$tela = antiInject($tela);
			}
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
<?php //include('sidebar.php'); 
include('footer.php');