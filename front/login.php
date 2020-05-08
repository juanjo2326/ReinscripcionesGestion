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
$long=0;
if ($usuario!=""&&$contra!="") {
	$url="http://127.0.0.1:8181/reinscripciones/sesion2";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
          for ($i=0; $i < $long; $i++) { 
            $idUsuario=$datos[$i]['idUsuario'];
            $usuario=$datos[$i]['usuario'];
            $contra=$datos[$i]['contra'];

            if ($_GET['usuario']==$datos[$i]['usuario']&& $_GET['contra']==$datos[$i]['contra']) {
            	$verificar=true;
            }
            }  
    if ($verificar) {
    	echo "<label>".$usuario."</label><br>";
    	echo '<script type="text/javascript"> window.location.href="materias.php";</script>';
    }else{
    	echo "usuario no registrado";
    }
}
?>
</table>
    </center>
<section>
</section>
</html>