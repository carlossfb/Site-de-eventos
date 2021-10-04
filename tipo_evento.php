<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location:login.php");
	}
	?>

    <title>Tipo de evento</title>
  </head>
  <body id="site1">
		<div class="container pt-3">
			<div class="jumbotron pt-4 px-5 con">
					<nav class="navbar navbar-expand-lg navbar-light">
							  <h3 class="navbar-brand ml-4 mr-5 pr-5" href="index.php">SEXTOUU</h3>
							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							  </button>
							  <div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto ml-5">
								  <li class="nav-item link">
									<a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
								  </li>

								  <li class="nav-item dropdown link active" id="actived">
									<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 Eventos
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown1">
									   <a class="dropdown-item" href="eventos.php?categoria=musical">Festivo/Musical</a>
									 <div class="dropdown-divider"></div>
									 <a class="dropdown-item" href="eventos.php?categoria=cultural">Educativo/Cultural</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="eventos.php">Ver todos</a>
									</div>
								  </li>

								  <li class="nav-item dropdown link">
									<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 Menu
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									   <a class="dropdown-item" href="novo_usuario.php">Cadastre-se</a>
									 <div class="dropdown-divider"></div>
									 <a class="dropdown-item" href="contabilidade.php">Contabilidade</a>
									  <?php if(isset($_SESSION['usuario'])){echo "<a class='dropdown-item' href='meus_eventos.php'>Meus eventos</a>";}?>
									  <div class="dropdown-divider"></div>					<!--verificar se esta logado e se estiver mostrar seu nome ou apenas o "entrar"-->
									   <a class="dropdown-item active" href="<?php if(isset($_SESSION['usuario'])){echo 'minha_conta.php';}else{echo 'login.php';} ?>"><?php if(!isset($_SESSION['usuario'])){echo 'Entrar';}else{ echo $_SESSION['usuario'];} ?></a>
									</div>
								  </li>
								</ul>
							  </div>
					</nav>			  
			  <hr class="my-0 pb-5">
			  <h1 class="display-4">Escolha o tipo de evento!</h1>
			  <p class="lead">Vamos começar escolhendo um gênero de evento.</p>
			  <hr class="my-4">
						<div class="row">
							<div class="col-md-6 text-center">
								<a href="novo_evento.php" class="btn button1 new-btn4 m-1 p-4 col-md-6 img-fluid"><h5>Festivo <br> Musical</h5></a>		
							</div>
							<div class="col-md-6 text-center">
								<a href="novo_evento2.php" id="arquivo" class="un btn button1 new-btn4 m-1 p-4 col-md-6 img-fluid"><h5>Cultural <br> Educativo</h5></a>		
							</div>
						</div>
			</div>
		</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>