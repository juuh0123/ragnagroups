<?php
require_once(dirname(__FILE__).'/autoload.php'); //não chamo o funcoes.php, chamo o autoload->funcoes
protegeArquivo(basename(__FILE__));//tenho que chamar em todas minhas classes
	
	class Post extends base{
		public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "posts";
			if(sizeof($campos)<=0):
				$this->camposValores = array(
				"post_name" => NULL,
				"post_container" => NULL,
				"post_date" => NULL,
				"post_user_id" => NULL,
				"post_top_id" => NULL,
				);
			else:
				$this->camposValores = $campos;
			endif;
			$this->campoPk = "post_id";	
		}//construct
	}// final da classe post
?>