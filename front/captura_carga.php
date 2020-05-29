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
<h2>Cargar materias</h2><br>

<form id="formulario" method="POST" action="captura_carga2.php">
    
    <input type="hidden" name="idCarrera" class="num" value=<?php echo $_SESSION['idCarrera']; ?> >
    <input type="hidden" name="año" class="num" value=<?php echo date("Y");?>  >
    <select name="periodo">        
        <option value="">Periodo escolar</option>
        <option value="enero-junio">Enero-Junio</option>
        <option value="agosto-diciembre">agosto-diciembre</option>
    </select>
    <select name="semestre">        
        <option value="">Semestre</option>
        <option value="1ro">1ro</option>
        <option value="2do">2do</option>
        <option value="3ro">3ro</option>
        <option value="4to">4to</option>
        <option value="5to">5to</option>
        <option value="6to">6to</option>
        <option value="7mo">7mo</option>
        <option value="8vo">8vo</option>
    </select>
    <select name="turno">       
        <option value="">Turno</option>
        <option value="v">Vespertino</option>
        <option value="m">Matutino</option>
    </select>
    <br><br>

<input type="submit" name="button" value="Enviar" class="aceptar">
</form>
<?php 

 ?>
</center> 
</body>
</html>