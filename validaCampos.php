<?php
	
	include 'cadastro.php';
    
    function validaCampos(){
		if($email !== $confirmacaoEmail || $senha !== $confirmacaoSenha){
			return false;
		}
		else if($senha < 9 || empty($senha)){
			return false;
		}	
		else if(empty($nome)){
			return false;
		}
		else{
			return true;
		}
    }
?>



/*
 function validaEmail($cadEmail, $cadEmail2){
  	$cadEmail = trim($cadEmail);
  	$cadEmail2 = trim($cadEmail2);
  	$cadEmail = strip_tags($cadEmail);
	$cadEmail2 = strip_tags($cadEmail2);
	$cadEmail = htmlspecialchars($cadEmail);
	$cadEmail2 = htmlspecialchars($cadEmail2);
	$erroEmail = false;
	
	$tamanhoEmail = strlen($cadEmail);
	$tamanhoEmail2 = strlen($cadEmail2);
	
		if(($cadEmail !== $cadEmail2)||($tamanhoEmail<12||$tamanhoEmail2<12)){
			$erroEmail = true;
		} 
		
	 return $erroEmail;	
  	}
 */