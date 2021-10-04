<?php
include('conn/conexao.php');
session_start();
$erros=0;
if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['senha']) && $_POST['senha']!=""){
    $id = htmlspecialchars(addslashes($_SESSION['id_postador']));
	$nome = htmlspecialchars(addslashes($_POST['usuario']));
	$email = htmlspecialchars(addslashes($_POST['email']));
	$senha = htmlspecialchars(addslashes($_POST['senha']));
		$sqli = $conn->query("SELECT * FROM tb_usuarios WHERE id_usuario = '$id'");
		$sqlli = mysqli_fetch_array($sqli);
		if(trim(hash('sha512', $senha)) == trim($sqlli['senha_usuario'])){
			$sql = $conn->query("UPDATE tb_usuarios SET nome_usuario = '$nome', email_usuario = '$email' WHERE id_usuario = '$id'");
			if($sql){
				$_SESSION['usuario'] = $nome;
				$_SESSION['email'] = $email ;
			}	
		}
		else{
			$erros++;
			header("location:../minha_conta.php?erro=Senha atual incorreta");	
		}


	if(isset($_POST['senha']) && isset($_POST['csenha'])&& $_POST['senha'] != '' && $_POST['csenha'] != '' ){
		$senha = htmlspecialchars(addslashes($_POST['senha']));
		$csenha = htmlspecialchars(addslashes($_POST['csenha']));
		$sqli = $conn->query("SELECT * FROM tb_usuarios WHERE id_usuario = '$id'");
		$sqlli = mysqli_fetch_array($sqli);
		if(trim(hash('sha512', $senha)) == trim($sqlli['senha_usuario'])){
			$hash = hash('sha512', $csenha);
			$sql = $conn->query("UPDATE tb_usuarios SET senha_usuario = '$hash' WHERE id_usuario = '$id'");
		}
		else{
		$erros++;
		header("location:../minha_conta.php?erro=Senha atual incorreta");
		}
	}
	if($erros == 0){
	$default=$nome." suas alterações foram feitas com sucesso.";
	$style = "style='display:none;'";
	$style2 = "";
	}
	else{
		$default="Algo deu errado, retorne e tente novamente, ";
		$style2 = "style='display:none;'";
		$style = "";	
	}
}
else{
	$default="Algo deu errado, retorne e tente novamente... Não esqueça, deve enviar a senha atual para confirmar alterações e seu email,";
	$style2 = "style='display:none;'";
	$style = "";	
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<!-- links pedro -->
	
	  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
	  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
	  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>  
 
	     <!-- fimlinks -->
		<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	</head>
	<body>
		<div class="container col pt-5 mt-5" <?php echo $style; ?>>
		
			<div class="alert alert-danger" role="alert">
			  <h4 class="alert-heading">OPS, Algo deu errado!</h4>
			  <p><?php echo $default; ?> confira os dados e tente novamente por favor.</p>
			  <hr>
			  <p class="mb-0 row container">Se o erro persistir, contate-nos. Clique aqui para retornar para a sua conta<a href="../minha_conta.php"><button class="btn btn-danger d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>
			</div>
		</div>
		<div class="container col pt-5 mt-5" <?php echo $style2; ?>>
			<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Sucesso!</h4>
			  <p>Olá, seja bem-vindo <?php echo $default; ?></p>
			  <hr>
			  <p class="mb-0 row container">Clique aqui para retornar para a sua conta<a href="../minha_conta.php"><button class="btn btn-success d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>
			</div>
		</div>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>

