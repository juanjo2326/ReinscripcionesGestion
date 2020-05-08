<?php

$conn = mysqli_connect("localhost", "root", "", "reinscripciones");
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '".$nombre."' and contra = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	//header("Location: pagina.html")
	echo "Bienvenido: " .$nombre;
}
else if ($nr == 0) 
{
	header("Location: login.html");
	//echo "No ingreso"; 
}
	


?>