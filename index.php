<?php 
session_start(); 
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
        <a href="carreras.php"><li>carreras</li></a>           
        <a href="materias.php"><li>materias</li></a>
        <a href="docentes.php"><li>docentes</li></a>
        <a href="kardex.php"><li>kardex</li></a>
        <a href="consultar_carga.php"><li>consultar carga</li></a>
        </ul> 
        </nav>
</center>
	
</body>
</html>