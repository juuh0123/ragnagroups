<?php 
require_once(dirname(__FILE__).'/autoload.php'); //não chamo o funcoes.php, chamo o autoload->funcoes
//protegeArquivo(basename(__FILE__));//tenho que chamar em todas minhas classes

Class Timeline extends Topico{
	public function __construct($campos=array()){
			parent::__construct();
		//a time line vai ter a funcao de validar se nao há novos topicos e posts, trazelos por data
	}
}
?>