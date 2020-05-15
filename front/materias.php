<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Consulta de materias por carrera</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <header>

    </header>
	 <center>	
        <h1>Consulta de materias por carrera</h1><br>
<table >
                <tr>
                    <td>Numero</td>
                    <td>Nombre de la carrera</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/carreras";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $idCarrera=$datos[$i]['idCarrera'];
            $nombre=$datos[$i]['nombre'];
            echo '<tr  class="coco">
                    <td><label>'.$idCarrera.'</label></td>
                    <td><label>'.$nombre.'</label></td>
                </tr> ';
}
?>
</table>
<br>
<form id="formulario" method="get">
        <input type="number" name="idC" value="" placeholder="Numero " required="true" class="num"><br><br>
        <input type="submit" name="button" value="Buscar" class="aceptar">
</form>
<br> 
<table>
            <tr>
                <td>Creditos</td>
                <td>Teorica</td>
                <td>Practica</td>
                <td>Nombre</td>
                <td>Semestre</td>
            </tr>

<?php 
  $verificar=false; 

    if (isset($_GET['idC'])&&$_GET['idC']!=null) {
    $url="http://127.0.0.1:8181/reinscripciones/materias/carreras/".$_GET['idC'];
    $json=file_get_contents($url);
    $datosC=json_decode($json,true);
    $long=count($datosC);
    
    $creditos=" ";
    $teorica=" ";
    $practica=" ";
    $nombre=" ";
    $semestre=" ";

for ($i=0; $i < $long; $i++) { 
if ($_GET['idC']==$datosC[$i]['idCarrera']) {
    $verificar=true;
}
}
if ($verificar) {
    $idCarrera=$_GET['idC'];
    $url="http://127.0.0.1:8181/reinscripciones/materias/carreras/".$idCarrera;
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
for ($i=0; $i <$long ; $i++) { 
    $creditos=$datos[$i]['creditos'];
    $teorica=$datos[$i]['teorica'];
    $practica=$datos[$i]['practica'];
    $nombre=$datos[$i]['nombre'];
    $semestre=$datos[$i]['semestre'];

        echo '
            <tr  class="coco">
                <td><label>'.$creditos.'</label></td>
                <td><label>'.$teorica.'</label></td>
                <td><label>'.$practica.'</label></td>
                <td><label>'.$nombre.'</label></td>
                <td><label>'.$semestre.'</label></td>
            </tr>';
}
}else{
    echo '<script type="text/javascript"> alert("No hay materias para esa carrera")</script>';
}} 
?>
        </table>
    </center>
<section>
</section>
</html>
