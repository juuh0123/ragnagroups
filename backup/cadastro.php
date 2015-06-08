<?php
    include_once 'conecta_mysql.php';
	//include_once 'validaCampos.php';
	
	$email = addslashes($_POST['email']);
	$confirmacaoEmail = addslashes($_POST['confirmacaoEmail']);
	$nome = addslashes($_POST['nome']);
	$senha = addslashes($_POST['senha']);
	$confirmacaoSenha = addslashes($_POST['confirmacaoSenha']);


		if($email != $confirmacaoEmail || $senha != $confirmacaoSenha){
			 echo 'Preenche corretamente essa porra!';
		}
		else if($senha < 9 || empty($senha)){
			echo 'Preenche corretamente essa porra!';
		}	
		else if(empty($nome)){
			echo 'Preenche corretamente essa porra!';
		}
		////
		else if(preg_match('/^[a-zA-Z0-9]+/', $nome) || preg_match('/^[a-zA-Z0-9]+/', $email)){
		echo "ok, tudo certo!";
			$query = "INSERT INTO usuario(email, nome, senha) VALUES ('$email','$nome','$senha')";	
			mysql_query($query);
			echo "Cadastrado com sucesso!";
		}
		else{
			echo "tem caracteres especiais";
		}
		
		/*else{
			$query = "INSERT INTO usuario(email, nome, senha) VALUES ('$email','$nome','$senha')";	
			mysql_query($query);
			echo "Cadastrado com sucesso!";
		}*/
   
		