<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Horario</title>
</head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">

<body>    
	<center>
<header>
    <h1>Horario</h1>
    </header>

<h3>Introduzca la clave (<strong id="m">M</strong>) de la materia y el codigo (<strong id="p">P</strong>) del profesor para dicha materia al dia y hora correspondiente (puede dejar horas en blanco) </h3>
<div style="display: inline-flex;">

<div class="hor" id="es"><br>

<form id="formulario" method="get">
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

        , Periodo escolar:<input type="text" name="periodo" placeholder="Enero-Junio 2020" required="true" class="h" id="periodo">, <select name="turno">		
		<option value="">Turno</option>
 		<option value="">Vespertino</option>
		<option value="">Matutino</option>
	</select><br>
        

	<table style="width: 100%">
		<tr>
			<th style="width: 51px;">HORA</th>
			<th>LUNES</th>
			<th>MARTES</th>
			<th>MIERCOLES</th>
			<th>JUEVES</th>
			<th>VIERNES</th>
		</tr>
<?php
$datos[]="";
$L=0;
    for ($i=1; $i < 9; $i++) { 

    echo '
    <tr class="coco">
    <td><label>'.($i+6).'-'.($i+7).'</label></td>
    <td><input type="text" name="M-L'.$i.'" placeholder="M-L'.$i.'" class="h" id="m">
    	<input type="text" name="P-L'.$i.'" placeholder="P-L'.$i.'" class="h" id="p"></td>
    <td><input type="text" name="M-Ma'.$i.'" placeholder="M-Ma'.$i.'" class="h" id="m">
    	<input type="text" name="P-Ma'.$i.'" placeholder="P-Ma'.$i.'" class="h" id="p"></td>
    <td><input type="text" name="M-Mi'.$i.'" placeholder="M-Mi'.$i.'" class="h" id="m">
    	<input type="text" name="P-Mi'.$i.'" placeholder="P-Mi'.$i.'" class="h" id="p"></td>
    <td><input type="text" name="M-J'.$i.'" placeholder="M-J'.$i.'" class="h" id="m">
    	<input type="text" name="P-J'.$i.'" placeholder="P-J'.$i.'" class="h" id="p"></td>
    <td><input type="text" name="M-V'.$i.'" placeholder="M-V'.$i.'" class="h" id="m">
    	<input type="text" name="P-V'.$i.'" placeholder="P-V'.$i.'" class="h" id="p"></td>
    
    </tr>
    ';
}
?>	
	</table>

<input type="submit" name="button" value="Buscar" class="aceptar">
</form>
</div>



<div class="hor" id="es2">
	

	<br>

<table >
			<th colspan="4"><strong id="m">MATERIAS</strong></th>
            <tr>
            	<td style="width: 95px;"><strong id="m">M</strong></td>
                <td >Nombre</td>
                <td style="width: 70px;">Creditos</td>
                <td style="width: 75px;">Semestre</td>
            </tr>

<?php 
    $url="http://127.0.0.1:8181/reinscripciones/materias";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
for ($i=0; $i <$long ; $i++) { 
	$idMateria=$datos[$i]['idMateria'];
    $nombre=$datos[$i]['nombre'];
    $creditos=$datos[$i]['creditos'];
    $semestre=$datos[$i]['semestre'];
        echo '
            <tr  class="coco">
            	<td><label>'.$idMateria.'</label></td>
                <td><label>'.$nombre.'</label></td>
                <td><label>'.$creditos.'</label></td>
                <td><label>'.$semestre.'</label></td>
            </tr>';
}
?>
        </table>
<br>
            <table cellspacing="15px">
            	<th colspan="4"><strong id="p">PROFESORES</strong></th>
                <tr>
                    <td ><strong id="p">P</strong></td>
                    <td>Nombre</td>
                </tr>
<?php 
    $url="http://127.0.0.1:8181/reinscripciones/docentes";
    $json=file_get_contents($url);
    $datos=json_decode($json,true);
    $long=count($datos);
        for ($i=0; $i < $long; $i++) { 
            $idDocente=$datos[$i]['idDocente'];
            $nombre=$datos[$i]['nombre'];
            $apellidoP=$datos[$i]['apellidoP'];
            $apellidoM=$datos[$i]['apellidoM'];
            echo '
                <tr class="coco">
                    <td><label>'.$idDocente.'</label></td>
                    <td><label>'.$nombre.'</label>
                    <label>'.$apellidoP.'</label>
                    <label>'.$apellidoM.'</label></td>
                </tr>
            ';
}
?>
</table>


</div>
</div></center>
</body>
</html>