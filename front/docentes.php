<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Docentes</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <script type="text/javascript"  href="./js/scripts.js"></script>
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
        <h1>Consulta de docentes</h1>

        <br> 
            <table cellspacing="15px" id="tab">
                <tr>
                    <td>Nombres</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Matermo</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/docentes";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    if ($datos>0) {
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $nombres=$datos[$i]['nombres'];
            $apellidoP=$datos[$i]['apellidoP'];
            $apellidoM=$datos[$i]['apellidoM'];
            echo '
                <tr class="coco">
                    <td><label>'.$nombres.'</label></td>
                    <td><label>'.$apellidoP.'</label></td>
                    <td><label>'.$apellidoM.'</label></td>
                </tr>
            ';
    }
}
?>
</table>
    </center>
<section>
</section>
</html>