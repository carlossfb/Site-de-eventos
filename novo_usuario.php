<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--Icones de redirecionamento-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!--CSS externo-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <title>Cadastre-se</title>
	<?php session_start();
		$adm="";
		
		if(isset($_SESSION['acesso']) && $_SESSION['acesso'] == '@admin'){
			$adm = " <div class='col-md-4'>
			
			<div class='input-group mb-3'>
			  <select class='custom-select border-primary' id='@admin' name='@adms'>
				<option selected value='usuario comum'>Escolha o nivel</option>
				<option value='usuario'>Usuario comum</option>
				<option value='@admin'>Administrador</option>
			  </select>
			  <div class='input-group-append'>
				<label class='input-group-text' for='@admin'>Acesso</label>
			  </div>
			</div>			
			
			
			</div>";
		}
	?>
  </head>
  <body id="site2">
	<div class="bg-light rounded p-5 m-4 text-center">
					<form method="POST" action="action/insert_usuario.php" name="formuser" data-toggle="validator">
						<a class="link" href="index.php"><h1 class="font-weight-light col-md-4 pb-5">Sextou - Cadastro</h1></a>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="nome_usu">Primeiro nome</label><!--data error para dizer qual a mensagem que deve ser escrita na div com class "help block with-errors..."-->
							  <input type="text" class="form-control"  data-error="Digite um nome real" id="nome_usu" placeholder="Primeiro nome" data-minlength="3" name="primeiro_nome_usuario" required>
							  <small class="form-text help-block with-errors text-danger"></small>
							</div>
							<div class="form-group col-md-6">
							  <label for="nomeb_usu">Ultimo nome</label>
							  <input type="text" class="form-control"  data-error="Digite um nome real" id="nomeb_usu" placeholder="Ultimo nome" data-minlength="3" name="ultimo_nome_usuario" required>
							  <small class="form-text help-block with-errors text-danger"></small>
							</div>
							<div class="form-group col-md-12">
							  <label for="inputEmail4">Email</label>
							  <input type="email" class="form-control" onblur='valida_email()'  data-error="Digite um email válido" id="inputEmail4" placeholder="Email" name="email_usuario" required>
							  <small class="form-text help-block with-errors text-danger" id="emailtxt"></small>
							</div>
						<script type="text/javascript">
						function valida_email(){
							var email = document.getElementById('inputEmail4').value;
							if(email != ""){
							var dado = {
								email:email
							};
							
							$.post('action/verifica_email.php', dado, function(result){
								document.getElementById('emailtxt').innerHTML = result;
							});
							}
						}
						</script>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputPassword4">Senha</label>
							  <input type="password" class="form-control"  id="inputPassword4" data-error="A senha deve ter no mínimo 5 digitos" placeholder="Senha" data-minlength="5" name="senha_usuario" required>
							  <small class="form-text help-block with-errors text-danger"></small>
							</div>					
							<div class="form-group col-md-6">
							  <label for="inputPassword4">Confirmar senha</label>											<!--verificar se os campos tem as mesmas senhas com o data match tambem do arquivo validator.js do bootstrap -->
							  <input type="password" class="form-control" id="inputPassword5" placeholder="Confirmar senha" data-match="#inputPassword4" data-match-error="As senhas não batem." name="confirma_senha_usuario" required>
							  <small class="form-text help-block with-errors text-danger"></small>
							</div>
							<?php
									//criar adms
									echo $adm;
							?>
						</div>
						<div class="form-group">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" id="gridCheck" data-error="Você deve marcar este campo!" required>
							  <label for="gridCheck">Concordo com os termos</label>
							  <small class="form-text help-block with-errors text-danger"></small>
							</div>
						</div>
					  <button type="submit" class="btn btn-primary new-btn">Enviar</button>
					</form>
	</div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>	
	<script src="js/validator.min.js"></script>
  </body>
</html>