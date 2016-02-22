<?php require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));?>
	<a class="newpostlink" href="#" data-toggle="modal" data-target="#myModal">Criar um novo post</a> 
	<!--modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <form>
        <input type="text" class="form-control" placeholder="Título do post" required>
      </div>
      <div class="modal-body">
        <textarea class="form-control" id="message-text" placeholder="Conteúdo..." required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" name="newpost">Criar</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
#O objetivo desse modulo é adentrar, exibir o topico e seus posts
if(isset($tela)):
	$top_name = antiInject($_GET['t']);
	#instancia os obj das classes
	$topico = new Topico();
	$post = new Post();
	$sessao = new sessao();
	$topID = mysql_query("SELECT * from topics WHERE top_name='$top_name'");
	$row = mysql_fetch_assoc($topID);
	//print_r($row); echo $top_name; die();
	$row = $row['top_id'];
	#traz do bd todos campos do topic
	$post->select($post);
	$topico->extrasSelect = "WHERE top_name='$top_name'";
	
	$query = "SELECT post_name, post_user_name, post_date FROM posts INNER JOIN topics ON posts.post_top_id = topics.top_id WHERE posts.post_top_id =$row ORDER BY post_date DESC";
	//echo $query; die();
	$result = mysql_query($query);
	echo "<h1>$tela</h1><br /><h4></h4>";	
	#if(empty($result)) print 'VAZIO';
	#$res = $topico->retornaDados();
	if($topico and !empty($result) and mysql_num_rows($result) > 0){
	echo "<article class='topiclist'><table class='table table-striped'>";	
	//while($res = $topico->retornaDados()):
	while($res = mysql_fetch_assoc($result)):
		//echo $res['post_user_name']; die();
		?>
		<tr>
			<span>
				<td><h4 class="top_name"><a href="?m=post&t=<?php print $res['post_name'];?>"><?php echo ucfirst($res['post_name']);?></a></h4>
					<span class="top_user_name"><h5 class="text-muted">Criado por <?php echo "<a href='?m=forum&t=profile'>".$res['post_user_name']."</a>";?></h5></span>
					<span class="top_obj"><?php echo ucfirst($res['post_date'])?></span>
				</td>	
			</span>
		</tr>
		<?php
	endwhile;
	}else{
		echo 'Não há post\'s para este tópico';
	}
				
	echo "</table></article>";
endif;//if inicial	
	
?>