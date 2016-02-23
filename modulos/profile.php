<?php require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));

if($tela){
	$user = new usuarios();
	$user->extrasSelect = "WHERE nome='".$tela."'";
	$user->select($user);
	if($user->linhasafetadas > 0){
			while($res = $user->retornaDados()):
				echo "<p class='text-muted'><ul>";	
				if($res->foto != null){
					echo "<img id='perfil' data-toggle='tooltip' data-placement='right' title='Alterar foto de perfil' class='img-thumbnail' src='asset/picture/profile/".$res->login.'/'.$res->foto."' style='height:120px; width:120px;'>";
				}
				else{
					echo "<img class='img-thumbnail' src='asset/picture/profile/default.png' style='height:120px; width:120px;'><br />";
				}	
				echo "<p><li class='text-muted'><strong>Nome:</strong> ".ucwords($res->nome)."</li>";
				echo "<li class='text-muted'><strong>Email:</strong> ".$res->email."</li>";
				echo "<li class='text-muted'><strong>Tópicos:</strong></li>";
				echo "<li class='text-muted'><strong>Posts:</strong></li>";
				echo "<li class='text-muted'><strong>Desde:</strong> ".$res->dataCad."</li>";
				echo "</ul></p>";
			endwhile;
			echo '</article>';
	}
	else{
		echo '404 Página não encontrada!';
	}		
}
?>