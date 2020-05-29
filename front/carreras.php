<?php 
session_start(); 

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8"/>
	<title>Carreras</title>
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
    <h1>Consulta de Carreras</h1>
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




