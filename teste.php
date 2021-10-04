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
		//include do arquivo de consulta que puxa os dados do bd
		include_once("action/consulta.php"); 
		
		?>
	    <link rel="stylesheet" type="text/css" href="css/folha2.css">
		<link rel="stylesheet" type="text/css" href="css/folha3.css">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
	</head>
	<body id="site">
		
		<div class="mt-5 mb-5 pb-5 pt-5">
				<div>
				  <div class="collapse" id="navbarToggleExternalContent">
					<div class="con p-4">
					  <h5 class="text-white h4">Pesquisa avançada</h5>
					  <span class="text-muted">Olá, o quê procura?</span><br>
					  <!--Pesquisa avançada-->
								<form method="POST" action="eventos.php" name="avanc" class="form-inline my-2 my-lg-0">
									<div class="row col-md-2 col-sm-12 mr-2">
									 <span class="text-muted p-3 pl-0">Categoria</span>
									  <select class="custom-select col-sm-12">
										<option value="musical">Festivo/Musical</option>
										<option value="educativo">Educativo/Cultural</option>
									  </select>
									</div>
									<div class="row col-md-3 col-sm-12 mr-2">
										<span class="p-3 pl-0 text-muted">Nome</span><input class="form-control mr-sm-2 col-sm-12" type="search">
									</div>
									<div class="row col-md-3 col-sm-12 mr-2">
										<span class="p-3 pl-0 text-muted">Data</span><input class="form-control mr-sm-2 col-sm-12 mb-2" type="date">
								    </div>
									<div class="row col-md-3 col-sm-12 mt-5">

										<button class="btn btn-outline-light my-2 my-sm-0 col-sm-12 pt-2" type="submit">Pesquisar</button>
									</div>
								</form>
					</div>
				  </div>
				</div>
		</div>
		<div>
			<article class="col-sm-12">

						<div class="row justify-content-center">
								<?php while($eventos = mysqli_fetch_assoc($sql)){ ?>

									<!--Cards com informações do evento-->
									<div class="card mt-1 mr-2 ml-2 mb-3 card">
									  <img src="imagens/cc.jpg" class="card-img-top" alt="...">
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
											  <a class="btn btn-secondary pt-2 mt-2" href="detalhes.php?id=<?php echo htmlspecialchars($eventos['id_evento']).'&sec='.$_SESSION['cod']; ?>" name="det">
												Detalhes
											  </a>
											</div>
										</div>
									</div>
								
									
								<?php }?>
							
						</div>	
			</article>
		</div>							<!--recebendo estilo-->
		<footer class="pt-2 pb-4 pb-5 navbar-fixed-bottom">
			
				<?php

					//Verificar a pagina anterior e posterior
					$pagina_anterior = $pagina - 1;
					$pagina_posterior = $pagina + 1;
					//informar eventos retornados
					
						echo "<div class='container'><p class='text-center text-white'>A pesquisa retornou $i eventos</p></div>";

				?>
				
					<nav class="text-center">
						<ul class="pagination justify-content-center">
							<li class="page-item">
							<!--construindo paginacao a partir da verificacao da pagina atual-->
								<?php if($pagina_anterior != 0){ ?>
								
								<a class="page-link" href="eventos.php?pagina=<?php echo $pagina_anterior; if(isset($pesquisa)){ echo "&pesquisa=".$pesquisa;}?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									
								<?php }else{ ?>
								
									<a class="page-link">
										<span aria-hidden="true">&laquo;</span>
									</a>
									
								<?php  }     ?>
								
							</li>
							<?php 
							//Apresentar a paginacao interna 1..2...3...4..5
							for($i = 1; $i < $num_pagina + 1; $i++){
							$estilo='class="page-item"';
							$style= " ";
							
							//impedir que fique uma paginacao gigante sem necessidade
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
							//Verificar a pagina atual e setar o estilo active no numero da paginacao que corresponde
							if($pagina == $i)
							{
								$estilo = "class='page-item active'";
							}
							?>
							<!--setando styles-->
								<li <?php echo $estilo?>><a <?php echo $style; ?> class="page-link" href="eventos.php?pagina=<?php echo $i; if(isset($pesquisa)){ echo "&pesquisa=".$pesquisa;}?>"><?php echo $i; ?></a></li>
								
							<?php } ?>
							
							<li class="page-item">
							
								<?php if($pagina_posterior <= $num_pagina){ ?>
								
									<a class="page-link" name="link" href="eventos.php?pagina=<?php echo $pagina_posterior; if(isset($pesquisa)){ echo "&pesquisa=".$pesquisa;}?>" aria-label="Previous">
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
					
					<div class="row container col-12 m-0 pt-5">
						<div class="col-md-3 mr-5 con pb-2">
							<div class="p-3">
								<h1 class="text-white mb-3">Contato</h1>
								<h5 class="text-white">sextoueventos@gmail.com</h5>
								<h5 class="text-white">facebook.conta</h5>
							</div>
						</div>
						<div class="col-md-7 pr-3 pl-3 p-2">
							<form method="POST" action="contato.php">
							  <div class="form-group row">
								<label for="exampleFormControlInput1" class="text-logo col-md-3" maxlength="100">Email</label>
								<input type="email" class="form-control col-md-8" id="exampleFormControlInput1" placeholder="name@example.com" required>
							  </div>
							  <div class="form-group row">
								<label for="exampleFormControlSelect1" class="text-logo col-md-3">Assunto</label>
								<select class="form-control col-md-8" id="exampleFormControlSelect1" required>
								  <option>Sugestões</option>
								  <option>Bugs</option>
								  <option>Duvidas</option>
								  <option>Parcerias</option>
								</select>
							  </div>
							  <div class="form-group row d-flex">
								<label for="exampleFormControlTextarea1" class="text-logo col-md-3">Descrição</label>
								<textarea class="form-control col-md-8" id="exampleFormControlTextarea1" maxlength="255" rows="3"required></textarea>
							  </div>
							   <div class="row">
								<div class="col-md-7 ml-5 mr-3"> </div>
								<input class="mt-1 btn btn-outline-light ml-1 col-md-3" type='submit' value="Enviar">
							   </div>
							</form>
						</div>
					</div>
		</footer>
		<div class="footer navbar-fixed-bottom"><h6 class="pt-2 text-white text-center">©sextoueve</h6></div>
	
		
			<!--Loading
			<div class=" bg-dark text-center" id="loading">
					<img src="imagens/841.gif" id="load" alt="Updating ..."/>
			</div>-->
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>
<script type="text/javascript">
	//relogio javascript
		function myFunction() {
		  var d = new Date();
		  var a= d.getDate();
		  var n = d.getHours();
		  var mes=d.getMonth();
		  var ano=d.getFullYear();
		  var dia=d.getDay();
		  var semana =["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"];
		  var meses =["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
		  
		  document.getElementById("relogio").innerHTML = semana[dia]+"<br> "+a+" de "+meses[mes]+" de "+ano;
		}
	myFunction();
</script>
