<?php	require_once(dirname(dirname(__FILE__))."/funcoes.php");
		protegeArquivo(basename(__FILE__));
	$tela = antiInject($_GET['t']);
	$id = antiInject($_GET['id']);
	#exibir post e seus comentários, devo ter um form que use ajax para adicionar os comentários.

if(isset($tela)){
	#instanciando as classes
	$post = new Post();
	$commment = new Comment();
	$user = new usuarios();
	$post->extrasSelect = "WHERE post_id='".$id."' AND post_name= '".$tela."'";
	$post->select($post);
	
	#$commment->extrasSelect = "WHERE com_post_id = '".$idDoPost."'"; #isso aqui devia ser um relacionamento, inner join, porém é gambiarra
	
  	if($post->linhasafetadas >= 0 ){
  		while($res = $post->retornaDados()){
			$query = "SELECT * FROM usuarios WHERE id = $res->post_user_id";
			$result = mysql_query($query);
			$user = mysql_fetch_assoc($result);	
			if(empty($user)){
  				echo '<h2>Isto é meio embaraçoso mas este post não existe ou foi removido.</h2>';
				exit;
  			}	
  			echo "<div class='post'><img src='asset/picture/profile/".$user['login']."/".$user['foto']."'><header><h3>".$res->post_name.'</h3>';
			echo '<span><p>Por '.ucwords($res->post_user_name);
			echo '<span> às '.$res->post_date.'</p></span></header>';
			echo "<div class='post-container'><p class='text-muted'>".$res->post_container.'</p></div><br/></div>';
  		}
	}
	?>
	<article class="comment">
		<form class="form-horizontal" action="" method="post">
		  <div class="form-group">
		    <h4>Adicionar um comentário</h4>
		    <div class="col-sm-10">
		     	<textarea class="form-control" rows="3" id="commentEditor" name="comment"></textarea>
		     	<button type="submit" class="btn btn-default" name='postar'>Reply</button>
		    </div>
		  </div>
		</form>
	</article>
<?php	
	if(isset($_POST['postar'])){
			$inputComment = antiInject($_POST['comment']);
			#instanciar a classe style, para salvar as modificações no ckeditor
			#gravar no bd o commentario
			#criar páginação para comentários
	}
}
else{
	echo '404 Page Not Found!';
}
	
