<?php
	include 'conecta_mysql.php';
	session_start();
	
	$email = addslashes($_POST["username"]);
	$senha = addslashes($_POST["password"]);
		
    if(empty($email)==true || empty($senha)==true){	
    	header('Location: dashboard.php');
	}
	//consultando o bd, verificar se o email -> id está no bd	
	$resultado = mysql_query ("SELECT * FROM usuario
			WHERE email = '".addslashes($email)."' ");
	$linhas = mysql_num_rows($resultado);
		
		
	if($linhas == 0) //testa se a cosulta retornou algum registro
	{	
		//se entrar aqui é porque o email não está no BD
		header("dashboard.php");exit;
	}	
	else if($senha != mysql_result($resultado, 0, "senha"))//confere a senha
	{
		//se entrar aqui é porque a senhha está incorreta
	header("Location: dashboard.php");exit;
	}
	else{ //Usuário e senha corretos. Vamos criar os cookies(neste caso as sessions)
		$_SESSION['nome_usuario'] = $email;
		$_SESSION['senha_usuario'] = $senha;
			//$resultado2 = mysql_query("SELECT nivel FROM usuario WHERE email = '$email'");
			//$nivel = mysql_result($resultado2, 0);
			//$_SESSION['nivel'] = $nivel;
			//setcookie("nome_usuario", $login);
			//setcookie("senha_usuario", $senha);
			//direcionar para a página inicial dos usu�rios cadastrados
			//header("Location: direciona.php");
		echo "logado com sucesso!";	
	}
	mysql_close($conexao); //fechando conexão com BD
		
  /*include 'validaIntruso.php';
	include 'conectaMysql.php';
    
    $username = addcslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	
	if(efetuarLogin){
		//efetua login - procedimentos
	}
	else{
		//username/password incorretos ; sugerir cadastro 
		header('location: cadastro.php');
	}
	*/
