<!DOCTYPE html>
<html lang="pt-br">
	<head>  
		<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!--API do google para login-->
		<meta name="google-signin-scope" content="profile email">
		<script src="http://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="590856753485-66qlrmu2g1b48ihjgoi4ubtmn7k3veg5.apps.googleusercontent.com">

		<!--Css externo-->
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/clean.css">
		<title>Login</title>
	</head>
	<body id="site2">
	<?php
	
	
	?>
<script type="text/javascript">
				function carregando1(){
					document.getElementById("enviar1").value =('Carregando...');
				}				
				function carregando(){
					document.getElementById("enviar").value = ('Carregando...');
				}
		

				  function onSignIn(googleUser) {
				// Useful data for your client-side scripts:
				var profile = googleUser.getBasicProfile();
			
				// The ID token you need to pass to your backend:
				var id_token = googleUser.getAuthResponse().id_token;
				var nome =  profile.getName();
				var email = profile.getEmail();
				if(email != ""){
					var dados = {
						id_token:id_token,
						nome:nome,
						email:email
					};
					$.post('validaapi.php', dados, function(result){
						if(result === "erro"){
							var msg = "Erro";
							document.getElementById("text").innerHTML = msg;
						}
						else{
							window.location.href = result;
						}
					});
				}else{
					var msg = "Usuario nao encontrado";
					document.getElementById("text").innerHTML = msg;
				}
			  }
	  
	  


</script> 
		<div class="my-4 pt-5">
			<main role="main" id="mained" class="inner cover text-center container d-flex justify-content-center">
				<div class="shadow-sm p-3 mb-5 bg-white rounded">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						<a href="index.php"><button class="btn btn-primary d-flex"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a>
							<li class="breadcrumb-item active ml-2 pt-1 " aria-current="page">Home</li>
						</ol>
					</nav>
				<span class=" border-bottom mt-2 d-flex p-left"></span><br>
					<form method="POST" action="action/validar.php" data-toggle="validator">
					  <div class="row container form-group">
						<label for="exampleInputEmail1a">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1a" data-error="Digite um email válido" aria-describedby="emailHelp" name="email" placeholder="Digite seu email" required>
						<small id="emailHelp" class="form-text help-block with-errors text-danger"></small>
					 </div>
					  <div class="row container form-group">
						<label for="exampleInputPassword1av">Senha</label>
						<input type="password" class="form-control" id="exampleInputPassword1av" data-error="Digite uma senha válida" placeholder="Digite sua senha" name="senha" data-minlength="3" required>
					  	<small id="emailHelp" class="p-1 form-text help-block with-errors text-danger"><?php if(isset($_GET['erro'])){echo htmlspecialchars($_GET['erro']);}?></small>
					  	<small id="emailHelp" class="form-text text-danger"></small>
					  </div>
						<nav aria-label="breadcrumb text-center">
							<input type="submit" value="Enviar" onclick="carregando()" id="enviar" class="mb-2 btn btn-primary new-btn">
							
	<!--Login alternativo--><div class="g-signin2 mb-2" data-onsuccess="onSignIn" data-theme="dark"></div>	
	
						  <ol class="breadcrumb m-auto justify-content-center">
							<li class="breadcrumb-item pt-2 ml-3 mr-3"><a href="#" data-toggle="modal" data-target="#exampleModal">Esqueci minha senha</a></li>
							<li class="breadcrumb-item pt-2 ml-3 mr-3"><a href="novo_usuario.php">Criar uma conta</a></li>
						  </ol>
						</nav>
					</form>
				</div>
			</main>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Digite o email</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form class="pl-4" method="POST" action="action/validar_esqueci.php">
							  <div class="row container form-group">
								<div class="row d-flex justify-content-center">
										<label for="exampleInputEmail1">Email</label>
									<div class='col-8'>
										<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu email"  required>
									</div>
									<div class='col-2'>
										<input type="submit" onclick="carregando1()" value="Confirmar" id="enviar1"  class="btn btn-primary">
									</div>
								
								</div>
								<small id="emailHelp" class="form-text text-muted" id="text">Não compartilhe seu email com ninguém</small>
							  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
		</div>	




			
				
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="http://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script src="js/validator.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>	
	</body>
</html>


