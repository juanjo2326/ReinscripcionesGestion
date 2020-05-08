<?php
include 'conexion.php';
?> 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>consulta de docentes</title>
	<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Consulta de docentes</h1>
    </header>
    <br>
    <center>
        <table>
            <thead>
            <tr>
                <td>numero de Docente</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Matermo</td>
                <td>Areas</td>
            </tr>
            </thead>
            <?php
            $con = $mysql->query("SELECT * FROM docentes;");

            if ($con->num_rows > 0){
        
            while ($f = $con->fetch_array()){
            ?>
            <tr>
            
                <td><?php echo $f['idDocente']; ?></td>
                <td><?php echo $f['nombres']; ?></td>
                <td><?php echo $f['apellidoP']; ?></td>
                <td><?php echo $f['apellidoM']; ?></td>
                <td><?php echo $f['idAreas']; ?></td>
            </tr>
            <?php
            }

        }
            ?>
    
        </table>
    </center>
<section>
</section>
</html>