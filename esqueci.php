<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/folha.css">
	<link rel="stylesheet" type="text/css" href="css/folha2.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <title>Esqueci minha senha</title>
  </head>
  <body id="site1">
  <div>
  <?php
  //verificar se o email foi passado via get ou redirecionar para login
  if(!isset($_GET['email'])){header('location:login.php');}
  //receber o email e possiveis erros via get
  $erros = htmlspecialchars(addslashes($_GET['erros']));
  $email = htmlspecialchars(addslashes($_GET['email']));
  ?>
			<main role="main" id="teste" class="pt-5 col-sm-12 col-lg-6 col-md-8 inner cover text-center container d-flex justify-content-center">
				<div class="bg-white rounded">
					<nav aria-label="breadcrumb" class="m-1">
								<ol class="breadcrumb">
								<a href="index.php"><button class="btn btn-primary d-flex"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a>
									<li class="breadcrumb-item active ml-2 pt-1 " aria-current="page">Home</li>
								</ol>
					</nav>																			<!--verificar se tem erros e redirecionar para tela de cadastro caso o usuario persistir no erro-->
					<form method="POST" data-toggle="validator" action="<?php if($erros > 0){echo $link = 'novo_usuario.php';}if($erros == 0){ echo $link = 'nova_senha.php';}?>" class="shadow-sm pl-3 pr-3 pb-1">
					  <div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
						  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php if(isset($email)){$email; echo $email;}?>" name="email" required>
						</div>
						<label for="inputPasswordd" class="col-sm-2 col-form-label mt-1">Senha</label>
						<div class="col-sm-10">
						  <input type="passwordd" class="form-control" data-error="Ops, parece que esqueceu de algo!" id="inputPasswordd" placeholder="Senha recebida pelo email" name="senha_email" required>						  </div>
						<label for="inputPassword1" class="col-sm-2 col-form-label">Nova senha</label>
						<div class="col-sm-10">
						  <input type="password" data-error="Ops, parece que esqueceu de algo!" class="form-control mt-2" id="inputPassword1" placeholder="Nova senha" name="update_senha" required>
						  
						</div>
								<small class="form-text help-block with-errors text-danger col-12"></small>
								<small class="text-danger col-12">
									<?php
									//receber diferentes tipos de erros via url
											if(isset($_GET['2'])){
												echo $msg = htmlspecialchars($_GET['2']).'<br>';
											}										
											if(isset($_GET['1'])){
												echo $msg = htmlspecialchars($_GET['1']).'<br>';
											}										
											if(isset($_GET['3'])){
												echo $msg = htmlspecialchars($_GET['3']).'<br>';
											}
											if(isset($_GET['0']) && $_GET['0'] != 'Verifique seu email' && $_GET['0'] != 'Senha enviada para o email' ){
												echo $msg = htmlspecialchars($_GET['0']).'<br>';
											}											
									?>
								</small>
								<small class="text-success col-12">
									<?php
									//receber mensagem de sucesso via url
											if(isset($_GET['0']) && $_GET['0'] == 'Verifique seu email' || $_GET['0'] == 'Senha enviada para o email' ){
												echo $msg = htmlspecialchars($_GET['0']).'<br>';
											}	
									?>
								</small>
					  </div>
					  <nav aria-label="breadcrumb text-center">
						 <ol class="breadcrumb">
							<li class="breadcrumb-item pt-2 ml-2"><a href="novo_usuario.php">Criar uma conta</a></li>
							<li class="col"></li>
							<li class="pl-5 pr-4"><button type="submit" id="enviar" class="btn btn-primary ml-4 col">Enviar</button></li>
						 </ol>
					   </nav>
					</form>
				</div>
			</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  	<script src="js/validator.min.js"></script>
  </body>
</html>