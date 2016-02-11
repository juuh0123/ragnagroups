<?php 
require_once(dirname(__FILE__).'/autoload.php'); //não chamo o funcoes.php, chamo o autoload->funcoes
//protegeArquivo(basename(__FILE__));//tenho que chamar em todas minhas classes

Class Timeline extends Topico{
	public function __construct($campos=array()){
			parent::__construct();
		// A funcao da classe Timeline é atualizar por meio de data, ou seja, os mais recentes Topicos, provavelmente vou ter q usar paginação
		//nessa classe. 
			/* $topic = new Topico(array(
				'top_name'=> 'Segundo Topico',
				'top_post'=> 'Lista de posts',
				'top_container'=> 'Container, vai ter tudo aqui dentro2',//aqui eu vou instaciar a class post e trazer todos os nomes de post como um link que entra nele e exibe os comentarios
				'top_date'=>date('Y-m-d H:i:s')//ele concordou com os termos, ele poderia alegar que o site apresentou erro e ele nao);	
				));
				$topic->inserir($topic);//insere os dados no db
				*/
				$topic = new Topico();
			   	$topic = $this->select($topic);
				print_r($topic);		
			 	//echo "entrou no if";
				//echo "Agora que entrou neste if eu tenho que verificar/trazer os topicos, linkando os nomes para eles mesmo e dentro
				//monstrando os posts";
			 
			 
		}//construct
	}
?>