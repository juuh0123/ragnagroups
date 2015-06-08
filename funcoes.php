<?php
	inicializa();
	protegeArquivo(basename(__FILE__));
	function inicializa(){
		if(file_exists(dirname(__FILE__).'/config.php')):
			require_once(dirname(__FILE__).'/config.php');
		else:
			die(utf8_decode("O arquivo de configuração não foi localizado, contate o administrador."));
		endif;
		$constantes = array('BASEPATH','BASEURL','ADMURL','CLASSESPATH','MODULOSPATH','CSSPATH','JSPATH','DBHOST','DBUSER','DBPASS','DBNAME');
		foreach($constantes as $valor):
			if(!defined($valor)):
				die(utf8_decode('Uma configuração do sistema está ausente: '.$valor));			
			endif;
		endforeach;			
		require_once(BASEPATH.CLASSESPATH.'autoload.php');
		if(@$_GET['logoff']==TRUE):
			//faz logoff
			$user = new usuarios();
			$user->doLogout();
			exit;
		endif;		
	}//inicializa
	function loadCSS($arquivo = null, $media ='screen', $import = FALSE){
		if($arquivo != null):
			if($import == TRUE):
				echo '<style type="text/css">@import url("'.BASEURL.CSSPATH.$arquivo.'.css");</style>'."\n";
			else:
			echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />'."\n";
			endif;
		endif;		
	}//loadCSS
	function loadJS($arquivo=null, $remoto=false){
		if($arquivo != null):
			if($remoto == FALSE) $arquivo = BASEURL.JSPATH.$arquivo.'.js';
				echo '<script type="text/javascript" src="'.$arquivo.'"></script>'."\n";
		endif;	
	}//loadJS
	function loadModulo($modulo = null, $tela = null){
		if($modulo == null || $tela == null):
			echo '<p>Erro na função <strong>'.__FUNCTION__.'<strong>: Faltam parêmetros para execução.</p>';
		else:
			if(file_exists(MODULOSPATH. "$modulo.php")):
				include(MODULOSPATH. "$modulo.php");			
			else:
				echo '<p>Módulo inexistente neste sistema!</p>';	
			endif;	
		endif;	
	}//loadModulo
	function protegeArquivo($nomeArquivo, $redirPara = 'index.php?erro=3'){
		$url = $_SERVER["PHP_SELF"];
		if(preg_match("/$nomeArquivo/i", $url)):
			//redireciona para outra url
			redireciona($redirPara);
		endif;	
	}//protegeArquivo
	function redireciona($url = ''){
		header("Location: ".BASEURL.$url);
	}//redireciona
	function codificaSenha($senha){
		return md5($senha);
	}//codificaSenha
	function verificaLogin(){
		$sessao = new sessao();
		if($sessao->getNvars() <= 0 || $sessao->getVar('logado')!= TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):
			redireciona('?erro=3');
		endif;	
	}//vai verificar session, se pode ou não acessar certas páginas
	function teste(){
		echo 'está chamando o arquivo funcoes.php';
	}
?>










