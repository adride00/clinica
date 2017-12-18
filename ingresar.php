<?php
include("conectar.php");
if($_POST){
	$cuantos = $_POST['cuantos'];
	$stringdatos = $_POST['stringdatos'];
	$listadatos=explode('#',$stringdatos);	
	for ($i=0;$i<$cuantos ;$i++){
		list($codigo,$descripcion,$cantidad)=explode('|',$listadatos[$i]);

	$sql_select = "SELECT id_producto FROM articulo WHERE descripcion = '$descripcion'";
	$result = mysqli_query($link,$sql_select);
	$row = mysqli_fetch_array($result);	
		
	$sql="INSERT into movimiento (tipo,cantidad,fecha,id_producto,id_usuario,id_ecof)
        values('entrada','$cantidad','2017-12-12','$row[0]',2,1)";
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