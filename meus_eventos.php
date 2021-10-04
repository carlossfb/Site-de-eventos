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
	    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
		<?php
		session_start();
		include_once("js/musica.js");
		include('action/conn/conexao.php');
		
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
		
		if(isset($_SESSION['usuario'])){
			
			if(isset($_POST['avanc'])){
								$id_post = $_SESSION['id_postador'];
								$categoria = htmlspecialchars(addslashes($_POST['categoria_avanc']));
								if($_POST['nome_avanc'] != ""){
									$nome = " and `nome_evento` like"." '%".htmlspecialchars(addslashes($_POST['nome_avanc']))."%'";
								}
								else{
									$nome='';
								}
								if($_POST['data_avanc'] != ""){
									$dia = " and `dia_evento` >= date('".htmlspecialchars(addslashes($_POST['data_avanc']))."')";
								}else{
									$dia='';
								}
								//select
								$sqli = $conn->query("SELECT * FROM `tb_eventos` WHERE `categoria_evento` like '%$categoria%' $dia $nome AND id_postador ='$id_post'");
								
								//Contar o total de eventos
								$total_eventoss = $sqli->num_rows;

								//Seta a quantidade de eventos por pagina
								$quantidade_pg = 6;
							
								//calcular o número de pagina necessárias para apresentar os eventos
								$num_pagina = ceil($total_eventoss/$quantidade_pg);
							
								//Calcular o inicio da visualizacao
								$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
								
								//select dos eventos mostrados com limit
								$sql = $conn->query("SELECT * FROM `tb_eventos` WHERE `categoria_evento` like '%$categoria%' $dia $nome AND id_postador ='$id_post' LIMIT $incio, $quantidade_pg");
								
								$i = $total_eventoss;
			}
			else{
				if(!isset($_POST['pesquisa']) && !isset($_GET['categoria']))
				{	
						$id_post = $_SESSION['id_postador'];
						$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento  FROM tb_eventos WHERE id_postador = $id_post");

						//Contar o total de eventos
						$total_eventoss = $sqli->num_rows;

						//Seta a quantidade de eventos por pagina
						$quantidade_pg = 6;
					
						//calcular o número de pagina necessárias para apresentar os eventos
						$num_pagina = ceil($total_eventoss/$quantidade_pg);
					
						//Calcular o inicio da visualizacao
						$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
						
						$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento  FROM tb_eventos WHERE id_postador = $id_post LIMIT $incio, $quantidade_pg");
						$i = $total_eventoss;
						
					
				}
				else if(isset($_POST['pesquisa']) && !isset($_GET['categoria']))
				{		
						$pesquisa = htmlspecialchars(addslashes($_POST['pesquisa']));
						$id_post = $_SESSION['id_postador'];
						$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento  FROM `tb_eventos` WHERE id_postador = '$id_post' AND musicas LIKE '%$pesquisa%'");

						//Contar o total de eventos
						$total_eventoss = $sqli->num_rows;
						//Seta a quantidade de eventos por pagina
						$quantidade_pg = 6;
					
						//calcular o número de pagina necessárias para apresentar os eventos
						$num_pagina = ceil($total_eventoss/$quantidade_pg);
					
						//Calcular o inicio da visualizacao
						$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
						
						$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento  FROM `tb_eventos` WHERE id_postador = '$id_post' AND musicas LIKE '%$pesquisa%' LIMIT $incio, $quantidade_pg");
						$i = $total_eventoss;
						
					
				}
				else if(isset($_GET['categoria'])){
					$categoria = htmlspecialchars(addslashes($_GET['categoria']));
					$id_post = $_SESSION['id_postador'];
					$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento  FROM tb_eventos WHERE categoria_evento LIKE '%$categoria%' AND id_postador ='$id_post'");

					//Contar o total de eventos
					$total_eventoss = $sqli->num_rows;

					//Seta a quantidade de eventos por pagina
					$quantidade_pg = 6;
				
					//calcular o número de pagina necessárias para apresentar os eventos
					$num_pagina = ceil($total_eventoss/$quantidade_pg);
				
					//Calcular o inicio da visualizacao
					$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
					
					$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE categoria_evento LIKE '%$categoria%' AND id_postador = '$id_post' LIMIT $incio, $quantidade_pg");
					$i = $total_eventoss;
					
				}
			}
			$conn->close();	
		}
		else{
			header("location:login.php");
		}
		
		?>
	    <link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<title>Meus eventos</title>
		
	</head>
	<body id="site1">
		<header class="header row-container pb-1">
			<div class="container pt-3">
				<div class="jumbotron con pt-4 index1">
						<nav class="navbar navbar-expand-lg navbar-light">
								  <h3  class="navbar-brand ml-4 mr-2 pr-5" href="index.php">SEXTOUU</h3>
								  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								  </button>
								  <div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav mr-auto ml-5">
									  <li class="nav-item link">
										<a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
									  </li>

									  <li class="nav-item dropdown link active" id="actived">
										<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 Meus eventos
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown1">
										   <a class="dropdown-item" href="meus_eventos.php?categoria=musical">Festivo/Musical</a>
										 <div class="dropdown-divider"></div>
										 <a class="dropdown-item" href="meus_eventos.php?categoria=cultural">Educativo/Cultural</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="meus_eventos.php">Ver todos</a>
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
										  <a class='dropdown-item' href="eventos.php">Eventos</a>
										  <div class="dropdown-divider"></div>					<!--verificar se esta logado e se estiver mostrar seu nome ou apenas o "entrar"-->
										   <a class="dropdown-item active" href="<?php if(isset($_SESSION['usuario'])){echo 'minha_conta.php';}else{echo 'login.php';} ?>"><?php if(!isset($_SESSION['usuario'])){echo 'Entrar';}else{ echo $_SESSION['usuario'];} ?></a>
										<!--ADMS-->
										<?php if(isset($_SESSION['acesso']) && $_SESSION['acesso']== '@admin' )echo "<div class='dropdown-divider'></div><a class='dropdown-item bg-danger text-white' href='adm.php'>Administrador</a>"; ?>

										</div>
									  </li>
									</ul>
									<form method="POST" action="meus_eventos.php" class="form-inline my-2 my-lg-0">
									  <input class="form-control mr-sm-2 " type="search" id="tags" name="pesquisa" placeholder="Ex: rap" aria-label="Search" required>
									  <button class="btn button1 my-2 my-sm-0" id="tag" id="botao" type="submit">Pesquisar</button>
									</form>
								  </div>
						</nav>			  
				  <hr class="my-0 pb-5">					
				<h1 class="font-weight-light pt-4">Novo evento
					<a href="tipo_evento.php" id="botao" class="btn btn-lg button1 img-fluid ml-4 pt-2 mt-3 mb-4"><h1 class="font-weight-light">+</h1></a>
				</h1>
				  <p class="lead">Pesquisa avançada no menu esquerdo</p>
				  <hr class="my-4">
				
				  <div class="collapse text-white" id="navbarToggleExternalContent">
					<div class="bg-dark border p-4">
					  <h5 class="h4">Pesquisa avançada</h5>
					  <span class="text-muted">Olá, o quê procura?</span><br>
					  <!--Pesquisa avançada-->
								<form method="POST" action="meus_eventos.php"  class="text-white form-inline my-2 my-lg-0">
									<div class="row col-md-2 col-sm-12 mr-2">
									 <span class="text-muted p-3 pl-0">Categoria</span>
									  <select class="custom-select col-sm-12" name="categoria_avanc">
										<option value="festivo">Festivo/Musical</option>
										<option value="cultural">Educativo/Cultural</option>
									  </select>
									</div>
									<div class="row col-md-3 col-sm-12 mr-2">
										<span class="p-3 pl-0 text-muted" >Nome</span><input class="form-control mr-sm-2 col-sm-12" type="search" name="nome_avanc">
									</div>
									<div class="row col-md-3 col-sm-12 mr-2">
										<span class="p-3 pl-0 text-muted">Data</span><input class="form-control mr-sm-2 col-sm-12 mb-2" type="date" name="data_avanc">
								    </div>
									<div class="row col-md-3 col-sm-12 mt-5">

										<button class="btn btn-outline-light my-2 my-sm-0 col-sm-12 pt-2" type="submit" name="avanc">Pesquisar</button>
									</div>
								</form>
					</div>
				  </div>
				
				  <nav class="navbar navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
										<p class="lead">Procurando por: <?php 
										if(isset($_POST['avanc'])){
											if($_POST['nome_avanc']!=""){
													echo ' <br>nome: '.$_POST['nome_avanc'];
												}
												 if($_POST['categoria_avanc']!="" ){
													echo ' <br>categoria: '.$_POST['categoria_avanc'];
												}
												 if($_POST['data_avanc']!=""){
														echo ' <br>data: '.date('d-m-Y', strtotime($_POST['data_avanc']));		
											}
										}
										else if(isset($_GET['categoria'])){
											echo $_GET['categoria'];
										}
										else if(isset($_POST['pesquisa'])){
											echo $_POST['pesquisa'];
										}
										else{
											echo " Todos os eventos";
										}
					?></p>
				  </nav>
				</div>
			</div>
		</header>
		<div id="avanc"></div><div id="avanc"></div>
		
		
			<article id="over" class='col-sm-12 index-'>

						<div class="mx-2 row justify-content-center">

								<?php while($eventos = mysqli_fetch_assoc($sql)){ ?>
								
									<!--Cards com informações do evento-->
									<div class="card mt-1 mr-2 ml-2 mb-3 width1">
												  <img src="https://images.wallpaperscraft.com/image/wolf_silhouette_hills_130119_960x544.jpg" class="card-img-top" alt="...">
													<div class="card-body">
														  <h5 class="card-title text-center">
																<!--Mostra o nome do evento tirado do banco de dados-->
																<?php echo htmlspecialchars($eventos['nome_evento']); ?>
														  </h5>
														<ul class="list-group list-group-flush">
															<li class="list-group-item"><b>Categoria:</b> <?php echo htmlspecialchars($eventos['categoria_evento']);?></li>
															<li class="list-group-item"><b>Local:</b> <?php echo htmlspecialchars($eventos['cidade_evento']).'/'.htmlspecialchars($eventos['uf_evento']); ?></li>
															<li class="list-group-item"><b>Data evento:</b> <?php $diad = htmlspecialchars($eventos['dia_evento']);
															echo date('d-m-Y', strtotime($diad));
															?></li>
															<li class="list-group-item"><b>Celular:</b> <?php echo $cel = htmlspecialchars($eventos['celular_evento']);
															?></li>
															<li class="list-group-item"><b>Telefone:</b> <?php echo htmlspecialchars($eventos['telefone_evento']);?></li>
															<li class='list-group-item'><?php if($eventos['musicas'] != null){echo "<b>Estilos: </b>".htmlspecialchars($eventos['musicas']);}else{echo "<b>Adicionais: </b>".htmlspecialchars($eventos['chek_evento']);}?></li>
														</ul>
														<div class="text-center">
														
														  <a class="btn btn-primary pt-2 mt-2"
											href="<?php if($eventos['categoria_evento'] == "musical, festivo"){ echo "novo_evento.php?editor=true&&id=".$eventos['id_evento'];}else{ echo "novo_evento2.php?editor=true&&id=".$eventos['id_evento'];}?>">
															Atualizar evento
														  </a>
														  
														  <a class="btn btn-secondary pt-2 mt-2" href="detalhes.php?id=<?php echo htmlspecialchars($eventos['id_evento']).'&sec='.$_SESSION['cod']; ?>" name="det">
															Visualizar
														  </a>

														  
														  <a class="btn btn-danger pt-2 mt-2" data-toggle="modal" data-target="#exampleModal<?php echo $eventos['id_evento']; ?>" href="#">
															Deletar evento
														  </a>

														
													</div>
												</div>
											
												
												
												
										<!-- Modal -->
										<div class="modal fade" id="exampleModal<?php echo $eventos['id_evento']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Deletar?</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
											  </div>
											  <div class="modal-body">
												<div class="row justify-content-center">
													<div class='col-6 text-center'>
														<a value="Cancelar" id="cancela" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-white">Cancelar</a>
													</div>
													<div class='col-6 text-center'>
														<a class="btn btn-danger text-white" href="action/delete.php?id=<?php echo htmlspecialchars($eventos['id_evento']);?>">Deletar evento</a>
													</div>									
												</div>
											  </div>
											</div>
										   </div>
										</div>
									</div>
								<?php }?>

									
								
								
			</article>
		</div>
		<footer class="bg-white pt-2 pb-4 pb-5">
			
				<?php
					//Verificar a pagina anterior e posterior
					$pagina_anterior = $pagina - 1;
					$pagina_posterior = $pagina + 1;
										
					if(isset($_POST['pesquisa']))
					{
						echo "<div class='container'><p class='text-center>A pesquisa retornou $i eventos</p></div>";
					}
					else{
						echo "<div class='container'><p class='text-center'>A pesquisa retornou $i eventos</p></div>";

					}
					
				?>
				
					<nav class="text-center">
						<ul class="pagination justify-content-center">
							<li class="page-item">
							
								<?php if($pagina_anterior != 0){ ?>
								
								<a class="page-link" href="meus_eventos.php?pagina=<?php echo $pagina_anterior; if(isset($pesquisa)){ echo "&pesquisa=".$pesquisa;}?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									
								<?php }else{ ?>
								
									<a class="page-link">
										<span aria-hidden="true">&laquo;</span>
									</a>
									
								<?php  }     ?>
								
							</li>
							<?php 
							//Apresentar a paginacao
							for($i = 1; $i < $num_pagina + 1; $i++){
							$estilo='class="page-item"';
							$style= " ";
							
								if(isset($_GET['pagina'])){
									if($i > $_GET['pagina']+5 && $i < $num_pagina + 1){
										$style="style = 'display:none;'";
									}
									if($i < $_GET['pagina']-5){
										$style="style = 'display:none;'";
									}
								}
								elseif(!isset($_GET['pagina']) && $i>10){
									$style="style = 'display:none;'";
								}
								
							if($pagina == $i)
							{
								$estilo = "class='page-item active'";
							}
							?>
								<li <?php echo $estilo?>><a <?php echo $style; ?> class="page-link" href="meus_eventos.php?pagina=<?php echo $i; if(isset($pesquisa)){ echo "&pesquisa=".$pesquisa;}?>"><?php echo $i; ?></a></li>
								
							<?php } ?>
							
							<li class="page-item">
							
								<?php if($pagina_posterior <= $num_pagina){ ?>
								
									<a class="page-link" name="link" href="meus_eventos.php?pagina=<?php echo $pagina_posterior; if(isset($pesquisa)){ echo "&pesquisa=".$pesquisa;}?>" aria-label="Previous">
										<span aria-hidden="true">&raquo;</span>
									</a>
									
								<?php }else{ ?>
								
									<a class="page-link">
									<span aria-hidden="true">&raquo;</span>
									</a>
							<?php } ?> 
							</li>
						</ul>
					</nav>
					
					<div class="row container text-center justify-content-center col-12 m-0 pt-5">
						<div class="col-md-5 col-sm-10 mx-5 mx-md-0 pb-2">
							<div class="pr-3">
								<!--<a class="ml-2" href="index.php"><img src="imagens/teste1.png" class="w-75"></a>-->
								<h1 class="font-weight-light mb-3">Contato</h1>
								<h6>sextoueventos.contato@gmail.com</h6>
							</div>
						</div>
					</div>
		</footer>
		<div class="footer navbar-fixed-bottom border p-2"><h6 class="pt-2 text-center">©sextoueve-todos os direitos reservados</h6></div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>
	<script type="text/javascript">
	musica();
</script>

