<?php	require_once(dirname(dirname(__FILE__))."/funcoes.php");
		protegeArquivo(basename(__FILE__));
	$tela = antiInject($_GET['t']);
	#exibir post e seus comentários, devo ter um form que use ajax para adicionar os comentários.
if(isset($tela)){
	#instanciando as classes
	$post = new Post();
	$commment = new Comment();
	?>
	<article class="comment">
		<form class="form-horizontal">
		  <div class="form-group">
		    <h4>Adicionar um comentário</h4>
		    <div class="col-sm-10">
		     	<textarea class="form-control" rows="3" id="commentEditor"></textarea>
		     	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'commentEditor' );
            	</script>
		     	<button type="submit" class="btn btn-default">Reply</button>
		    </div>
		  </div>
		</form>
	</article>
<?php	
}
else{
	echo '404 Page Not Found!';
}
	
