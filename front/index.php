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

<h1>Bienvenido</h1>


         <h1>Bienvenido <?php echo $_SESSION['nombres'].' '.$_SESSION['apellidoP'].' '.$_SESSION['apellidoM'];?></h1>
</center>
	
</body>
</html>