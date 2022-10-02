<?php
//Conexão com banco de dados
$servername = "mysqlserver.cib20duaag8c.us-east-1.rds.amazonaws.com"; 
$username="admin";
$password="10062003";
$db_name="teste";

//pdo - somente orientado objeto
$connect =mysqli_connect($servername,$username,$password,$db_name);

//codifica com o caracteres ao manipular dados do banco de dados
mysqli_set_charset($connect, "utf8");
	
if(mysqli_connect_error()):
	echo "Falha na conexão: ". mysqli_connect_error();
endif;
?>