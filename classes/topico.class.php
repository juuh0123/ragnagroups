<?php  //cadastrar e ter todas funcoes relacionados aos topicos
require_once(dirname(__FILE__).'/autoload.php'); //não chamo o funcoes.php, chamo o autoload->funcoes
protegeArquivo(basename(__FILE__));//tenho que chamar em todas minhas classes

Class Topico extends Base{
	public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "topics";
			if(sizeof($campos)<=0):
				$this->camposValores = array(
				"top_id" => NULL,
				"top_user_id" => NULL,
				"top_name" => NULL,
				"top_obj" => NULL,
				"top_post" => NULL,
				"top_container" => NULL,
				"top_date" => NULL,
				);
			else:
				$this->camposValores = $campos;
			endif;
		}//construct
	
}

?>