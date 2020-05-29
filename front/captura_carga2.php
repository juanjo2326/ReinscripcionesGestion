<?php 
session_start(); 

$con = $mysql= new mysqli("localhost", "root","", "reinscripciones");
if ($mysql-> connect_error) {
    die("problemas con la conexion a la base de datos");
}
mysqli_set_charset($con, 'utf8');
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
<h2>Cargar materias (la suma de los creditos no debe ser mayor a 34)</h2>
<br>
<div style="display: inline-flex;">
<div class="hor" id="tabkar2">
   
   <?php 
   $inpar=['1ro','3ro','5to','7mo'];
   $par=['2do','4to','6to','8vo'];

   for ($j=0; $j <=3 ; $j++) {
if ($_REQUEST['periodo']=="enero-junio") {
        $url3="http://127.0.0.1:8181/reinscripciones/horario/".$_REQUEST['año']."/".$_REQUEST['periodo']."/".$inpar[$j]."/".$_REQUEST['turno']."/".$_SESSION['idCarrera'];
    echo '<h2>'.$inpar[$j].'</h2>';
$json3=file_get_contents($url3);
    $datos3=json_decode($json3,true);
    $long3=count($datos3);
}
if ($_REQUEST['periodo']=="agosto-diciembre") {
        $url3="http://127.0.0.1:8181/reinscripciones/horario/".$_REQUEST['año']."/".$_REQUEST['periodo']."/".$par[$j]."/".$_REQUEST['turno']."/".$_SESSION['idCarrera'];
        echo '<h2>'.$par[$j].'</h2>';
$json3=file_get_contents($url3);
    $datos3=json_decode($json3,true);
    $long3=count($datos3);
}

?>
    
    <table id="tab" class="tab3">
        <tr>
            <th style="width: 53px;" >HORA</th>
            <th style="width: 200px;">LUNES</th>
            <th style="width: 200px;">MARTES</th>
            <th style="width: 200px;">MIERCOLES</th>
            <th style="width: 200px;">JUEVES</th>
            <th style="width: 200px;">VIERNES</th>
        </tr>

<?php 
 for ($i=0; $i < $long3; $i++) { 
            
    echo '<tr><td  style="height: 42px;"><label>'.($i+7).'-'.($i+8).'</label></td>';

    if (isset($datos3[$i]['lunes'])&&$datos3[$i]['lunes']!="") {
        $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['lunes'];
        $json2=file_get_contents($url2);
        $datos2=json_decode($json2,true);
           echo '<td><label>'.$datos2['materia'].'</label></td>'; 
    }else{
        echo '<td><label>'."".'</label></td>';
    }

    if (isset($datos3[$i]['martes'])&&$datos3[$i]['martes']!="") {
        $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['martes'];
        $json2=file_get_contents($url2);
        $datos2=json_decode($json2,true);
           echo '<td><label>'.$datos2['materia'].'</label></td>'; 
    }else{
        echo '<td><label>'."".'</label></td>';
    }

    if (isset($datos3[$i]['miercoles'])&&$datos3[$i]['miercoles']!="") {
        $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['miercoles'];
        $json2=file_get_contents($url2);
        $datos2=json_decode($json2,true);
           echo '<td><label>'.$datos2['materia'].'</label></td>'; 
    }else{
        echo '<td><label>'."".'</label></td>';
    }

    if (isset($datos3[$i]['jueves'])&&$datos3[$i]['jueves']!="") {
        $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['jueves'];
        $json2=file_get_contents($url2);
        $datos2=json_decode($json2,true);
           echo '<td><label>'.$datos2['materia'].'</label></td>'; 
    }else{
        echo '<td><label>'."".'</label></td>';
    }

    if (isset($datos3[$i]['viernes'])&&$datos3[$i]['viernes']!="") {
        $url2="http://127.0.0.1:8181/reinscripciones/materias/".$datos3[$i]['viernes'];
        $json2=file_get_contents($url2);
        $datos2=json_decode($json2,true);
           echo '<td><label>'.$datos2['materia'].'</label></td>'; 
    }else{
        echo '<td><label>'."".'</label></td>';
    }

echo "</tr>";
}

?>
        <tr>
            <th >Creditos</th>
            <th >Clave materia</th>
            <th >Materia</th>
            <th >Nombre</th>
       </tr>
<?php 

$urlh="http://127.0.0.1:8181/reinscripciones/horarioT/".$datos3[0]['idHorario'];
        $jsonh=file_get_contents($urlh);
        $datosh=json_decode($jsonh,true);
        $longh=count($datosh);
for ($i=0; $i < $longh; $i++) { 
    echo '<tr>
            <td><strong>'.$datosh[$i]['creditos'].'</strong></td>
            <td><label>'.$datosh[$i]['idMateria'].'</label></td>
            <td><label>'.$datosh[$i]['materia'].'</label></td>
            <td><label>'.$datosh[$i]['nombres'].' '.$datosh[$i]['apellidoP'].' '.$datosh[$i]['apellidoM'].'</label></td>
           </tr>';
}

 ?>
</table> <br>
<?php 
}
 ?>
</div>
<br><br>
<div class="hor" id="tabkar">
    
<form id="formulario" method="POST" >
    
    <input type="text" name="año" class="num" value=<?php echo date("Y");?>  >
    <input type="text" name="periodo" class="num" value=<?php echo $_REQUEST['periodo'];?>  >
    <input type="text" name="semestre" class="num" value=<?php echo $_REQUEST['semestre'];?>  >
    <input type="text" name="turno" class="num" value=<?php echo $_REQUEST['turno'];?>  >

    <br><br>

    <table id="tab">
        
        <tr>
            <th style="width:30px;" >CREDITOS</th>
            <th style="width:80px;" >CLAVE MATERIA</th>
        </tr>
<?php 
for ($i=1; $i < 9; $i++) { 
    echo '
        <tr>
            <td><input type="number" name="c'.$i.'" placeholder="X '.$i.'" id="es" class="num"></td>
            <td><input type="text" name="M'.$i.'" placeholder="MATERIA '.$i.'" class="h"></td>
        </tr>
    ';
}

 ?>
        
       
</table>
<br><br>
<input type="submit" name="button" value="Enviar" class="aceptar">

</form>

</div>
</div>
<?php 
$idCC=0;
if (isset($_REQUEST['periodo'])&&isset($_REQUEST['M1'])) {


$re2=$mysql->query("select idCarga from carga order by idCarga desc limit 1")or die($mysql-> error);

    while ($f=$re2->fetch_array()) {  $idCC=$f['idCarga']; $idCC=$idCC+1;   }

    $rec=$mysql->query("insert into carga values ($idCC,'$_REQUEST[periodo]','$_REQUEST[semestre]','$_REQUEST[turno]',$_REQUEST[año],$_SESSION[noControl])") or die($mysql -> error);

}


if (isset($_REQUEST['M1'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M1]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M2'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M2]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M3'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M3]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M4'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M4]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M5'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M5]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M6'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M6]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M7'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M7]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M8'])) {
$re=$mysql->query("insert into cargatem values (null,$idCC,'$_REQUEST[M8]')") or die($mysql -> error);    
}
if (isset($_REQUEST['M1'])) {
echo '<script type="text/javascript"> alert("Se agrego correctamente"); window.location.href="index.php";</script>';
}

 ?>
<br>
</center> 
</body>
</html><br>