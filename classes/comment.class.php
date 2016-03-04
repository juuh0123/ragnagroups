<?php require_once(dirname(__FILE__).'/autoload.php');
	protegeArquivo(basename(__FILE__));
	
	Class Comment extends Base{
		public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "coments";
			if(sizeof($campos)<=0):
				$this->camposValores = array(
				"com_user_id" => NULL,
				"com_post_id" => NULL,
				"com_container" => NULL,
				"com_date" => NULL,
				);
			else:
				$this->camposValores = $campos;
			endif;
			$this->campoPk = "com_id";	
		}//construct
	}
