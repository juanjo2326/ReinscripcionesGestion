<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Login Alumno</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <header>
    </header>
	<center>	
   <div id="flog">
    <br><h1>Bienvenido</h1><br>
    <form id="formulario" method="get" action="">
    <table id="tablog">
        <tr>
            <td style="text-align-last: right;"><label>Usuario </label></td>
            <td><input type="text" name="usuario" placeholder="Usuario" required="true"></td>                
        </tr>
        <tr>
            <td style="text-align-last: right;"><label>Contraseña </label></td>
            <td><input type="password" name="contra" placeholder="Contraseña" required="true"></td>
        </tr>
    </table>
    <br><br>
    <input type="submit" class="aceptar">
	</form>  
    </div>
<br>
<?php
if (isset($_GET['usuario'])) 
{
$url="http://127.0.0.1:8181/reinscripciones/sesion?usuario=".$_GET['usuario']."&contra=".$_GET['contra'];
    $json=file_get_contents($url);
    $datos=json_decode($json,true);

if ($_GET['usuario']==$datos['usuario'] &&$_GET['contra']==$datos['contra']) {
$_SESSION['noControl']=$datos['noControl'];
$_SESSION['usuario']=$datos['usuario'];
$_SESSION['contra']=$datos['contra'];
$_SESSION['nombres']=$datos['nombres'];
$_SESSION['apellidoP']=$datos['apellidoP'];
$_SESSION['apellidoM']=$datos['apellidoM'];
$_SESSION['semestre']=$datos['semestre'];
$_SESSION['carrera']=$datos['carrera'];
$_SESSION['idCarrera']=$datos['idCarrera'];

echo '<script type="text/javascript">window.location.href="index.php";</script>';
}
else{
    echo '<script type="text/javascript"> alert("usuario no registrado"); </script>';
    echo '<script type="text/javascript">window.location.href="login.php";</script>';

}
}
?>
</center>
</body>
</html>