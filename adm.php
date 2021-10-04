<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Root</title>
		<!--bootstrap-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<!-- css externo -->
		<link rel="stylesheet" type="text/css" href="css/folha2.css">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/adm.css">
		
		<?php session_start(); if($_SESSION['acesso'] != '@admin'){die('Acesso negado');}?>
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-usuario').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "proc_pesq_user.php",
					"type": "POST"
				}
			});
		} );
		</script>
	</head>
	<body>
		<div class="row m-0 h-100 w-100">
		
			<div class="col-md-3 p-5 m-2 ml-4 w-100 bg-danger m-0">
				<h4 class="text-light pb-5">Root</h4>
				<nav>
					<ul class="nav flex-column ">
					  <li class="nav-item border btn-light m-1">
						<a class="nav-link active" href="index.php">Index</a>
					  </li>
					  <li class="nav-item border btn-light m-1">
						<a class="nav-link" href="eventos.php">Eventos</a>
					  </li>
					  <li class="nav-item border btn-light m-1">
						<a class="nav-link" href="minha_conta.php">Minha Conta</a>
					  </li>
					</ul>
				</nav>
			</div>		
		
				<div class="col-md-8 container">
					<h1 class="p-3">Painel moderador</h1>
					<table id="listar-usuario" class="bg-white border p-3">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th>Acesso</th>
								<th>Controle</th>
							</tr>
						</thead>
					</table>
				</div>
				
	
			
		</div>
	</body>
</html>
