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
		
		//data de envio
		$datav = date('Y-m-d H:i a', strtotime($_POST['datav']));
		
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
	else{
			$categoria = 'cultural, educativo';
			$id = htmlspecialchars(addslashes($_POST['id']));
			
			//inserindo dados
			$sql =$conn->query(
			"UPDATE `tb_eventos` SET `nome_evento` = '$nome', `ddi_evento` = '$ddi', `data_envio` ='$datav', `celular_evento` = '$cel', `telefone_evento` = '$tel', `dia_evento` = '$dia', `inicio_evento` = '$inicio', `termino_evento` = '$termino', `ingressoh` = '$ingressoh', `ingressom` = '$ingressom', `obs_evento` = '$obs', `email_evento` = '$email', `chek_evento` = '$check', `cep_evento` = '$cep', `uf_evento` = '$uf', `bairro_evento` = '$bairro', `rua_evento` = '$rua', `cidade_evento` = '$cidade', `numero_evento` = '$numero', `complemento_evento` = '$complemento' WHERE `tb_eventos`.`id_evento` = '$id'");

			if(!$sql){	
			echo "ERRO";
			$conn->close();
			//matar script
			die();
			}
			else{
				//enviar codigo da sessao junto do id para detalhes evento
				$cod = $_SESSION['cod'];
				//fechar conexao
				$conn->close();
				header("location:../detalhes.php?id=$id&&sec=$cod");
			}
	}
	


}
else{
	//redirecionar usuarios que entrarem sem o post save ou sem estarem logados para verificação 
	//das visualizações do evento
	header('location:../novo_evento.php');
}





?>
