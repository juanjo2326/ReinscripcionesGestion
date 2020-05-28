<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Reinscripcion</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>


<body>
	<center>
    <header><h1>Consulta Reinscripcion</h1></header>	

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
    $nombre='<h2>'.$_SESSION['apellidoP'].' '.$_SESSION['apellidoM'].' '.$_SESSION['nombres'].'</h2><br>';
    echo $nombre;
}
  ?>

            <table id="tab">
<?php 

if (isset($noControl)&&$noControl!="") {
    
    $url="http://127.0.0.1:8181/reinscripciones/alumno/".$noControl."/verificarReinscripcion";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);

    $url2="http://127.0.0.1:8181/reinscripciones/alumno/".$noControl."/verificarPago";
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);

    if ($datos>0&&$datos2>0) {
    echo '  
    <tr class="coco"><td>No. control: </td><td><h3>'.$datos['noControl'].'</h3></td><tr>
    <tr class="coco"><td>Folio del pago: </td><td><h3>'.$datos2['idPago'].'</h3></td><tr>
    <tr class="coco"><td>Estado del pago: </td><td><h3>'.$datos2['estado'].'</h3></td><tr>
    <tr class="coco"><td>Periodo del pago: </td><td><h3>'.$datos2['periodo'].'</h3></td><tr>
    <tr class="coco"><td>Estado de la reinscripcion: </td><td><h3>'.$datos['estado'].'</h3></td><tr>
    <tr class="coco"><td>Periodo de la reinscripcion: </td><td><h3>'.$datos['periodo'].'</h3></td><tr>

    ';
    }
}
?>
    </center>
</html>




