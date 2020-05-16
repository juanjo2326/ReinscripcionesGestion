<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carga académica por alumno</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="./imagenes/tec.jpg">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body> 
	<center>
<header>
   <h1>Instituto Tecnológico de La Piedad</h1>
</header>

<br>
<form id="formulario" method="get">
    <?php 
if (isset($_SESSION['noControl'])) {
    echo '<input type="hidden" name="idC" value="'.$_SESSION['noControl'].'" placeholder="Numero de control " required="true" class="num"><br><br>';
}else{
        echo '<input type="number" name="idC" value="" placeholder="Numero de control " required="true" class="num"><br><br>';
}
    ?>
        Periodo: <select name="periodo">
            <option value="">seleccionar</option>
            <option value="enero-junio">enero-junio</option>
            <option value="agosto-diciembre">agosto-diciembre</option>
        </select>
        <input type="number" name="año" placeholder="año" required="true" class="num">
        <input type="submit" name="button" value="Buscar" class="aceptar">

</form>
<br> 
<?php echo '<h2 style="color: #ece5e5;">No. Control: '.$_GET['idC'].", año: ".$_GET['año'].", periodo: ".$_GET['periodo'].'</h2>'; ?>
<br>
<table id="tab">
            <tr>
                <td>Semestre</td>
                <td>Turno</td>
                <td>Materia</td>
                <td>Creditos</td>
                <td>Teorica</td>
                <td>Practica</td>
            </tr>
<?php 
    if (isset($_GET['idC'])&&$_GET['idC']!=null) {
    $url="http://127.0.0.1:8181/reinscripciones/carga/".$_GET['idC']."/".$_GET['año']."/".$_GET['periodo'];
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
    if ($long>0) {
for ($i=0; $i <$long ; $i++) { 
        echo '
            <tr  class="coco">
                <td><label>'.$datos[$i]['semestre'].'</label></td>
                <td><label>'.$datos[$i]['turno'].'</label></td>
                <td><label>'.$datos[$i]['materia'].'</label></td>
                <td><label>'.$datos[$i]['creditos'].'</label></td>
                <td><label>'.$datos[$i]['teorica'].'</label></td>
                <td><label>'.$datos[$i]['practica'].'</label></td>
            </tr>';
} 
}else{
    echo '<script type="text/javascript"> alert("No hay materias")</script>';
} 
}
?>
        </table>
</center> 
</body>
</html>