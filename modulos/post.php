<?php	require_once(dirname(dirname(__FILE__))."/funcoes.php");
		protegeArquivo(basename(__FILE__));
	$tela = antiInject($_GET['t']);
	$id = antiInject($_GET['id']);
	#exibir post e seus comentários, devo ter um form que use ajax para adicionar os comentários.

if(isset($tela)){
	#instanciando as classes
	$post = new Post();
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
  			echo "<div class='post'>";
  			echo "<img src='asset/picture/profile/".$user['login']."/".$user['foto']."'>";
  			echo "<header><h3>".$res->post_name."</h3></header>";
			echo "<span><p>Por ".ucwords($res->post_user_name)." às ".$res->post_date."</p></span>";
			echo "<div class='post-container'><p class='text-muted'>".$res->post_container."</p></div></div>";
  		}
	}
	
	$commment = new Comment();
	$commment->extrasSelect = "WHERE com_post_id='".$id."'";
	$commment->select($commment);
	if($commment->linhasafetadas >= 0){
		while($res = $commment->retornaDados()){
			$query = "SELECT * FROM usuarios WHERE id = $res->com_user_id";
			$result = mysql_query($query);
			$user = mysql_fetch_assoc($result);	
			if(empty($user)){
  				echo '<h2>Isto é meio embaraçoso mas este comentário não existe ou foi removido.</h2>';
				exit;
  			}
			echo "<article class='coment'><img src='asset/picture/profile/".$user['login']."/".$user['foto']."'>";
			echo "<span class='coment-name'>".ucwords($user['nome'])."</span>";
			echo "<div class='coment-container'><p class='text-muted'>".$res->com_container."</p>";
			echo "<span class='coment-date'>".$res->com_date."</span></div></article>";	
		}
	}
	?>
	<article class="comment">
		<form class="form-horizontal" action="" method="post" id='addcoment'>
		  <div class="form-group">
		    <h4>Adicionar um comentário</h4>
		    <div class="col-sm-10">
		     	<textarea class="form-control" rows="10" id="commentEditor" name="comment"></textarea>
		     	<button type="submit" class="btn btn-default" name='postar'>Reply</button>
		    </div>
		  </div>
		</form>
	</article>
<?php	
	if(isset($_POST['postar'])){
			
			$sessao = new sessao();
			$inputComment = antiInject($_POST['comment']);
			
			$newcomment = new Comment(array(
				"com_user_id" => $sessao->getVar('iduser'),
				"com_container" => $inputComment,
				"com_post_id" => $id,
				"com_date" => date('Y-m-d H:i:s', time()),
			));
			$newcomment->inserir($newcomment);
			unset($_POST);
			header('post.php');
			#instanciar a classe style, para salvar as modificações no ckeditor
			#gravar no bd o commentario
			#criar páginação para comentários
	}
}
else{
	echo '404 Page Not Found!';
}
	
