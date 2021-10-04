<?php
include_once('conn/conexao.php');

if(isset($_POST)){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$sql = $conn->query("SELECT email_usuario FROM tb_usuarios WHERE email_usuario = '$email'");

	if($sql->num_rows>0){
		echo "Email já está sendo usado";
	}
	else if($sql->num_rows==0){
		echo "<div class='text-success'>Email livre</div>";
}
	else{
		echo "Erro";
	}
}

?>