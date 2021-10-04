
 <?php
	include("conn/conexao.php");
	session_start();
	
	if(isset($_SESSION['usuario']) && is_numeric($_GET['id']) ){
		
		$id = htmlspecialchars(addslashes($_GET['id']));
	
		$sql = $conn->query("DELETE FROM `tb_eventos` WHERE `tb_eventos`.`id_evento` = $id");
		header('location:../meus_eventos.php');
	    if(!$sql){echo 'erro';}
	
}
else{
    header('location:../meus_eventos.php');
}
	$conn->close();
 ?>
