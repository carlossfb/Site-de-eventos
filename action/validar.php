<?php
	include_once('conn/conexao.php');
	session_start();
	if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = htmlspecialchars(addslashes($_POST['email']));
    $csenha = htmlspecialchars(addslashes($_POST['senha']));
	$senha = hash('sha512', $csenha);
	$sql = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email' AND senha_usuario = '$senha'");
	$sqle = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email'");
	
	if(!$sql){die("ERRO");}

	else if($sql->num_rows == 0 || $sqle->num_rows == 0){
		
		if($sqle->num_rows == 0){
			header("location:../login.php?erro=Email ainda nao cadastrado");
		}
		else{
			header("location:../login.php?erro=Senha incorreta");
		}
		die();
	}
	else if($sql->num_rows > 0){
		echo 'achei';
		$access = mysqli_fetch_assoc($sql);
		$_SESSION['usuario'] = $access['nome_usuario'];
		$_SESSION['id_postador'] = $access['id_usuario'];
		$_SESSION['email'] = $access['email_usuario'];
		$_SESSION['acesso'] = $access['acesso'];
		$_SESSION['cod'] = "usuario".hash('sha512', rand(100, 1000));
		header("location:../meus_eventos.php");
	}
	else if(!$_POST['email'] || !$_POST['senha']){
		header("location:../login.php");
	}
}
else{
	header("location:../login.php");
}
	$conn->close();
?>
