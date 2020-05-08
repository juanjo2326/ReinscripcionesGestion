<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Consulta de Carreras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	   <center>	
        <h1>Consulta de Carreras</h1>
            <table>
                <tr>
                    <td>idCarrera</td>
                    <td>nombre</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/carreras";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $idCarrera=$datos[$i]['idCarrera'];
            $nombre=$datos[$i]['nombre'];
            echo "
                <tr>
                    <td><label>".$idCarrera."</label></td>
                    <td><label>".$nombre."</label></td>
                </tr>
            ";
}
?>
</table>
    </center>
</html>




