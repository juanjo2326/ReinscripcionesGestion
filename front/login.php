<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <header>

    </header>
	<center>	
        <h1>Bienvenido</h1><br>
    <form id="formulario" method="get" action="">
        <input type="text" name="usuario" placeholder="Usuario" class="txcorto" required="true"><br><br>
        <input type="password" name="contra" placeholder="Contraseña" class="txcorto" required="true"><br><br>
        <input type="submit" name="button" value="Entrar" class="aceptar">
	</form>            
<?php
$verificar=false;
$long=0;
if (isset($_GET['usuario'])&& $_GET['usuario']!=""&&$_GET['contra']!="") {
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
    	echo '<script type="text/javascript"> window.location.href="index.php";</script>';
    }else{
        echo '<script type="text/javascript"> alert("usuario no registrado");</script>';
    }
}
?>
</center>

</body>
</html>