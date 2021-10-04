<?php

	include('conn/conexao.php');

	if(isset($_POST['senha_usuario']) && $_POST['senha_usuario'] == $_POST['confirma_senha_usuario'] && $_POST['senha_usuario'] !=''){
		
			$senha = trim(htmlspecialchars(addslashes($_POST['senha_usuario'])));
			$email = htmlspecialchars(addslashes($_POST['email_usuario']));
			$nome =  htmlspecialchars(addslashes($_POST['primeiro_nome_usuario'])).' '.addslashes($_POST['ultimo_nome_usuario']);
			
			$sqli = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email'");
			$qt = $sqli->num_rows;
			$cript = hash('sha512', $senha);
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				if($qt == 0){
						$cript = hash('sha512', $senha);
						if(!isset($_POST['@adms'])){
							$sql_cod = $conn->query("INSERT INTO tb_usuarios (nome_usuario, email_usuario, senha_usuario,acesso) VALUES ('$nome','$email','$cript','usuario)");
						}
						else{
							$acess = htmlspecialchars(addslashes($_POST['@adms']));
							$sql_cod = $conn->query("INSERT INTO tb_usuarios (nome_usuario, email_usuario, senha_usuario,acesso) VALUES ('$nome','$email','$cript','$acess')");
						}
						$style2="";
						$style="style = 'display:none;'";
						$default = $nome;
                        session_start();
                        session_destroy();
					
				}
				else{
					$style="";
					$style2="style='display:none;'";
					$default="Olá ".$nome." aparentemente seu email ".$email." já está cadastrado,";
				}
			}
			else{
				$style="";
				$style2="style='display:none;'";
				$default="Olá ".$nome.", o email que forneceu é inválido,";
			}
			
	}
	else if(!$_POST){
		$style="";
		$style2="style='display:none;'";
		$default="Olá Usuário, aparentemente não se cadastrou ainda, retorne para a página de login e clique em 'criar uma conta',";
	}
	else if($_POST['senha_usuario'] != $_POST['csenha_usuario']){
		$default = "As senhas digitadas são diferentes,"; 
		$style="";
		$style2="style='display:none;'";
	}
	else{
		$default = "Digite uma senha válida,"; 
		$style="";
		$style2="style='display:none;'";
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
	<body>
		<div class="container col pt-5 mt-5" <?php echo $style; ?>>
		
			<div class="alert alert-danger" role="alert">
			  <h4 class="alert-heading">OPS, Algo deu errado!</h4>
			  <p><?php echo $default; ?> confira o email digitado, a senha e tente novamente por favor.</p>
			  <hr>
			  <p class="mb-0 row container">Se o erro persistir, contate-nos. Clique aqui para retornar para a pagina de cadastro<a href="../novo_usuario.php"><button class="btn btn-danger d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>
			</div>
		</div>
		<div class="container col pt-5 mt-5" <?php echo $style2; ?>>
			<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Sucesso!</h4>
			  <p>Olá, seja bem-vindo <?php echo $default; ?></p>
			  <hr>
			  <p class="mb-0 row container">Clique aqui para retornar para a pagina de login<a href="../login.php"><button class="btn btn-success d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>
			</div>
		</div>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>



