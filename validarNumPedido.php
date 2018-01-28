<?php 

	include("conectar.php");
	$numPed = $_POST['num'];

	
	
	$sql = "SELECT numPed FROM movimiento WHERE numPed = '$numPed'";

	$result = mysqli_query($link,$sql);

	$row = mysqli_fetch_array($result);

	if($row){
		echo "1";

	}else{
	
		echo "0";
	}


 ?>