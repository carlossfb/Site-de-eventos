<?php
//folha de configuracao para usar o php mailer para enviar emails de recuperacao de senha
			require_once'../PHPMailer/PHPMailerAutoload.php';
			session_start();
			header('Content-type: text/html; charset=utf-8');
			if(isset($_POST['email'])){
				
				$email = htmlspecialchars($_POST['email']);
				$msg = htmlspecialchars($_POST['mensagem']);
				$assunto = htmlspecialchars($_POST['assunto']);
				
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
				$Mailer->FromName = 'Contato - Sextou';
				
				//Assunto da mensagem
				$Mailer->Subject = 'Titulo - '.$assunto;
				
				//Corpo da Mensagem
				$Mailer->Body = $msg.'
				
				-> Mensagem recebida do usuario: '.$email;
				
				//Corpo da mensagem em texto
				$Mailer->AltBody = '';
					
				//Destinatario 
				$Mailer->AddAddress('sextoueventos.contato@gmail.com');


				//enviar erros por url 
				if($Mailer->send()){
					header('location:../eventos.php?msg=Email enviado com sucesso');
				}
			}
			else{
				echo "<script type='text/javascript'>alert('erro no campo email, tente novamente')</script>";
			}
			
			
		?>