<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Carga académica por alumno</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
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

<form id="formulario" method="get">
    <?php

if (isset($_SESSION['noControl'])) {
    $_GET['idC']=$_SESSION['noControl'];
    echo '<input type="hidden" name="idC" value="'.$_SESSION['noControl'].'" placeholder="Numero de control " required="true" class="num">';
}else{
        echo '<input type="number" name="idC" value="" placeholder="Numero de control " required="true" class="num"><br><br>';
}
    ?>
        <select name="semestre">
            <option value="1ro">1ro</option>
            <option value="2do">2do</option>
            <option value="3ro">3ro</option>
            <option value="4to">4to</option>
            <option value="5to">5to</option>
            <option value="6to">6to</option>
            <option value="7mo">7mo</option>
            <option value="8vo">8vo</option>
        </select>

        <input type="submit" name="button" value="Buscar" class="aceptar">

</form>
<?php 

if (empty($_GET['idC'])) {
    echo '<br><h2 style="color: white">Ingrese parametros</h2>';
}

if (isset($_GET['idC'])&&isset($_GET['semestre'])&&$_GET['idC']!=""&&$_GET['semestre']!="") {
echo '<h2 style="color: #ece5e5;">No. Control: '.$_GET['idC'].", semestre: ".$_GET['semestre'].'</h2>'; 
}
?>

<br>
<table id="tab">
            <tr>
                <td>Materia</td>
                <td>Creditos</td>
                <td>Teorica</td>
                <td>Practica</td>
            </tr>
<?php 
    if (isset($_GET['idC'])&&isset($_GET['semestre']) &&$_GET['idC']!=0 &&$_GET['semestre']!="") {
    $url="http://127.0.0.1:8181/reinscripciones/carga/".$_GET['idC']."/".$_GET['semestre'];
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
    if ($long>0) {
for ($i=0; $i <$long ; $i++) { 
        echo '
            <tr  class="coco">
                <td><label>'.$datos[$i]['materia'].'</label></td>
                <td><label>'.$datos[$i]['creditos'].'</label></td>
                <td><label>'.$datos[$i]['teorica'].'</label></td>
                <td><label>'.$datos[$i]['practica'].'</label></td>
            </tr>';
} 
}else{
    echo '<script type="text/javascript"> alert("No hay carga académica")</script>';
} 
}
?>
        </table>
</center> 
</body>
</html>