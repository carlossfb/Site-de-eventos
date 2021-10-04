<!DOCTYPE html>
<html lang="pt-br">
	<head>  
		<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!--API do google para login-->
		<meta name="google-signin-scope" content="profile email">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="590856753485-ub9e866v8k3l11622au9pji1ppebd5kn.apps.googleusercontent.com">
		<!--Css externo-->
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<title>Minha conta</title>
	</head>
	<body id="site2">
	<?php session_start();
		if(!isset($_SESSION['usuario'])){
			header('location:login.php');
		}
	
	?>
	<input type="hidden" class="g-signin2 none" data-onsuccess="onSignIn"></input>
<script type="text/javascript">
//funcao signout da api do google
	  function signOut(){
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
		  console.log('User signed out.');
		});
	  }
	    function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
}
</script> 	
		<div class="my-5 py-5">
			<main role="main" id="mained" class="inner cover text-center container d-flex justify-content-center">
				<div class="shadow-sm p-3 mb-5 bg-white rounded">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						<a href="index.php"><button class="btn btn-primary d-flex"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a>
							<li class="breadcrumb-item active ml-2 pt-1 " aria-current="page">Home</li>
						</ol>
					</nav>
				<span class=" border-bottom mt-2 d-flex p-left"></span><br>
					<form method="POST" action="action/update.php">
					  <div class="row container form-group">
						<label for="exampleInputEmail1" class="col-4"><img src="https://img.icons8.com/office/50/000000/user.png"></label>
						<input type="text" class="form-control col-7" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario" value="<?php echo $_SESSION['usuario'];?>" required>
						</div>
					  <div class="row container form-group">
						<label for="exampleInputEmail1a">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1a" aria-describedby="emailHelp" name="email" value="<?php echo $_SESSION['email'];?>" required>
						<small id="emailHelp" class="form-text text-muted">Não compartilhe seu email com ninguém</small>
					  </div>					  
					  <div class="row container form-group">
						<label for="exampleInputPassword1a">Senha atual</label>
						<input type="password" class="form-control" id="exampleInputPassword1a" placeholder="Digite sua senha" name="senha">
					 <div class="form-text text-danger col-12">
						<?php //verificar possiveis erros recebidos via get e exibir
						if(isset($_GET['erro'])){echo htmlspecialchars($_GET['erro']);} ?>
					 </div>
					 </div>					  
					  <div class="row container form-group">
						<label for="exampleInputPassword1">Nova senha</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="csenha">
					  </div>
						<nav aria-label="breadcrumb col-12">
							<a href="#"  id="sair" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-danger m-1" onclick="signOut();">Sair da conta</a>
							<a href="meus_eventos.php"  id="meus_eventos" class="btn btn-outline-primary  m-1">Meus eventos</a>
							<a href="action/validar_esqueci.php"  id="minha_senha" class="btn btn-outline-primary m-1">Esqueci minha senha</a>
							<input type="button" value="Atualizar dados" data-toggle="modal" data-target="#exampleModal1" id="enviar" class="btn btn-outline-primary m-1">						 
						</nav>
						<a href="https://icons8.com/icon/21441/usuário">Usuário icon by Icons 8</a>


						<!-- Modal -->
						<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Salvar mudanças?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								<div class="row d-flex justify-content-center">
									<div class='col-6 text-center'>
										<a value="Cancelar" id="cancela" data-dismiss="modal" aria-label="Close" class="btn btn-danger text-white">Cancelar</a>
									</div>
									<div class='col-6 text-center'>
										<input type="submit" value="Atualizar dados"  class="btn btn-primary">
									</div>									
								</div>
							  </div>
							</div>
						  </div>
						</div>
					</form>
				</div>
			</main>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabela" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabela">Deseja realmente sair?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<div class="row d-flex justify-content-center">
							<div class='col-6 text-center'>
								<a value="Cancelar" id="cancela" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-white">Cancelar</a>
							</div>
							<div class='col-6 text-center'>
								<a href="action/sair.php?sair=<?php echo $_SESSION['cod'];?>"  id="sair" class="btn btn-danger" onClick="signOut()">Sair da conta</a>
							</div>									
						</div>
					  </div>
					</div>
				  </div>
				</div>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>


