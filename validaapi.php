 <?php 
 //receber dados da api do google via post no javascript e receber com input post e filtrar para strings para fazer processo de insert ou login
include_once("action/conn/conexao.php");
session_start();

 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
 $id_tok = filter_input(INPUT_POST, 'id_token', FILTER_SANITIZE_STRING);
 $senha = hash('sha512',rand(100,1000));
 //recebendo dados e encriptando senha aleatoria para deixar no bd
 
 $sql = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email' LIMIT 1");
 //verificar se o usuario existe limitando a um registro apenas de retorno e dps guardando dados nas variaveis session ou inserindo o usuario novo do email especifico
 if($sql->num_rows > 0){
		$access = mysqli_fetch_assoc($sql);
		$_SESSION['usuario'] = $access['nome_usuario'];
		$_SESSION['id_postador'] = $access['id_usuario'];
		$_SESSION['email'] = $access['email_usuario'];
		$_SESSION['acesso'] = $access['acesso'];
		$_SESSION['cod'] = "usuario".hash('sha512', rand(100, 1000));
		echo $resultado = "meus_eventos.php";
 }
  else{
	$sqll = $conn->query("INSERT INTO `tb_usuarios` (`id_usuario`, `id_tok`, `nome_usuario`, `email_usuario`, `senha_usuario`)
	VALUES (NULL, '$id_tok', '$nome', '$email', '$senha')");
	
	$sqle = $conn->query("Select `id_usuario` from tb_usuarios where `email_usuario` = '$email'");
	$access2 = mysqli_fetch_assoc($sqle);
	$_SESSION['usuario'] = $nome;
	$_SESSION['acesso'] = $access['acesso'];
	$_SESSION['id_postador'] = $access2['id_usuario'];
	$_SESSION['email'] = $email;
	$_SESSION['cod'] = "usuario".hash('sha512', rand(100, 1000));
	
	if($sqll){
		echo $resultado = "meus_eventos.php";
	}
	else{
		echo $resultado = "erro";
	}
}

 
 
 ?>