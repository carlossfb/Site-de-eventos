<?php

include('action/conn/conexao.php');
//arquivo de update de senha com filtros htmlspecialchars contra ataque xss e contra sqlinjection ->addslashes
if(isset($_POST['update_senha'])){
	
		$update = trim(htmlspecialchars(addslashes($_POST['update_senha'])));
		$old =    trim(htmlspecialchars(addslashes($_POST['senha_email'])));
		$email =  trim(htmlspecialchars(addslashes($_POST['email'])));
		//criptografar com sha512 a senha antiga para verificacao
		$oldd = hash('sha512', $old);
		//criptografar com sha512 a senha nova
		$cript = hash('sha512', $update);
		
		$sqli = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email' AND senha_usuario = '$oldd'");
		
		//verificar se existe o usuario
		if($sqli->num_rows > 0){
			$sql_cod = $conn->query("UPDATE `tb_usuarios` SET `senha_usuario` = '$cript' WHERE `tb_usuarios`.`email_usuario` = '$email'");
			$style2="";
			$style="style= 'display:none;'";
		}
		else{
			$style="";
			$style2="style= 'display:none;'";
		}
		
}
else{
	$style="";
	$style2="style= 'display:none;'";
}

$conn->close();
//os styles servem pra mostrar apenas a mensagem correspondente ao erro ou operacao realizada com sucesso nas divs do html
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
		<title>Atualizar senha</title>
	</head>
	<body>
		<div class="container col pt-5 mt-5" <?php echo $style; ?>>
		
			<div class="alert alert-danger" role="alert">
			  <h4 class="alert-heading">OPS, Algo deu errado!</h4>
			  <p>A senha informada pelo email pode ter sido digitada incorretamente, confira o email digitado e a senha novamente por favor.</p>
			  <hr>
			  <p class="mb-0 row container">Se o erro persistir, contate-nos. Clique aqui para retornar para a pagina de login<a href="login.php"><button class="btn btn-danger d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>
			</div>
		</div>
		<div class="container col pt-5 mt-5" <?php echo $style2; ?>>
			<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Sucesso!</h4>
			  <p>Sua senha foi alterada com sucesso!</p>
			  <hr>
			  <p class="mb-0 row container">Clique aqui para retornar para a pagina de login<a href="login.php"><button class="btn btn-success d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>



