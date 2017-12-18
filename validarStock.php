<?php 

	include("conectar.php");
	$cantidad = $_POST['b'];
	$codigo = $_POST['c'];
	
	
	$sql_stock = "SELECT s.existencia FROM stock as s JOIN articulo as a On s.id_producto = a.id_producto WHERE a.codigo = '$codigo'";

	$resultStock = mysqli_query($link,$sql_stock);
	$rowStock = mysqli_fetch_array($resultStock);

	if($rowStock[0]<$cantidad){
		echo "Stock insuficiente";

	}else{
	
		echo "exito";
	}


     

 ?>