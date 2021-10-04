<?php
//folha de configuracao para usar o php mailer para enviar emails de recuperacao de senha
			require_once'../PHPMailer/PHPMailerAutoload.php';
			include_once('conn/conexao.php');
			$erros = 0;
			session_start();
			header('Content-type: text/html; charset=utf-8');
			if(!isset($_GET['validou'])){
				if(isset($_POST['email']) || isset($_SESSION['email'])){
					if(isset($_POST['email'])){
					$email = $conn->escape_string($_POST['email']);}
					else if(isset($_SESSION['email'])){
					$email = $conn->escape_string($_SESSION['email']);}
						
					$sqli = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email'");
					$usuarios = $sqli->fetch_assoc();

					$novasenha = substr(md5(time()), 0, 6);

					//php mailer
					
					$Mailer = new PHPMailer();
					
					//Define que será usado SMTP
					$Mailer->IsSMTP();
					
					$Mailer->SMTPDebug = 2;
					//Enviar e-mail em HTML
					$Mailer->isHTML(true);
					
					//Aceitar carasteres especiais
					$Mailer->Charset = 'UTF-8';
					
					$Mailer->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				);
					//Configurações
					$Mailer->SMTPAuth = true;
					$Mailer->SMTPSecure = 'tls';
					
					//nome do servidor
					$Mailer->Host = 'smtp.gmail.com';
					//Porta de saida de e-mail 
					$Mailer->Port = 587;
					
					//Dados do e-mail de saida - autenticação - email criado para uso do phpmailer
					$Mailer->Username = 'sextoueventos@gmail.com';
					$Mailer->Password = 'etec@1234';
					
					//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
					$Mailer->From = 'sextoueventos@gmail.com';
					
					//Nome do Remetente
					$Mailer->FromName = 'T.I Sextou - eventos';
					
					//Assunto da mensagem
					$Mailer->Subject = 'Titulo - Recuperar Senha';
					
					//Corpo da Mensagem
					$Mailer->Body = 'Ola, precebi que teve problemas com sua senha. Se nao solicitou troca de senha, ignore a mensagem. Link de recuperacao: http://localhost:8080/sextou/action/validar_esqueci.php?validou='.$email;
					
					//Corpo da mensagem em texto
					$Mailer->AltBody = '';
						
					//Destinatario 
					$Mailer->AddAddress($email);
					if($usuarios == 0)
					{
						$erro[]= "O email não existe no banco de dados";
						$erros++;
					}
					
					else if((!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))){
						$erro[] = 'Envie um email válido.';
						$erros++;
					}
					
					else if($erros == 0 && $usuarios > 0 ){
						if($Mailer->Send()){
							$erro[]= "Verifique seu email";
							$erros=0;
						}
					}
					else{
						$erro[]= "Erro ao enviar o e-mail";
						$erros++;
					}
					$conn->close();
					$http = http_build_query($erro);
					//enviar erros por url 
					header('location:../esqueci.php?email='.$email.'&erros='.$erros.'&'.$http);				
			}
			}
			else if(isset($_GET['validou'])){
				
					$email=addslashes(htmlspecialchars($_GET['validou']));
						
					$sqli = $conn->query("SELECT * FROM tb_usuarios WHERE email_usuario = '$email'");
					$usuarios = $sqli->fetch_assoc();

					$novasenha = substr(md5(time()), 0, 6);

					//php mailer
					
					$Mailer = new PHPMailer();
					
					//Define que será usado SMTP
					$Mailer->IsSMTP();
					
					$Mailer->SMTPDebug = 2;
					//Enviar e-mail em HTML
					$Mailer->isHTML(true);
					
					//Aceitar carasteres especiais
					$Mailer->Charset = 'UTF-8';
					
					$Mailer->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				);
					//Configurações
					$Mailer->SMTPAuth = true;
					$Mailer->SMTPSecure = 'tls';
					
					//nome do servidor
					$Mailer->Host = 'smtp.gmail.com';
					//Porta de saida de e-mail 
					$Mailer->Port = 587;
					
					//Dados do e-mail de saida - autenticação - email criado para uso do phpmailer
					$Mailer->Username = 'sextoueventos@gmail.com';
					$Mailer->Password = 'etec@1234';
					
					//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
					$Mailer->From = 'sextoueventos@gmail.com';
					
					//Nome do Remetente
					$Mailer->FromName = 'T.I Sextou - eventos';
					
					//Assunto da mensagem
					$Mailer->Subject = 'Titulo - Recuperar Senha';
					
					//Corpo da Mensagem
					$Mailer->Body = 'Sua nova senha para a conta no Sextou pelo email '.$email.' :   '.$novasenha;
					
					//Corpo da mensagem em texto
					$Mailer->AltBody = '';
						
					//Destinatario 
					$Mailer->AddAddress($email);
					if($usuarios == 0)
					{
						$erro[]= "O email não existe no banco de dados";
						$erros++;
					}
					
					else if((!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))){
						$erro[] = 'Envie um email válido.';
						$erros++;
					}
					
					else if($erros == 0 && $usuarios > 0 ){
						if($Mailer->Send()){
							$cript = hash('sha512', $novasenha);
							$sql_cod = $conn->query("UPDATE `tb_usuarios` SET `senha_usuario` = '$cript' WHERE `tb_usuarios`.`email_usuario` = '$email'");
							$erro[]= "Senha enviada para o email";
							$erros=0;
						}
					}
					else{
						$erro[]= "Erro ao enviar o e-mail";
						$erros++;
					}
					$conn->close();
					$http = http_build_query($erro);
					//enviar erros por url 
					header('location:../esqueci.php?email='.$email.'&erros='.$erros.'&'.$http);
		
			}
			else{
				header('location:../novo_usuario.php');
			}
			
		?>