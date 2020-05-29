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
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>    
	<center>
    <header>            
        <nav class="menu2">
        <ul>
<?php 
if (isset($_SESSION['noControl'])) {
    echo '<a href="cerrar.php"><li>Salir</li></a>';
}else{
    echo '<a href="login.php"><li>Login</li></a>';
}
 ?>        
        <a href="kardex.php"><li>Kardex</li></a>
        <a href="consultar_carga.php"><li>Consultar carga</li></a>
        <a href="rs.php"><li>Estado de Reinscripcion</li></a>
        <a href="captura_horario.php"><li>Capturar horarios</li></a>
        <a href="consulta_horarios.php"><li>Consultar horarios</li></a>
        <a href="captura_carga.php"><li>Capturar carga</li></a>

        </ul> 
        </nav>
    </header>
<br>
    <h3 style="color: white;">Introduzca la clave (<strong id="m">M</strong>) de la materia para el dia y hora correspondiente (puede dejar horas en blanco) </h3>
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
    <td><input type="text" name="ML'.$i.'" placeholder="M-L'.$i.'" class="h" id="m"></td>
    <td><input type="text" name="MMa'.$i.'" placeholder="M-Ma'.$i.'" class="h" id="m"></td>
    <td><input type="text" name="MMi'.$i.'" placeholder="M-Mi'.$i.'" class="h" id="m"></td>
    <td><input type="text" name="MJ'.$i.'" placeholder="M-J'.$i.'" class="h" id="m"></td>
    <td><input type="text" name="MV'.$i.'" placeholder="M-V'.$i.'" class="h" id="m"></td>
    </tr>
    ';
}
?>	
	</table><br>
<input type="submit" name="button" value="Enviar" class="aceptar">
</form> 
<?php

if (isset($_GET['idHorario']) &&isset($_REQUEST['ML1'])) {

$idH=$_GET['idHorario'];

if (isset($_REQUEST['ML1'])||isset($_REQUEST['MMa1'])||isset($_REQUEST['MMi1'])||isset($_REQUEST['MJ1'])||isset($_REQUEST['MV1'])) {
$rec=$mysql->query("insert into dias values (null, '7-8', '$_REQUEST[ML1]', '$_REQUEST[MMa1]', '$_REQUEST[MMi1]', '$_REQUEST[MJ1]', '$_REQUEST[MV1]', $idH)") or die($mysql-> error);    
}
if (isset($_REQUEST['ML2'])||isset($_REQUEST['MMa2'])||isset($_REQUEST['MMi2'])||isset($_REQUEST['MJ2'])||isset($_REQUEST['MV2'])) {
$rec=$mysql->query("insert into dias values (null, '8-9', '$_REQUEST[ML2]', '$_REQUEST[MMa2]', '$_REQUEST[MMi2]', '$_REQUEST[MJ2]', '$_REQUEST[MV2]', $idH)") or die($mysql-> error);
}
if (isset($_REQUEST['ML3'])||isset($_REQUEST['MMa3'])||isset($_REQUEST['MMi3'])||isset($_REQUEST['MJ3'])||isset($_REQUEST['MV3'])) {
$rec=$mysql->query("insert into dias values (null, '9-10', '$_REQUEST[ML3]', '$_REQUEST[MMa3]', '$_REQUEST[MMi3]', '$_REQUEST[MJ3]', '$_REQUEST[MV3]', $idH)") or die($mysql-> error);
}
if (isset($_REQUEST['ML4'])||isset($_REQUEST['MMa4'])||isset($_REQUEST['MMi4'])||isset($_REQUEST['MJ4'])||isset($_REQUEST['MV4'])) {
$rec=$mysql->query("insert into dias values (null, '10-11', '$_REQUEST[ML4]', '$_REQUEST[MMa4]', '$_REQUEST[MMi4]', '$_REQUEST[MJ4]', '$_REQUEST[MV4]', $idH)") or die($mysql-> error);
}
if (isset($_REQUEST['ML5'])||isset($_REQUEST['MMa5'])||isset($_REQUEST['MMi5'])||isset($_REQUEST['MJ5'])||isset($_REQUEST['MV5'])) {
$rec=$mysql->query("insert into dias values (null, '11-12', '$_REQUEST[ML5]', '$_REQUEST[MMa5]', '$_REQUEST[MMi5]', '$_REQUEST[MJ5]', '$_REQUEST[MV5]', $idH)") or die($mysql-> error);
}
if (isset($_REQUEST['ML6'])||isset($_REQUEST['MMa6'])||isset($_REQUEST['MMi6'])||isset($_REQUEST['MJ6'])||isset($_REQUEST['MV6'])) {
$rec=$mysql->query("insert into dias values (null, '12-13', '$_REQUEST[ML6]', '$_REQUEST[MMa6]', '$_REQUEST[MMi6]', '$_REQUEST[MJ6]', '$_REQUEST[MV6]', $idH)") or die($mysql-> error);
}
if (isset($_REQUEST['ML7'])||isset($_REQUEST['MMa7'])||isset($_REQUEST['MMi7'])||isset($_REQUEST['MJ7'])||isset($_REQUEST['MV7'])) {
$rec=$mysql->query("insert into dias values (null, '13-14', '$_REQUEST[ML7]', '$_REQUEST[MMa7]', '$_REQUEST[MMi7]', '$_REQUEST[MJ7]', '$_REQUEST[MV7]', $idH)") or die($mysql-> error);
}
if (isset($_REQUEST['ML8'])||isset($_REQUEST['MMa8'])||isset($_REQUEST['MMi8'])||isset($_REQUEST['MJ8'])||isset($_REQUEST['MV8'])) {
$rec=$mysql->query("insert into dias values (null, '14-15', '$_REQUEST[ML8]', '$_REQUEST[MMa8]', '$_REQUEST[MMi8]', '$_REQUEST[MJ8]', '$_REQUEST[MV8]', $idH)") or die($mysql-> error);
}
       
echo '<script type="text/javascript"> alert("Se agrego correctamente"); window.location.href="index.php";</script>';
 
}
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
    $url="http://127.0.0.1:8181/reinscripciones/materias/horario/".$_GET['idHorario'];
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