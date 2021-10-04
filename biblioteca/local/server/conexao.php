<?php

//Conectando com o Server
//mysli_connect(IpServidor,Usuario,Senha,DB)

	$servidor = "sql304.epizy.com";
	$usuario = "epiz_23446262";
	$senha = "0qUqAkKqmxA";
	$dbname = "epiz_23446262_sextou_db";
	
	//Criar a conexão
	$conn = new mysqli($servidor, $usuario, $senha, $dbname);
	$conn->set_charset("utf8");
	
		//Validando conexao
	 if(!$conn){
		 //Funcao mata o sctipt e nao segue adiante
		die("Erro");
	 }
?>