<?php
require_once(dirname(__FILE__).'/autoload.php'); //não chamo o funcoes.php, chamo o autoload->funcoes
protegeArquivo(basename(__FILE__));//tenho que chamar em todas minhas classes
	class usuarios extends base{
		public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "usuarios";
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
	
		public function doLogin($objeto){
			$objeto->extrasSelect = "WHERE login='".$objeto->getValor('login')."' AND senha='".codificaSenha($objeto->getValor('senha'))."' AND
			ativo='s'"; //DEVO ATIVAR DEPOIS E EXCLUIR A LINHA DE BAIXO, SÓ PARA NAO CODIFICAR MINHA SENHA FEITA NA MAO
			//$objeto->extrasSelect = "WHERE login='".$objeto->getValor('login')."' AND senha='".$objeto->getValor('senha')."' AND
			//ativo='s'";
			$this->select($objeto);
			$sessao = new sessao();
			if($this->linhasafetadas==1):
				$usLogado = $objeto->retornaDados();
				$sessao->setVar('iduser', $usLogado->id);
				$sessao->setVar('nomeuser', $usLogado->nome);
				$sessao->setVar('loginuser', $usLogado->login);
				$sessao->setVar('logado', true);
				$sessao->setVar('ip', $_SERVER['REMOTE_ADDR']);	
				//print_r($sessao);
				//exit;
				return TRUE;
			else:	
				$sessao->destroy(TRUE);
				return FALSE;
			endif;	
		}//doLogin, classe que fazer consulta se ta logado
		
		public function doLogout(){
			$sessao = new sessao();
			$sessao->destroy(TRUE);
			redireciona('login.php');
		}
		public function existeRegistro($campo=NULL, $valor=NULL){//nessa funcao eu valido se o usuario já esta cadastrado 
			if($campo != NULL && $valor != NULL):
				is_numeric($valor) ? $valor = $valor : $valor = "'".$valor."'";
				$this->extrasSelect = "WHERE $campo=$valor";
				$this->select($this);
				if($this->linhasafetadas > 0):
					return TRUE;
				else:
					return FALSE;
				endif;		
			else:
				$this->trataErro(__FILE__, __FUNCTION__, 'Faltam parâmentros para executar a função', TRUE);
			endif;		
		}//existeRegistro
		
	}//fim da classe de Usuarios
?>