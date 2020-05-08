<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>consulta de docentes</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
       <center> 
        <h1>Consulta de docentes</h1>
            <table>
                <tr>
                    <td>idDocente</td>
                    <td>area</td>
                    <td>nombre</td>
                    <td>apellido Paterno</td>
                    <td>apellido Matermo</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/docentes";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $idDocente=$datos[$i]['idDocente'];
            $area=$datos[$i]['area'];
            $nombre=$datos[$i]['nombre'];
            $apellidoP=$datos[$i]['apellidoP'];
            $apellidoM=$datos[$i]['apellidoM'];
            echo "
                <tr>
                    <td><label>".$idDocente."</label></td>
                    <td><label>".$area."</label></td>
                    <td><label>".$nombre."</label></td>
                    <td><label>".$apellidoP."</label></td>
                    <td><label>".$apellidoM."</label></td>
                </tr>
            ";
}
?>
</table>
    </center>
<section>
</section>
</html>
