<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Moderar</title>
	<?php 
	session_start();
	if($_SESSION['acesso'] != '@admin'){die("Acesso negado");}
	
	?>
  </head>
  <body>
  <?php include('conn/conexao.php');
	$id = addslashes(htmlspecialchars($_GET['id']));
		if(isset($_GET['del'])){
			$sql= $conn->query("Delete from tb_eventos where id_evento = '".$id."'");
			$conn->close();
			echo "<script>alert('Evento deletado')</script>";
		}
  ?>
  		<div class="container col pt-5 mt-5">
			<div class="alert alert-warning" role="alert">
						  <p class="mb-3  row container"><a href="../eventos.php"><button class="p-2 px-4 btn btn-outline-danger d-flex ml-2 mb-1"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a></p>

			  <h4 class="alert-heading">Deletar evento</h4>
			  <p>Tem certeza que deseja deletar? </p> 
			  <a href="moderar_excluir.php?del=true&&<?php echo "id=".$id; ?>" class='btn btn-outline-danger'>Deletar</a>
			  <p></p>
			  <hr>
			</div>
		</div>
  
  
  
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>