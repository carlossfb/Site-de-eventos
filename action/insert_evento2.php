<?php
//verificar se existe o POST do namespace "save"
if(isset($_POST['save'])){
		//iniciar sessao para uso posterior
		session_start();
		
		//incluir arquivo de conexão
		include('conn/conexao.php');
		//recebendo post em variaveis com tratamentos para XSS ou sql injection
		$nome = htmlspecialchars(addslashes(($_POST['nome_evento'])));
		$ddi = htmlspecialchars(addslashes(($_POST['countryCode'])));
		$cel = htmlspecialchars(addslashes(($_POST['celular_evento'])));
		$tel = htmlspecialchars(addslashes(($_POST['telefone_evento'])));
		$diass = htmlspecialchars(addslashes(($_POST['dia_evento'])));
		//string para date e formato y-m-d
		$dias = strtotime($diass);
		$dia = date('Y-m-d',$dias);	
		$inicio = htmlspecialchars(addslashes(($_POST['inicio_evento'])));
		$termino = htmlspecialchars(addslashes(($_POST['termino_evento'])));
		$ingressoh = htmlspecialchars(addslashes(($_POST['ingressoh'])));
		$ingressom = htmlspecialchars(addslashes(($_POST['ingressom'])));
		$obs = htmlspecialchars(addslashes(($_POST['obs'])));
		$email = htmlspecialchars(addslashes(($_POST['email'])));
		$check = htmlspecialchars(addslashes(($_POST['check'])));
		$cep = htmlspecialchars(addslashes(($_POST['cep'])));
		$uf = htmlspecialchars(addslashes(($_POST['uf'])));
		$bairro = htmlspecialchars(addslashes(($_POST['bairro'])));
		$rua = htmlspecialchars(addslashes(($_POST['rua'])));
		$cidade = htmlspecialchars(addslashes(($_POST['cidade'])));
		$numero = htmlspecialchars(addslashes(($_POST['numero'])));
		$complemento = htmlspecialchars(addslashes(($_POST['complemento'])));
		//id do session para setar o usuario que enviou o evento
		$post = htmlspecialchars(addslashes((($_SESSION['id_postador']))));
		$data = htmlspecialchars(addslashes(($_POST["datav"])));
		$data = date('Y-m-d H:i a', strtotime($data));
		//Verificar se a data é valida ou se é do ano atual
							function validarData ($dia, $formato = 'Y-m-d H:i:s'){
										$d = DateTime::createFromFormat($formato, $dia);
										
										return $d && $d->format($formato) == $dia;
									}		
										if(!validarData($dia, 'Y-m-d') || date('Y-m-d', strtotime($dia)) < date('Y-m-d')){
											header("location:../novo_evento2.php?erro=data invalida");
											die();
	}
	$categoria = 'cultural, educativo';
	//verificar qual vai ser o ultimo id do banco
	$cod = $conn->query("SELECT `id_evento` FROM tb_eventos ORDER BY `id_evento` DESC LIMIT 1");
	$evento = mysqli_fetch_assoc($cod);
	//somar o ultimo id + 1 para saber o id do evento que será cadastrado agora
	$codd = $evento['id_evento']+1;
    
	//inserindo dados
	$sql =$conn->query(
	"INSERT INTO `tb_eventos` (`ddi_evento`,`nome_evento`,`categoria_evento`, `celular_evento`, `telefone_evento`,`dia_evento`, `inicio_evento`, `termino_evento`, `ingressoh`, `ingressom`, `obs_evento`, `email_evento`, `chek_evento`, `cep_evento`, `uf_evento`, `bairro_evento`, `rua_evento`, `cidade_evento`, `numero_evento`, `complemento_evento`, `id_postador`,`data_envio`)
	VALUES ('$ddi','$nome','$categoria', '$cel', '$tel', '$dia', '$inicio','$termino', '$ingressoh', '$ingressom', '$obs', '$email', '$check', '$cep', '$uf','$bairro','$rua','$cidade','$numero','$complemento','$post','$data')");
	
	if(!$sql){	
	echo "ERRO";
	$conn->close();
	//matar script
	die();
	}
	else{
		//enviar codigo da sessao junto do id para detalhes evento
		$cod = $_SESSION['cod'];
		header("location:../detalhes.php?id=$codd&sec=$cod");
	}
	//fechar conexao
	$conn->close();

}
else{
	//redirecionar usuarios que entrarem sem o post save ou sem estarem logados para verificação 
	//das visualizações do evento
	header('location:../novo_evento.php');
}





?>
