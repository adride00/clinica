<?php
include("conectar.php");
if($_POST){
	$cuantos = $_POST['cuantos'];
	$stringdatos = $_POST['stringdatos'];
	$listadatos=explode('#',$stringdatos);	
	for ($i=0;$i<$cuantos ;$i++){
		list($id_estudiante,$nombre,$nota1,$nota2)=explode('|',$listadatos[$i]);

	$sql="insert into deta_entrada (id_nota,id_estudiante,nombre,nota1,nota2)
        values('','$id_estudiante','$nombre','$nota1','$nota2')";
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