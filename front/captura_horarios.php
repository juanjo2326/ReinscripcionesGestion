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
<header>
    <h1>Horario</h1>
    <h3>Introduzca la clave (<strong id="m">M</strong>) de la materia y el codigo (<strong id="p">P</strong>) del profesor para dicha materia al dia y hora correspondiente (puede dejar horas en blanco) </h3>
</header>

<div style="display: inline-flex;">

<div class="hor" id="es"><br>

<form id="formulario" method="GET">
    <?php
    $idCarrera;
    if (isset($_SESSION['idCarrera'])) {
        $idCarrera=$_SESSION['idCarrera'];
    }else{    
    $urlc="http://127.0.0.1:8181/reinscripciones/carreras";
    $jsonc=file_get_contents($urlc);
    $datosc=json_decode($jsonc,true);
    $longc=count($datosc);
    echo '<select name="idCarrera">
    <option value="">Seleccionar Carrera</option>';
        for ($i=0; $i < $longc; $i++) { 
            echo '<option value="'.$datosc[$i]['idCarrera'].'">'.$datosc[$i]['carrera'].'</option>';
        }
    echo " </select>";
    }
      ?>
    <input type="number" name="año" placeholder="año" required="true" class="num"> 
    <select name="periodo">        
        <option value="">Periodo escolar</option>
        <option value="enero-junio">Enero-Junio</option>
        <option value="agosto-diciembre">agosto-diciembre</option>
    </select>
    <select name="semestre">        
        <option value="">Semestre</option>
        <option value="1ro">1ro</option>
        <option value="2do">2do</option>
        <option value="3ro">3ro</option>
        <option value="4to">4to</option>
        <option value="5to">5to</option>
        <option value="6to">6to</option>
        <option value="7mo">7mo</option>
        <option value="8vo">8vo</option>
    </select>
    <select name="turno">		
		<option value="">Turno</option>
 		<option value="v">Vespertino</option>
		<option value="m">Matutino</option>
	</select>
    <br><br>
    
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

<br>
</div>

<?php

$idH=0;
   
$re2=$mysql->query("select idHorario from horarios order by idHorario desc limit 1")or die($mysql-> error);

    while ($f=$re2->fetch_array()) {
        $idH=$f['idHorario'];
        $idH=$idH+1;
        }
if (isset($_GET['semestre']) &&isset($_GET['turno']) &&isset($_GET['año']) &&isset($_GET['periodo'])) {

$re=$mysql->query("insert into horarios values ($idH,'$_GET[semestre]','$_GET[turno]',$_GET[año],'$_GET[periodo]',$_GET[idCarrera])") or die($mysql-> error);


$rec=$mysql->query("insert into dias values (null, '7-8', '$_GET[ML1]', '$_GET[MMa1]', '$_GET[MMi1]', '$_GET[MJ1]', '$_GET[MV1]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '8-9', '$_GET[ML2]', '$_GET[MMa2]', '$_GET[MMi2]', '$_GET[MJ2]', '$_GET[MV2]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '9-10', '$_GET[ML3]', '$_GET[MMa3]', '$_GET[MMi3]', '$_GET[MJ3]', '$_GET[MV3]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '10-11', '$_GET[ML4]', '$_GET[MMa4]', '$_GET[MMi4]', '$_GET[MJ4]', '$_GET[MV4]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '11-12', '$_GET[ML5]', '$_GET[MMa5]', '$_GET[MMi5]', '$_GET[MJ5]', '$_GET[MV5]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '12-13', '$_GET[ML6]', '$_GET[MMa6]', '$_GET[MMi6]', '$_GET[MJ6]', '$_GET[MV6]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '13-14', '$_GET[ML7]', '$_GET[MMa7]', '$_GET[MMi7]', '$_GET[MJ7]', '$_GET[MV7]', $idH)") or die($mysql-> error);
$rec=$mysql->query("insert into dias values (null, '14-15', '$_GET[ML8]', '$_GET[MMa8]', '$_GET[MMi8]', '$_GET[MJ8]', '$_GET[MV8]', $idH)") or die($mysql-> error);
 
}
$mysql->close();
 ?>  


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
            <table cellspacing="15px" id="tab" class="tab2">
            	<th colspan="4"><strong id="p">PROFESORES</strong></th>
                <tr>
                    <td ><strong id="p">P</strong></td>
                    <td>Nombre</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/docentes";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            echo '
                <tr class="coco">
                    <td><label>'.$datos[$i]['idDocente'].'</label></td>
                    <td><label>'.$datos[$i]['nombres'].'</label>
                    <label>'.$datos[$i]['apellidoP'].'</label>
                    <label>'.$datos[$i]['apellidoM'].'</label></td>
                </tr>
            ';
}
?>
</table>


</div>
</div></center>
</body>
</html>