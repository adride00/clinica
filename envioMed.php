<?php 
	include("conectar.php");
	$d = $_POST['descripcion'];
	$c = $_POST['cantidad'];
	$cod = $_POST['codigo'];
	$lote = $_POST['lote'];
	$fecha = $_POST['fecha'];
	
	
	
	

	$sql_select = "SELECT descripcion FROM carrito WHERE codigo = '$cod'";
	$result = mysqli_query($link,$sql_select);
	$row = mysqli_fetch_array($result);



	if($row[0]==$d){

		    $sql_carritoE = "SELECT cantidad FROM carrito WHERE descripcion = '$d'";
			$consultaE = mysqli_query($link,$sql_carritoE);
			$rowCa = mysqli_fetch_array($consultaE);

			$sql_update ="UPDATE carrito SET cantidad = '$rowCa[0]'+'$c'";
			$resultUpdate = mysqli_query($sql_update);
	}else{

		$sql = "INSERT INTO carrito (codigo,descripcion,cantidad,fecha_vencimiento,lote) VALUES('$cod','$d','$c','$fecha',$lote)";

		$consulta = mysqli_query($link,$sql);
		echo "exito";
	}
	
 ?>