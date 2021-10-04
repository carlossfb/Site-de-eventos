<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
		//include do arquivo onde tem o autocomplete basico do site para estilos musicais
		include_once("js/function.js");

		session_start();
		$_SESSION['cod'] = (!isset($_SESSION['cod'])) ? "Convidado".hash('sha512', rand(100, 1000)) : $_SESSION['cod'];
	?>
  </head>
  <body id="site1">
<div id="fb-root"></div>

	<div id="over">
      <header class="row-container">
						<nav id="nav" class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom">
								  <h3 id="logo" class="navbar-brand ml-5 pr-5" href="index.php">SEXTOUU</h3>
								  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								  </button>
								  <div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav mr-auto ml-5">
									  <li class="nav-item link">
										<a class="nav-link active" id="actived" href="index.php">Home <span class="sr-only">(current)</span></a>
									  </li>

									  <li class="nav-item dropdown link">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 Menu
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										   <a class="dropdown-item" href="novo_usuario.php">Cadastre-se</a>
										 <div class="dropdown-divider"></div>
										 <a class="dropdown-item" href="contabilidade.php">Contabilidade</a>
										  <?php if(isset($_SESSION['usuario'])){echo "<a class='dropdown-item' href='meus_eventos.php'>Meus eventos</a>";}?>
										  <div class="dropdown-divider"></div>					<!--verificar se esta logado e se estiver mostrar seu nome ou apenas o "entrar"-->
										   <a class="dropdown-item active" href="<?php if(isset($_SESSION['usuario'])){echo 'minha_conta.php';}else{echo 'login.php';} ?>"><?php if(!isset($_SESSION['usuario'])){echo 'Entrar';}else{ echo $_SESSION['usuario'];} ?></a>
										<!--ADMS-->
										<?php if(isset($_SESSION['acesso']) && $_SESSION['acesso']== '@admin' )echo "<div class='dropdown-divider'></div><a class='dropdown-item bg-danger text-white' href='adm.php'>Administrador</a>"; ?>

										</div>
									  </li>
									</ul>
									<form method="POST" action="eventos.php" class="form-inline my-2 my-lg-0">
									  <input class="form-control mr-sm-2 " type="search" id="tags" name="pesquisa" placeholder="Ex: rap" aria-label="Search" required>
									  <button class="btn button1" id="tag" id="botao" type="submit">Pesquisar</button>	
									</form>
								  </div>
						</nav>	
			<div class="space"></div>	
			<div class="card width m-1 border card-off">
			  <div class="card-body">
				<h5 class="card-title">Bem-vindo!</h5>
				<p class="card-text">Aqui você pode encontrar ou até mesmo divulgar um evento, seja cultural ou festivo. Experimente!</p>
				<button id="pop" type="button" class="btn btn-lg button1" data-placement="bottom" data-toggle="popover" title="Sextou Eventos" data-content="Esse site é pra você, seja pra encontrar informações de contato ou onde e quando comparecer, junte-se a nós, encontre seu evento!">Sobre nós</button>
			  </div>
			</div>
			<div class="space my-5"></div>
      </header>	  


		<section id="row" class="bg-light my-auto py-3 border">
			<div  class="row  my-5 justify-content-center text-center">
			
				<div class="col-md-4 mb-4">
				<div><img src="https://img.icons8.com/nolan/100/000000/google-web-search.png"></div>
				<p class="container">Encontre seu evento, com mecanismos de busca avançada, procure uma data especifica e eventos seguintes, estilos musicais, categorias e se informe! Muito Simples!</p>
				<a href="eventos.php" class="btn button1 mt-1 px-4">Eventos</a>
				</div>


				<div class="col-md-4 mb-4">
					<div><img src="https://img.icons8.com/nolan/100/000000/new-by-copy.png"></div>
					<p class="container">Se cadastre, preencha o formulário do seu evento e pronto! Seu evento foi cadastrado. Verifique como andam suas visualizações e deixe seu contato para mais detalhes, seu publico alvo cresceu!</p>
				<a href="novo_usuario.php" class="btn button1 px-3">Cadastrar</a>					
				</div>
				
				<div class="col-md-4 mb-4">
				<div><img src="https://img.icons8.com/nolan/100/000000/edit-file.png"></div>
				<p class="container">Você após cadastrar seu evento pode optar por excluir ou mudar informações, tudo depende de você, deixe o evento atrativo!</p>
				<a href="Meus_eventos.php" class="btn button1 mt-4">Meus eventos</a>				
				</div>
				
			</div>
		</section>
		<div class="space my-5 "></div>
		
		<footer class="space bg-light pt-2 text-center">
			<h1 class="font-weight-light mt-5 pt-5">Contato</h1>
			<p>sextoueventos.contato@gmail.com</p>
		</footer>
		<div class="footer navbar-fixed-bottom border-top pb-2 pt-1"><h6 class="pt-2 text-center">©sextoueve - todos os direitos reservados</h6></div>
	</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<script type="text/javascript">
//popover
	$('#pop').popover();
</script>

