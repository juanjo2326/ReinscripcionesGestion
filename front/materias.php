<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Materias por carrera</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <center>
    <header>
        <h1>Consulta de materias por carrera</h1>
    </header>
    <br>
<form id="formulario" method="get">

<select name="idC">
    <option value="">seleccionar Carrera</option>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/carreras";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $idCarrera=$datos[$i]['idCarrera'];
            $carrera=$datos[$i]['carrera'];
            echo '<option value="'.$idCarrera.'">'.$carrera.'</option>
                ';
}
?>
</select>   
        <input type="submit" name="button" value="Buscar" class="aceptar">
</form>
<br> 
<table id="tab">
            <tr>
                <td>Creditos</td>
                <td>Teorica</td>
                <td>Practica</td>
                <td>Materia</td>
                <td>Semestre</td>
            </tr>
<?php 

if (isset($_GET['idC'])&&$_GET['idC']!=null) {
    $idCarrera=$_GET['idC'];
    $url2="http://127.0.0.1:8181/reinscripciones/materias/carreras/".$idCarrera;
    $json2=file_get_contents($url2);
    $datos2=json_decode($json2,true);
    $long2=count($datos2);
    if ($long2>0) {
for ($i=0; $i <$long2 ; $i++) { 
    $creditos=$datos2[$i]['creditos'];
    $teorica=$datos2[$i]['teorica'];
    $practica=$datos2[$i]['practica'];
    $materia=$datos2[$i]['materia'];
    $semestre=$datos2[$i]['semestre'];
        echo '
            <tr  class="coco">
                <td><label>'.$creditos.'</label></td>
                <td><label>'.$teorica.'</label></td>
                <td><label>'.$practica.'</label></td>
                <td><label>'.$materia.'</label></td>
                <td><label>'.$semestre.'</label></td>
            </tr>';
}
}else{
    echo '<script type="text/javascript"> alert("No hay materias para esa carrera")</script>';
}
}
?>
        </table>
    </center>
<section>
</section>
</html>
