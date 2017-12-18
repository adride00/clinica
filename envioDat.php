<?php 
	include("conectar.php");
	$fecha = $_POST['fecha'];
	$numPed = $_POST['numPed'];
	$eco = $_POST['eco'];
	
	
	
	$sql = "INSERT INTO tmp_datos (fecha,eco,numPed) VALUES('$fecha','$eco','$numPed')";

	$consulta = mysqli_query($link,$sql);

	
 ?>