<?php require_once(dirname(__FILE__).'/autoload.php');
	protegeArquivo(basename(__FILE__));
	
	Class Comment extends Base{
		public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "comment";
			if(sizeof($campos)<=0):
				$this->camposValores = array(
				"nome" => NULL,
				"email" => NULL,
				"login" => NULL,
				"senha" => NULL,
				"ativo" => NULL,
				"administrador" => NULL,
				"dataCad" => NULL,
				);
			else:
				$this->camposValores = $campos;
			endif;
			$this->campoPk = "id";	
		}//construct
	}
