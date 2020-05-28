<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8"/>
	<title>Pago</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<center>
    <header>
<h1>Consulta Pago</h1>
    </header>
    	
<?php
$noControl=0;
$carrera="";
$nombre="";
  
if (empty($_SESSION['noControl'])) {
echo '<form id="formulario" method="get">
<input type="number" name="idC" value="" placeholder="Numero de control " required="true" class="num"><br><br>
<input type="submit" name="button" value="Buscar" class="aceptar" >
<form><br><br>';
if (isset($_GET['idC'])) {
$noControl=$_GET['idC'];
}
}

if (isset($_SESSION['noControl'])) {
    $noControl=$_SESSION['noControl'];
    $carrera=$_SESSION['carrera'];
    $nombre=$_SESSION['apellidoP'].' '.$_SESSION['apellidoM'].' '.$_SESSION['nombres'];
    echo $nombre;
}
  ?>
        <br> 
        <table id="tab">
                <tr>
                    <td>Id del pago</td>
                    <td>No. Control</td>
                    <td>estado</td>
                    <td>periodo</td>
                </tr>
<?php 
if (isset($noControl)&&$noControl!="") {
try {
     
$url="http://127.0.0.1:8181/reinscripciones/alumno/".$noControl."/verificarPago";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    if (isset($datos)) {
    $long=count($datos);
            echo '  <tr  class="coco">
                    <td><label>'.$datos['idPago'].'</label></td>
                    <td><label>'.$datos['noControl'].'</label></td>
                    <td><label>'.$datos['estado'].'</label></td>
                    <td><label>'.$datos['periodo'].'</label></td>
                    </tr> ';
}
    
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

   
}
?>
</table>
    </center>
</html>




