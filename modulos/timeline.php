<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
switch($tela){
	case 'newtopic':
		loadCSS('timeline');
		?>
		<div class="newtopic">
			<header>
				<h1>Criar um novo tópico</h1>
			</header>
			<article>
			<form class="form-group formnewtopic">
				<label>Título</label><br />
				<input type="text" name="newtopicname" size="80" id="newtopicname" class="form-control"/>
				<label>Objetivo</label><br />
				<textarea class="form-control" rows="3"></textarea>
			</form>
			</article>
		</div>
		<?php
	break;	
}

?>