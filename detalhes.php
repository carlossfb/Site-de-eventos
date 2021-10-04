<!DOCTYPE html>
<html lang="pt-br" id="site1">
	<head>  
		<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!--Css externo-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Detalhes</title>	
		<?php include_once("js/function.js"); ?>
	</head>
	<body id="site1">
<div id="fb-root"></div>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3"></script>

		<div id="over">
						<?php
						//iniciar sessao
						session_start();
						//verificar se houve a informacao via get do id do evento para redirecionar caso nao houver
						if(!isset($_GET['id'])){header('location:eventos.php');}
						include("action/conn/conexao.php");
						//filtro de eventos com get id e depois select
						$id = htmlspecialchars(addslashes($_GET['id']));
						$sql= $conn->query("SELECT * FROM tb_eventos where id_evento = $id");
						//trazer os dados para a variavel $eventos para echo nos devidos campos do formulario
						$evento = mysqli_fetch_assoc($sql);
						?>
			
						<nav id="nav" class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom">
								  <h3 id="logo" class="navbar-brand ml-4 pr-5" href="index.php">SEXTOUU</h3>
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
										
										<!--adms-->
										<?php if(isset($_SESSION['acesso']) && $_SESSION['acesso'] == '@admin' )echo "<div class='dropdown-divider'></div><a class='dropdown-item bg-danger text-white' href='adm.php'>Administrador</a>"; ?>
									  </div>
									  </li>
									</ul>
									<form method="POST" action="eventos.php" class="form-inline my-2 my-lg-0">
									  <input class="form-control mr-sm-2 " type="search" id="tags" name="pesquisa" placeholder="Ex: rap" aria-label="Search" required>
									  <button class="btn button1" id="tag" id="botao" type="submit">Pesquisar</button>	
									</form>
								  </div>
						</nav>
		<div class="my-5"></div>
		<div id="site1" class="row justify-content-center">
			<div class="bg-light border pt-2 mt-5 col-md-8 text-center">
					<br>
					<div class="pt-5 text-right pr-2"><?php echo "Categoria: ".$evento['categoria_evento'];?></div>
					<div class="pt-1 text-right pr-2"><?php echo "Views: ".$evento['visu_eventos'];?></div>
					<h1 class="text-center pt-5 pb-2 font-weight-light"><?php echo $evento['nome_evento'];?></h1>
					<p class="text-center"><?php echo "Enviado: ";$dia = htmlspecialchars($evento['data_envio']);
							echo date('d-m-Y', strtotime($dia)).' as '.date('H:i a', strtotime($dia));?></p>
				<div class="font-weight-normal p-1">
					<p class=" mt-2">Entrada<img src="https://img.icons8.com/color/50/000000/ticket-purchase.png"></span>: Homens:R$<?php echo htmlspecialchars($evento['ingressoh'])."         // Mulheres: R$".htmlspecialchars($evento['ingressom']);?></p>
					<p><label for="cidade">Observações</label>
					<textarea rows="6" readonly class="form-control"><?php echo htmlspecialchars($evento['obs_evento']);?></textarea></p>
					<p><label for="cidade">Telefone/Whatsapp</label>
						<p class="form-control"><?php echo htmlspecialchars($evento['telefone_evento']);?></p></p>
					<p class="form-control"><a target="_blank" href="https://api.whatsapp.com/send?phone=<?php $cel= htmlspecialchars($evento['ddi_evento']).htmlspecialchars($evento['celular_evento']);                                $cel = trim($cel);
														//retirando caracteres especiais do numero de cel para preparar o link de redirecionamento por whatsapp
														$cel = str_replace('-', '', $cel);
														$cel = str_replace('(', '', $cel);
														$cel = str_replace(')', '', $cel);
														$cel = str_replace(' ', '', $cel);
														echo $cel;
								?>&text=Ola%20acabei%20de%20vir%20do%20sextou">Whatsapp</a></p>
															<p class="form-control"><a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo $cel;?>&text=Ola%20acabei%20de%20vir%20do%20sextou">Web Whatsapp</a></p>
						
				</div>
					<div class="row">
							<div class="col-md-4 mb-3">
							  <label for="validationServer05">Local</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['cidade_evento']).'/'.htmlspecialchars($evento['uf_evento']);?></p>
							</div>
							<div class="col-md-4 mb-3">
							  <label for="cidade">Dia</label>
								<p class="form-control"><?php $diaa = htmlspecialchars($evento['dia_evento']);
								echo date('d-m-Y', strtotime($diaa))
								?></p>
							</div>						
							<div class="col-md-4 mb-3">
							  <label for="cidade">Inicio/término</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['inicio_evento']).'/'.htmlspecialchars($evento['termino_evento']);?></p>
							</div>						
							<div class="col-md-4 mb-3">
							  <label for="cidade">Bairro</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['bairro_evento']);?></p>
							</div>						
							<div class="col-md-4 mb-3">
							  <label for="cidade">Rua</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['rua_evento']);?></p>
							</div>
							<div class="col-md-4 mb-3">
							  <label for="cidade">N°</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['numero_evento']);?></p>
							</div>
					</div>
					<div class="row">
							<div class="col-md-4 mb-3">
							  <label for="cidade">Info. adicionais</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['chek_evento']);?></textarea>
							</div>										
							<div class="col-md-4 mb-3">
							  <label for="cidade">Estilos</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['musicas']);?></p>
							</div>
							<div class="col-md-4 mb-3">
							  <label for="cidade">Email</label>
								<p class="form-control"><?php echo htmlspecialchars($evento['email_evento']);?></p>
							</div>						
					</div>
		</div>
		<div class="my-5"></div>
		<div class="comment text-center p-5">
			<h1 class="font-weight-light">Comentarios</h1>
				<div class="fb-comments" data-href="http://localhost/sla1/detalhes.php" data-width="" data-numposts="5"></div>
		</div>
		<footer class="space bg-light pt-2 text-center w-100">
			<h1 class="font-weight-light mt-5 pt-5">Contato</h1>
			<p>sextoueventos.contato@gmail.com</p>
		</footer>
		<div class="footer navbar-fixed-bottom border-top pb-2 pt-1"><h6 class="pt-2 text-center">©sextoueve - todos os direitos reservados</h6></div>		
		
		
						<?php
						//receber o hash randomico da sessao via get
						$sec = htmlspecialchars(addslashes($_GET['sec']));
						//verificar se o hash da sessao é o mesmo do get
							if($_SESSION['cod'] == $sec){
									$i = htmlspecialchars(addslashes($evento['visu_eventos']))+1;
									//alterar quantidade de visualizacoes do evento no bd
									$sqli= $conn->query("UPDATE `tb_eventos` SET `visu_eventos` = '$i' WHERE `tb_eventos`.`id_evento` = '$id'");
									//alterar o hash da session para nao permitir mais de uma visu por refresh
									$_SESSION['cod'] = hash('sha512', rand(100, 1000));					
							}
					?>
		</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>

