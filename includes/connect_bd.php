<?php
//Conexão com banco de dados
$servername = "mysql://bd7020b47692f4:0df04a05@us-cdbr-east-06.cleardb.net/heroku_41bde1c4a089318?reconnect=true"; 
$username="CLEARDB_DATABASE_URL";
$password="BatataFrita@123";
$db_name="sistemaTarefa";

//pdo - somente orientado objeto
$connect =mysqli_connect($servername,$username,$password,$db_name);

//codifica com o caracteres ao manipular dados do banco de dados
mysqli_set_charset($connect, "utf8");
	
if(mysqli_connect_error()):
	echo "Falha na conexão: ". mysqli_connect_error();
endif;
?>