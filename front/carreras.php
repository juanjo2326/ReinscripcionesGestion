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
    <header><h1>Consulta de Carreras</h1></header>
        <br> 
            <table id="tab">
                <tr>
                    <td>Carreras</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/carreras";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    if ($datos>0) {
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $carrera=$datos[$i]['carrera'];
            echo '  <tr  class="coco">
                    <td><label>'.$carrera.'</label></td>
                    </tr> ';    
    }
    
}
?>
</table>
    </center>
</html>




