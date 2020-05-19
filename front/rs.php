<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8"/>
	<title>Carreras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<center>
    <header>
<h1>Consulta de Carreras</h1>
    </header>
    	
        <br> 
            <table id="tab">
                <tr>
                    <td>idReinscripcion</td>
                    <td>noControl</td>
                    <td>idCarga</td>
                    <td>idPago</td>
                    <td>estado</td>
                    <td>periodo</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/alumno/".$_SESSION['noControl']."/verificarReinscripcion";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
            echo '  <tr  class="coco">
                    <td><label>'.$datos['idReinscripcion'].'</label></td>
                    <td><label>'.$datos['noControl'].'</label></td>
                    <td><label>'.$datos['idCarga'].'</label></td>
                    <td><label>'.$datos['idPago'].'</label></td>
                    <td><label>'.$datos['estado'].'</label></td>
                    <td><label>'.$datos['periodo'].'</label></td>
                    </tr> ';

?>
</table>
    </center>
</html>




