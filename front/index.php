<?php 
session_start(); 
if (empty($_SESSION['noControl'])) {
    $_SESSION['noControl']="";
$_SESSION['usuario']="";
$_SESSION['contra']="";
$_SESSION['nombres']="";
$_SESSION['apellidoP']="";
$_SESSION['apellidoM']="";
$_SESSION['semestre']="";
$_SESSION['carrera']="";
$_SESSION['idCarrera']="";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <center> 
        <header>
<h1>Index</h1>
    </header>   
         <h1>Bienvenido <?php echo $_SESSION['nombres'].' '.$_SESSION['apellidoP'].' '.$_SESSION['apellidoM'];?></h1>
        <nav class="menu2">
        <ul>                
        <a href="materias.php"><li>materias</li></a>
        <a href="consultar_carga.php"><li>consultar carga</li></a>
        <a href="carreras.php"><li>carreras</li></a>           
        <a href="docentes.php"><li>docentes</li></a>
        <a href="kardex.php"><li>kardex</li></a>
        <a href="pago.php"><li>Comprobar pago</li></a>
        <a href="rs.php"><li>Estado de Reinscripcion</li></a>
        <a href="login.php"><li>login</li></a>
        <a href="captura_horarios.php"><li>captura horarios</li></a>



        <a href="consulta_horarios.php"><li>consultar horarios</li></a>

        </ul> 
        </nav>
</center>
	
</body>
</html>