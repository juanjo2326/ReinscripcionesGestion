<?php 
session_start(); 

$con = $mysql= new mysqli("localhost", "root","", "reinscripciones");
if ($mysql-> connect_error) {
    die("problemas con la conexion a la base de datos");
}
mysqli_set_charset($con, 'utf8');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Horario</title>
</head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">

<body>    
	<center>
<header> <br>
    <h3>Introduzca la clave (<strong id="m">M</strong>) de la materia y el codigo (<strong id="p">P</strong>) del profesor para dicha materia al dia y hora correspondiente (puede dejar horas en blanco) </h3>
</header>
<div style="display: inline-flex;">

<div class="hor" id="es">
    <br>
<form id="formulario" method="POST">
    
    <table style="width: 100%" id="tab" class="tab2">
		<tr>
			<th style="width: 51px;">HORA</th>
			<th>LUNES</th>
			<th>MARTES</th>
			<th>MIERCOLES</th>
			<th>JUEVES</th>
			<th>VIERNES</th>
		</tr>
<?php 
$L=0;
    for ($i=1; $i < 9; $i++) { 
    echo '
    <tr class="coco">
    <td><label>'.($i+6).'-'.($i+7).'</label></td>
    <td><input type="text" name="ML'.$i.'" placeholder="M-L'.$i.'" class="h" id="m">
    <td><input type="text" name="MMa'.$i.'" placeholder="M-Ma'.$i.'" class="h" id="m">
    <td><input type="text" name="MMi'.$i.'" placeholder="M-Mi'.$i.'" class="h" id="m">
    <td><input type="text" name="MJ'.$i.'" placeholder="M-J'.$i.'" class="h" id="m">
    <td><input type="text" name="MV'.$i.'" placeholder="M-V'.$i.'" class="h" id="m">    
    </tr>
    ';
}
?>	
	</table><br>
<input type="submit" name="button" value="Enviar" class="aceptar">
</form> 
<?php

if (isset($_GET['idHorario'])) {

$idH=$_GET['idHorario'];


if (isset($_GET['ML1'])) {   

$rec=$mysql->query("insert into dias values (null, '7-8', '$_GET[ML1]', '$_GET[MMa1]', '$_GET[MMi1]', '$_GET[MJ1]', '$_GET[MV1]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '8-9', '$_GET[ML2]', '$_GET[MMa2]', '$_GET[MMi2]', '$_GET[MJ2]', '$_GET[MV2]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '9-10', '$_GET[ML3]', '$_GET[MMa3]', '$_GET[MMi3]', '$_GET[MJ3]', '$_GET[MV3]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '10-11', '$_GET[ML4]', '$_GET[MMa4]', '$_GET[MMi4]', '$_GET[MJ4]', '$_GET[MV4]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '11-12', '$_GET[ML5]', '$_GET[MMa5]', '$_GET[MMi5]', '$_GET[MJ5]', '$_GET[MV5]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '12-13', '$_GET[ML6]', '$_GET[MMa6]', '$_GET[MMi6]', '$_GET[MJ6]', '$_GET[MV6]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '13-14', '$_GET[ML7]', '$_GET[MMa7]', '$_GET[MMi7]', '$_GET[MJ7]', '$_GET[MV7]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '14-15', '$_GET[ML8]', '$_GET[MMa8]', '$_GET[MMi8]', '$_GET[MJ8]', '$_GET[MV8]', $idH)") or die($mysql-> error);
 }
}
$mysql->close();
 ?>  

</div>
<br><br>
<div class="hor" id="es2">
<br>

<table id="tab" class="tab2">
			<th colspan="4"><strong id="m">MATERIAS</strong></th>
            <tr>
            	<td style="width: 95px;"><strong id="m">M</strong></td>
                <td >Nombre</td>
                <td style="width: 70px;">Creditos</td>
                <td>Teo...</td>
                <td>Pra...</td>
                <td style="width: 75px;">Semestre</td>
            </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/materias/carreras/".$_SESSION['idCarrera'];
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
for ($i=0; $i <$long ; $i++) { 
        echo '
            <tr  class="coco">
            	<td><label>'.$datos[$i]['idMateria'].'</label></td>
                <td><label>'.$datos[$i]['materia'].'</label></td>
                <td><label>'.$datos[$i]['creditos'].'</label></td>
                <td><label>'.$datos[$i]['teorica'].'</label></td>
                <td><label>'.$datos[$i]['practica'].'</label></td>
                <td><label>'.$datos[$i]['semestre'].'</label></td>
            </tr>';
}
?>
        </table>





<br>



</div>

</div>
</center>
</body>
</html>