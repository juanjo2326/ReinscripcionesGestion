<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Horario</title>
</head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">

<body>
<center>
    <header><h1>Horario</h1></header>

<form id="formulario" method="get">
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
    <option value="">seleccionar Carrera</option>';
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

	<input type="submit" name="button" value="Enviar" class="aceptar">
<br>
</form><br>
    <?php 
    if (isset($_GET['idCarrera'])) {
        
    
$idCarrera=$_GET['idCarrera'];
if (empty($_GET['turno'])||empty($_GET['semestre'])||empty($_GET['periodo'])||empty($idCarrera)) {
        echo "<h2>Ingrese todos los datos</h2><br>";
    } else{

    $url3="http://127.0.0.1:8181/reinscripciones/horario/".$_GET['año']."/".$_GET['periodo']."/".$_GET['semestre']."/".$_GET['turno']."/".$idCarrera;
    $json3=file_get_contents($url3);
    $datos3=json_decode($json3,true);
    $long3=count($datos3);
    if ($long3<=0) {
        echo "<h2>No hay horario</h2><br>";
    }else{
    echo '<h2>'.$datos3[0]['carrera'].', '.$_GET['año'].", ".$_GET['periodo'].", ".$_GET['semestre'].", ".$_GET['turno'].'</h2><br>';
    }
}
}
?>
	
	<table id="tab">
		<tr>
			<th style="width: 51px;" >HORA</th>
			<th>LUNES</th>
			<th>MARTES</th>
			<th>MIERCOLES</th>
			<th>JUEVES</th>
			<th>VIERNES</th>
		</tr>

<?php 
if (isset($_GET['turno'])||isset($_GET['semestre'])||isset($_GET['periodo'])) {
 for ($i=0; $i < $long3; $i++) { 
            echo '
<tr class="coco">
    <td><label>'.($i+7).'-'.($i+8).'</label></td>
    <td><label>';
    if (isset($datos3[$i]['lunes'])&&$datos3[$i]['lunes']!="") {
        $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['lunes'];
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);
        echo $datos2['materia'].'
        </label></td>
    <td><label>';
    }

    if (isset($datos3[$i]['martes'])&&$datos3[$i]['martes']!="") {
    $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['martes'];
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);
        echo $datos2['materia'].'
        </label></td>
    <td><label>';
    }

    if (isset($datos3[$i]['miercoles'])&&$datos3[$i]['miercoles']!="") {
    $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['miercoles'];
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);
        echo $datos2['materia'].'
        </label></td>
    <td><label>';
    }

    if (isset($datos3[$i]['jueves'])&&$datos3[$i]['jueves']!="") {
    $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['jueves'];
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);
        echo $datos2['materia'].'
        </label></td>
    <td><label>';
    }

    if (isset($datos3[$i]['viernes'])&&$datos3[$i]['viernes']!="") {
    $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['viernes'];
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);
        echo $datos2['materia'].'
        </label></td>';
    }


echo '</tr>';
}
}
?>
	</table>
</center>
</body>
</html>