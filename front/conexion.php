<?php 
$con = $mysql= new mysqli("localhost", "root","","reinscripciones");
if ($mysql->connect_error) {
	die("problemas con la conexion a la base de datos");
}
mysqli_set_charset($con, 'utf8');
 ?>