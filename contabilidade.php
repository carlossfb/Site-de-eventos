<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/folha4.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Contabilidade</title>
	<?php session_start(); include_once("js/function.js");?>
  </head>
  <body>
		<div id="over">
	        <header id="site2" class="py-1">
						<nav id="nav" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
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
										   <a class="dropdown-item active" href="<?php if(isset($_SESSION['usuario'])){echo 'minha_conta.php';}else{echo 'login.php';} ?>"><?php if(!isset($_SESSION['usuario'])){echo 'Entrar';}else{ echo $_SESSION['usuario'];}?></a>
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
				<div class="card width m-1">
				  <div class="card-body">
					<h5 class="card-title">Olá!</h5>
					<p class="card-text">Aqui você pode baixar um arquivo compacto que idealiza parte do que um evento precisa contabilizar, experimente, altere. Aproveite!</p>
					<div id="baixar"></div>
					<a href="#baixar" class="btn button1">Vamos lá!</a>				
				  </div>
				</div>			
            </header>	  
			
			<div class="row">
				<div class="col-md-5 cor">
					<div><img class="img-fluid" src="img/exe.jpg" alt="..."></div>
				</div>
				<blockquote class="blockquote col-md-7 text-center">
					<div class="py-2 px-4 font-weight-normal text-justify">
						<p>A página de contabilidade servira para facilitar ao administrador em questões financeiras,por exemplo, calcular seus gastos e também os lucros recebidos.Além disso a pagina também fornecerá o lucro total, fornecendo também uma folha de fatura com todas as informações principais do evento.</p>
					</div>
				</blockquote>
			</div>
			<section class="text-center">	
				<a href="#arquivo" class="un btn button1 m-1 p-4"><h5>Quero baixar</h5></a>		
			</section>
			<div class="row">
				<blockquote class="blockquote col-md-7 text-center">
					<div class="p-4 text-justify">
						<p>Para fazer o download do arquivo, clique no botão abaixo "BAIXAR ARQUIVO", assim que terminar o download extraia a pasta, nela está contida um arquivo Excel, e também, um arquivo Word. No arquivo Excel, contem uma planilha interativa, que ajudará o administrador do evento a fazer algumas operações simples,por exemplo, saber o total de lucro que rendeu o evento, e também disponibilizara uma especie de "folha de fatura" com as principais informações do evento. No arquivo Word, terá um pequeno tutorial de como utilizar a planilha.</p>
					</div>
				</blockquote>
				<div class="col-md-5 cor">
					<img class="img-fluid" src="img/exe.jpg" alt="...">
				</div>
			</div>
			<section class="text-center">	
				<a href="Download/contabilidade.rar" id="arquivo" class="un btn button1 m-1 p-4">
				<h5>Baixar arquivo</h5></a>		
			</section>
			<footer class="space bg-light pt-2 text-center">
				<h1 class="font-weight-light mt-5 pt-5">Contato</h1>
				<p>sextoueventos.contato@gmail.com</p>
			</footer>
			<div class="footer navbar-fixed-bottom border-top pb-2 pt-1"><h6 class="pt-2 text-center">©sextoueve - todos os direitos reservados</h6></div>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>