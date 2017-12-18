<?php

  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");

include("conectar.php");
if($_POST){
	$cuantos = $_POST['cuantos'];
	$stringdatos = $_POST['stringdatos'];
	$listadatos=explode('#',$stringdatos);	
	for ($i=0;$i<$cuantos ;$i++){
		list($codigo,$descripcion,$cantidad)=explode('|',$listadatos[$i]);

	$sql_produc = "SELECT id_producto FROM articulo WHERE descripcion = '$descripcion'";
	$result = mysqli_query($link,$sql_produc);
	$row = mysqli_fetch_array($result);	

	$sql_datos = "SELECT * FROM tmp_datos";
	$resultData = mysqli_query($link,$sql_datos);
	$fila = mysqli_fetch_array($resultData);

	$sql_carrito = "SELECT * FROM carrito";
	$resultCarrito = mysqli_query($link,$sql_carrito);
	$rowCarrito = mysqli_fetch_array($resultCarrito);

	$sql_sum = "SELECT sum(cantidad) FROM carrito WHERE descripcion = '$descripcion'";
	$resultSum = mysqli_query($link,$sql_sum);
	$rowSum = mysqli_fetch_array($resultSum);

	$sql_eco = "SELECT id_ecof FROM ecof WHERE nombre = '$fila['eco']'";
	$resultEco = mysqli_query($link,$sql_eco);
	$rowEco = mysqli_fetch_array($resultEco);
	
	$sql="INSERT INTO movimiento (tipo,cantidad,fecha,id_producto,id_usuario,id_ecof,numPed)
        VALUES('Envio','$rowSum[0]','$fila[1]','$row[0]',1,'$rowEco[0]','$fila[3]')";
	$insertar=mysqli_query($link,$sql);
	if($insertar)
	{
		 $xdatos['msg']='OK';

	}
	else
	{
		$xdatos['msg']='NO';
	}



	}

	echo json_encode($xdatos);

}

?>