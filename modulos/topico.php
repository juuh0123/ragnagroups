<?php require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));

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
	
	$query = "SELECT post_name, post_date FROM posts INNER JOIN topics ON posts.post_top_id = topics.top_id WHERE posts.post_top_id =$row";
	//echo $query; die();
	$result = mysql_query($query);
	
	if(empty($result)) print 'VAZIO';
	
	#$res = $topico->retornaDados();
	if($topico and !empty($result)):
		
	echo "<h1>$tela</h1><br /><h4></h4>";	
	echo "<article class='topiclist'><table class='table table-striped'>";	
	//while($res = $topico->retornaDados()):
	while($res = mysql_fetch_assoc($result)):
		//echo $res['post_name']; die();
		?>
		<tr>
			<span>
				<td><h4><a href="?m=post&t=<?php print $res['post_name'];?>"><?php echo ucfirst($res['post_name']);?></a></h4>
					<span><?php echo ucfirst($res['post_date'])?></span>
				</td>	
			</span>
		</tr>
		<?php
	endwhile;
	endif;		
	echo "</table></article>";
endif;//if inicial	
	
?>