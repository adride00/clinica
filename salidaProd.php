<?php 
	include("conectar.php");
	$d = $_POST['descripcion'];
	$c = $_POST['cantidad'];

	$sql_select = "SELECT id_producto FROM articulo WHERE descripcion = '$d'";
	$result = mysqli_query($link, $sql_select);
	$fila = mysqli_fetch_array($result); 


	$sql = "INSERT INTO movimiento (tipo,cantidad,fecha,id_producto,id_usuario,id_ecof) VALUES('salida','$c','2017-12-12','$fila[0]',2,1)";

	$consulta = mysqli_query($link,$sql);

	$sql_stock = "SELECT existencia FROM stock WHERE id_producto = '$fila[0]'";
	$stock = mysqli_query($link,$sql_stock);
	$row = mysqli_fetch_array($stock); 

	$sql_update = "UPDATE stock SET existencia='$row[0]'-'$c' WHERE id_producto = '$fila[0]'";

	$consulta2 = mysqli_query($link,$sql_update);
 ?>