<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sextou_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'nome_usuario', 
	1 =>'email_usuario',
	2=> 'acesso',
	3=> 'id_usuario'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT nome_usuario, email_usuario, acesso,id_usuario FROM tb_usuarios";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT nome_usuario, email_usuario, acesso,id_usuario FROM tb_usuarios WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome_usuario LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR email_usuario LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR acesso LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["nome_usuario"];
	$dado[] = $row_usuarios["email_usuario"];
	$dado[] = $row_usuarios["acesso"];
	$dado[] = "<a href='eventos.php?moderar=".$row_usuarios["id_usuario"]."'>Moderar</a> / / <a href='action/moderar_user.php?excluir=".$row_usuarios["id_usuario"]."'>Excluir</a>";
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
