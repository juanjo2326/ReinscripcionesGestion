<?php
session_start();
unset($_SESSION['Usuario']);
unset($_SESSION['noControl']);
unset($_SESSION['usuario']);
unset($_SESSION['contra']);
unset($_SESSION['nombres']);
unset($_SESSION['apellidoP']);
unset($_SESSION['apellidoM']);
unset($_SESSION['semestre']);
unset($_SESSION['carrera']);
unset($_SESSION['idCarrera']);
header("Location: ./index.php");
?>