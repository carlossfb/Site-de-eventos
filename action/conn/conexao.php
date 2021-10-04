<?php

//Conectando com o Server
//mysli_connect(IpServidor,Usuario,Senha,DB)

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "sextou_db";
	
	//Criar a conexão
	$conn = new mysqli($servidor, $usuario, $senha, $dbname);
	$conn->set_charset("utf8");
	
		//Validando conexao
	 if(!$conn){
		 //Funcao mata o sctipt e nao segue adiante
		die("Erro");
	 }
?>