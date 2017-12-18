<?php 

	   $server="localhost"; //Por default 
       $user="root";       //El usuario de la base de datos no usar root salvo para pruebas 
       $pass="adride";         //Clave del usuario que se conectara con la base de datos 
       $db="dbclinic";
       $link = mysqli_connect($server,$user,$pass,$db); 
	
	if ($link == false) {
		echo "Error: No se puede conectar al servidor".mysqli_connect_error();
		exit;
	}
 ?>
