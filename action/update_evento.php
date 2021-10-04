<?php
if(isset($_POST['save'])){
		session_start();
		include('conn/conexao.php');
		
		$nome = htmlspecialchars(addslashes(($_POST['nome_evento'])));
		$ddi = htmlspecialchars(addslashes(($_POST['countryCode'])));
		$cel = htmlspecialchars(addslashes(($_POST['celular_evento'])));
		$tel = htmlspecialchars(addslashes(($_POST['telefone_evento'])));
		$diass = htmlspecialchars(addslashes(($_POST['dia_evento'])));
		//string para date e formato y-m-d
		$dias = strtotime($diass);
		$data = date('d-m-Y',$dias);
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
		$msc1 = htmlspecialchars(addslashes((($_POST['msc1']))));
		$msc2 = htmlspecialchars(addslashes((($_POST['msc2']))));
		$msc3 = htmlspecialchars(addslashes((($_POST['msc3']))));
		$out = htmlspecialchars(addslashes((($_POST['outro']))));
		$musicas = $msc1.' '.$msc2.' '.$msc3.' '.$out;
		

		function validarData ($data, $formato = 'd-m-Y H:i:s'){
			$d = DateTime::createFromFormat($formato, $data);
										
			return $d && $d->format($formato) == $data;
		}		
		if(validarData($data, 'd-m-Y')){
				$data = date('Y-m-d',$dias);
				$id = htmlspecialchars(addslashes($_POST['id']));
				$sql = $conn->query ("UPDATE `tb_eventos` SET `nome_evento` = '$nome',`data_envio` ='$datav', `ddi_evento` = '$ddi', `celular_evento` = '$cel', `telefone_evento` = '$tel', `dia_evento` = '$data', `inicio_evento` = '$inicio', `termino_evento` = '$termino', `ingressoh` = '$ingressoh', `ingressom` = '$ingressom', `obs_evento` = '$obs', `email_evento` = '$email', `chek_evento` = '$check', `cep_evento` = '$cep', `uf_evento` = '$uf', `bairro_evento` = '$bairro', `rua_evento` = '$rua', `cidade_evento` = '$cidade', `numero_evento` = '$numero', `complemento_evento` = '$complemento',
			 `musicas` = '$musicas' WHERE `tb_eventos`.`id_evento` = '$id'");

			 
				if(!$sql){	
				echo '<script>alert("ERRO")</script>';
				$conn->close();
				die();
				}
				else{
					$cod = $_SESSION['cod'];
					header('location:../detalhes.php?id='.$id.'&&sec='.$cod);
				}
				
				$conn->close();
		}
		else{
			header("location:../novo_evento.php?erro=Data invalida&&id='$id'&&editor=true");
		}	
}
else if(!isset($_POST['save']) && !isset($sql)){
	header('location:../novo_evento.php');
}


?>