	<?php 
	
	include_once("conn/conexao.php");
	session_start();
	
	
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
	
	//atualizar
	$sql = $conn->query("update tb_eventos set `visivel` = 'false' where `dia_evento` < CURRENT_DATE");
	if(isset($_GET['moderar'])){
							if(isset($_POST['avanc'])){
											
								$categoria = htmlspecialchars(addslashes($_POST['categoria_avanc']));
								if($_POST['nome_avanc'] != ""){
									$nome = " and `nome_evento` like"." '%".htmlspecialchars(addslashes($_POST['nome_avanc']))."%'";
								}
								else{
									$nome='';
								}
								if($_POST['data_avanc'] != ""){
									$dia = " and `dia_evento` >= date('".htmlspecialchars(addslashes($_POST['data_avanc']))."')";
								}else{
									$dia='';
								}
							
								$id = addslashes(htmlspecialchars($_GET['moderar']));
								//select
								$sqli = $conn->query("SELECT * FROM `tb_eventos` WHERE `id_postador` ='$id' $nome $dia");
								
								//Contar o total de eventos
								$total_eventoss = $sqli->num_rows;

								//Seta a quantidade de eventos por pagina
								$quantidade_pg = 6;
							
								//calcular o número de pagina necessárias para apresentar os eventos
								$num_pagina = ceil($total_eventoss/$quantidade_pg);
							
								//Calcular o inicio da visualizacao
								$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
								
								//select dos eventos mostrados com limit
								$sql = $conn->query("SELECT * FROM `tb_eventos` WHERE `id_postador` ='$id'  $nome $dia LIMIT $incio, $quantidade_pg");
								
								$i = $total_eventoss;
								
							}
							else{
								$id = addslashes(htmlspecialchars($_GET['moderar']));
								
								//select
								$sqli = $conn->query("SELECT * FROM `tb_eventos` WHERE `id_postador` ='$id'");
								
								//Contar o total de eventos
								$total_eventoss = $sqli->num_rows;

								//Seta a quantidade de eventos por pagina
								$quantidade_pg = 6;
							
								//calcular o número de pagina necessárias para apresentar os eventos
								$num_pagina = ceil($total_eventoss/$quantidade_pg);
							
								//Calcular o inicio da visualizacao
								$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
								
								//select dos eventos mostrados com limit
								$sql = $conn->query("SELECT * FROM `tb_eventos` WHERE `id_postador` ='$id' LIMIT $incio, $quantidade_pg");
								
								$i = $total_eventoss;
							}
							
	}
	else{
		if(isset($_POST['avanc'])){
			
			
							$categoria = htmlspecialchars(addslashes($_POST['categoria_avanc']));
							if($_POST['nome_avanc'] != ""){
								$nome = " and `nome_evento` like"." '%".htmlspecialchars(addslashes($_POST['nome_avanc']))."%'";
							}
							else{
								$nome='';
							}
							if($_POST['data_avanc'] != ""){
								$dia = " and `dia_evento` >= date('".htmlspecialchars(addslashes($_POST['data_avanc']))."')";
							}else{
								$dia='';
							}
							//select
							$sqli = $conn->query("SELECT * FROM `tb_eventos` WHERE `categoria_evento` like '%$categoria%' $dia $nome and `visivel` = 'true'");
							
							//Contar o total de eventos
							$total_eventoss = $sqli->num_rows;

							//Seta a quantidade de eventos por pagina
							$quantidade_pg = 6;
						
							//calcular o número de pagina necessárias para apresentar os eventos
							$num_pagina = ceil($total_eventoss/$quantidade_pg);
						
							//Calcular o inicio da visualizacao
							$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
							
							//select dos eventos mostrados com limit
							$sql = $conn->query("SELECT * FROM `tb_eventos` WHERE `categoria_evento` like '%$categoria%' $dia $nome and `visivel` = 'true' LIMIT $incio, $quantidade_pg");
							
							$i = $total_eventoss;
		}
		else{
			if(isset($_POST['pesquisa'])&& !isset($_GET['categoria']))
			{
				
							$pesquisa = $_POST['pesquisa'];
						
							//select
							$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE musicas LIKE  '%$pesquisa%' and `visivel` = 'true'");
							
							//Contar o total de eventos
							$total_eventoss = $sqli->num_rows;

							//Seta a quantidade de eventos por pagina
							$quantidade_pg = 6;
						
							//calcular o número de pagina necessárias para apresentar os eventos
							$num_pagina = ceil($total_eventoss/$quantidade_pg);
						
							//Calcular o inicio da visualizacao
							$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
							
							$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE musicas LIKE '%$pesquisa%' and `visivel` = 'true' LIMIT $incio, $quantidade_pg");
							$i = $total_eventoss;
						
			}
			
			elseif(isset($_GET['pesquisa']) && $pesquisa = $_GET['pesquisa'])
			{
							
							$pesquisa = $_GET['pesquisa'];
						
							//select
							$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE musicas LIKE '%$pesquisa%' and `visivel` = 'true'");
							
							//Contar o total de eventos
							$total_eventoss = $sqli->num_rows;

							//Seta a quantidade de eventos por pagina
							$quantidade_pg = 6;
						
							//calcular o número de pagina necessárias para apresentar os eventos
							$num_pagina = ceil($total_eventoss/$quantidade_pg);
						
							//Calcular o inicio da visualizacao
							$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
							
							$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE musicas LIKE '%$pesquisa%' and `visivel` = 'true' LIMIT $incio, $quantidade_pg");
							$i = $total_eventoss;
						
			}
			else if(!isset($_GET['categoria']))
			{
					$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos where `visivel` = 'true'");

					//Contar o total de eventos
					$total_eventoss = $sqli->num_rows;

					//Seta a quantidade de eventos por pagina
					$quantidade_pg = 6;
				
					//calcular o número de pagina necessárias para apresentar os eventos
					$num_pagina = ceil($total_eventoss/$quantidade_pg);
				
					//Calcular o inicio da visualizacao
					$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
					
					$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos where `visivel` = 'true' LIMIT $incio, $quantidade_pg");
					$i = $total_eventoss;
				
			}
			else{
					$categoria = htmlspecialchars(addslashes($_GET['categoria']));
					$sqli = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE categoria_evento LIKE '%$categoria%' and `visivel` = 'true'");

					//Contar o total de eventos
					$total_eventoss = $sqli->num_rows;

					//Seta a quantidade de eventos por pagina
					$quantidade_pg = 6;
				
					//calcular o número de pagina necessárias para apresentar os eventos
					$num_pagina = ceil($total_eventoss/$quantidade_pg);
				
					//Calcular o inicio da visualizacao
					$incio = ($quantidade_pg*$pagina)-$quantidade_pg;
					
					$sql = $conn->query("SELECT nome_evento,categoria_evento,cidade_evento,uf_evento,dia_evento,celular_evento,telefone_evento,musicas,chek_evento,id_evento FROM tb_eventos WHERE categoria_evento LIKE '%$categoria%' and `visivel` = 'true' LIMIT $incio, $quantidade_pg");
					$i = $total_eventoss;
				
			}
		}
	}

	
	$conn->close();
?>