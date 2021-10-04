<?php
if(isset($_GET['sair']))
{
	htmlspecialchars($_GET['sair']);
	session_start();
	session_destroy();
	header('location:../login.php');
	exit();
}
else{
	header('location:minha_conta.php');
}



?>