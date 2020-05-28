<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Kardex</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <center>
	<header>
    </header>       
<?php 
$noControl=0;
$carrera="";
$nombre="";

if (isset($_SESSION['noControl'])) {
    $noControl=$_SESSION['noControl'];
    $carrera=$_SESSION['carrera'];
    $nombre=$_SESSION['apellidoP'].' '.$_SESSION['apellidoM'].' '.$_SESSION['nombres'];

    echo '<h1>'.$carrera.'<br>'.$nombre.'</h1>';
}

if (empty($_SESSION['noControl'])) {
echo '<form id="formulario" method="get">
<input type="number" name="idC" value="" placeholder="Numero de control " required="true" class="num"><br><br>
<input type="submit" name="button" value="Buscar" class="aceptar" >
<form>';
if (isset($_GET['idC'])) {
$noControl=$_GET['idC'];
}
}
 ?>
    <section>
<?php 
   if (isset($noControl)&& $noControl!="") {

    $url="http://127.0.0.1:8181/reinscripciones/kardex/".$noControl;
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);

    $se=["1ro","2do","3ro","4to","5to","6to","7mo","8vo"];
  //  echo '<h1>'.$datos[0]['carrera'].'<br>'.$datos[0]['nombres'].'</h1>';
if ($long>0) {
   

?>

<table cellspacing="5px" id="tabkar">
    <tr>
<?php 
for ($j=0; $j < 8; $j++) { 
  ?>
        <td><section id="kardex">
        <?php echo '<h1 style="color: white;">'.$se[$j].'</h1><div id="kadiv"><br><center> ';
        for ($i=0; $i <$long ; $i++) { 

        if ($datos[$i]['semestre']==$se[$j]) {    
if ($datos[$i]['acreditacion']==1) { 
    echo '<table  id="tabk" style="background:#501c1c54">';
}else{
    echo ' <table  id="tabk" >'; 
      } 
        echo ' 
            <tr>
                <td colspan="5" id="kk"><label id="noma">'.$datos[$i]['materia'].'</label><br><strong>'.$datos[$i]['idMateria'].'</strong></td>
            </tr>
            <tr><td >_</td>
                <td>'.$datos[$i]['teorica'].'</td>
                <td>'.$datos[$i]['practica'].'</td>
                <td>'.$datos[$i]['creditos'].'</td>
            </tr>
        </table>';
        }   
    }
        echo "<div></center>";
        ?>
        </section></td>
<?php   
}  ?>
    </tr>
</table>
<?php }else{
        echo "<br><h2>no se encontro ese numero de control</h2><br>";
    }
} ?>
</section></center>

</body>
</html>