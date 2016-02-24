<?php include_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
	$tela =$_GET['t'];
	if($tela == 'list'){
		$user = new usuarios();
		$user->extrasSelect = 'ORDER BY nome ASC';
		$user->select($user);
		echo "<div class='list-user-content'>";
		while ($res = $user->retornaDados()) {
			echo "<div class='list-user-child'>";
			echo "<a href='?m=profile&t=$res->nome'><img class='img-thumbnail list-user-picture' src='asset/picture/profile/".$res->login.'/'.$res->foto."' style='height:120px; width:120px;'>";	
			echo '<span><p>'.ucwords($res->nome).'</p></span></a>';
			echo "</div>";
		}
		echo "</div>";
	}