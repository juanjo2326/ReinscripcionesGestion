
<?php 
session_start();

$con = $mysql= new mysqli("localhost", "root","", "reinscripciones");
if ($mysql-> connect_error) {
    die("problemas con la conexion a la base de datos");
}
mysqli_set_charset($con, 'utf8'); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Horario</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
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
    <h1>Capturar Horario</h1> <h3 style="color: white;">Introduzca la clave (<strong id="m">M</strong>) de la materia y el codigo (<strong id="p">P</strong>) del profesor para dicha materia (puede dejar horas en blanco) </h3>
<br>
<div style="display: inline-flex;">
<div class="hor" id="es"> <br>
<form id="formulario" method="POST">
<br>
<table id="tab" class="tab2">
        <tr>
            <th style="width: 100px;" >MATERIA</th>
            <th style="width: 100px;" >DOCENTE</th>
        </tr>
<?php 
$L=0;
    for ($i=1; $i < 9; $i++) { 
    echo '
    <tr class="coco">
    <td><input type="text" name="M'.$i.'" placeholder="Materia'.$i.'"  id="m">
    <td><input type="text" name="P'.$i.'" placeholder="Profesor'.$i.'" id="p">
    </tr>
    ';
}
?>  
    </table>

<br>


<input type="submit" name="button" value="Enviar" class="aceptar">

</form> 

<?php
if (isset($_REQUEST['idHorario'])&&isset($_REQUEST['M1'])) {
    $idH=$_REQUEST['idHorario'];


    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M1]','$_REQUEST[P1]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M2]','$_REQUEST[P2]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M3]','$_REQUEST[P3]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M4]','$_REQUEST[P4]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M5]','$_REQUEST[P5]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M6]','$_REQUEST[P6]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M7]','$_REQUEST[P7]',$idH)") or die($mysql -> error);
    $re=$mysql->query("insert into horariotem values (null,'$_REQUEST[M8]','$_REQUEST[P8]',$idH)") or die($mysql -> error);

        header("Location: ./captura_horarios2.php?idHorario=".$idH."&idCarrera=".$_REQUEST[idCarrera]);

}

  ?>
</div>
<br><br>
<div class="hor" id="es2">
<br>

<table id="tab" class="tab2">
            <th colspan="4"><strong id="m">MATERIAS</strong></th>
            <tr>
                <td style="width: 95px;"><strong id="m">M</strong></td>
                <td >Nombre</td>
                <td style="width: 70px;">Creditos</td>
                <td>Teo...</td>
                <td>Pra...</td>
                <td style="width: 75px;">Semestre</td>
            </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/materias/carreras/".$_GET['idCarrera'];
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
for ($i=0; $i <$long ; $i++) { 
        echo '
            <tr  class="coco">
                <td><label>'.$datos[$i]['idMateria'].'</label></td>
                <td><label>'.$datos[$i]['materia'].'</label></td>
                <td><label>'.$datos[$i]['creditos'].'</label></td>
                <td><label>'.$datos[$i]['teorica'].'</label></td>
                <td><label>'.$datos[$i]['practica'].'</label></td>
                <td><label>'.$datos[$i]['semestre'].'</label></td>
            </tr>';
}
?>
        </table>



</div>
</div>
<br>
<div><br>
<table cellspacing="15px" id="tab" style="float: right;    margin-right: 90px;">
                <th colspan="4"><strong id="p">DOCENTES</strong></th>
                <tr>
                    <td style="width: 95px;"><strong id="p">P</strong></td>
                    <td>Nombres</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Matermo</td>
                </tr>
<?php 
    $urld="http://127.0.0.1:8181/reinscripciones/docentes";
    $jsond=file_get_contents($urld);
    $datosd=json_decode($jsond,true);
    if ($datosd>0) {
    $longd=count($datosd);
        for ($i=0; $i < $longd; $i++) { 
            echo '
                <tr class="coco">
                <td><label>'.$datosd[$i]['idDocente'].'</label></td>
                    <td><label>'.$datosd[$i]['nombres'].'</label></td>
                    <td><label>'.$datosd[$i]['apellidoP'].'</label></td>
                    <td><label>'.$datosd[$i]['apellidoM'].'</label></td>
                </tr>
            ';
    }
}
?>
</table></div>
</center>
</body>
</html>