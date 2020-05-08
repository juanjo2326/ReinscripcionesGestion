<?php
include 'conexion.php';
?> 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>consulta de avance academico</title>
	<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Consulta de avance academico</h1>
    </header>
    <br>
    <center>
        <table>
            <tr>
                <td>numero</td>
                <td>Nombre del alumno</td>
                <td>Materia </td>
                <td>Acreditada</td>
                <td>No Acreditada</td>
            </tr>
            <?php
            $con = $mysql->query("SELECT * FROM kardex;");

            if ($con->num_rows > 0){
        
            while ($f = $con->fetch_array()){
            ?>
            <tr>
            
                <td><?php echo $f['idKardex']; ?></td>
                <td><?php echo $f['idAlumno']; ?></td>
                <td><?php echo $f['idMateria']; ?></td>
                <td><?php echo $f['acreditada']; ?></td>
                <td><?php echo $f['noacreditada']; ?></td>
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