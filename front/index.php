<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>

	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<center>	
        <h1>Bienvenido</h1>
        
    <form id="formulario" method="get" action="">
       	<input type="text" name="usuario" placeholder="Usuario" class=""><br><br>
        <input type="text" name="contra" placeholder="Contraseña" class=""><br><br>
		<button type="sumit" name="button">Entrar</button>
	</form>            
<?php 
$usuario=$_GET['usuario'];
$contra=$_GET['contra'];
$verificar=false;
if ($usuario!=""&&$contra!="") {
	$url="http://127.0.0.1:8181/reinscripciones/sesion2?usuario=".$usuario."&contra=".$contra;
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
            $idUsuario=$datos['idUsuario'];
            $usuario=$datos['usuario'];
            $contra=$datos['contra'];

    if ($usuario==$datos['usuario'] &&$contra==$datos['contra']) {
    	$verificar=true;
    }

            echo "<label>".$usuario."</label><br>";
}
?>
</table>
    </center>
</html>