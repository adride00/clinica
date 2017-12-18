<?php
	include("validar.php"); 
	include("conectar.php");

		$sql_carrito = "SELECT descripcion, cantidad FROM carrito";
		$consulta = mysqli_query($link,$sql_carrito);


		$sql_info = "SELECT * FROM tmp_datos";
		$resultDatos = mysqli_query($link,$sql_info);
		$row = mysqli_fetch_array($resultDatos);

		$sql_eco = "SELECT id_ecof FROM ecof WHERE nombre = '$row[2]'";
			$resultEco = mysqli_query($link,$sql_eco);
			$rowEco = mysqli_fetch_array($resultEco);

		$sql_user = "SELECT id_usuario FROM usuario WHERE nombre = '".$_SESSION["nombre"]."'";
		$resultUser = mysqli_query($link,$sql_user);	
		$rowUser = mysqli_fetch_array($resultUser);

		while($rowCa = mysqli_fetch_array($consulta)){

			$descripcion = $rowCa['descripcion'];
			$cantidad = $rowCa['cantidad'];

			$sql_produc = "SELECT id_producto FROM articulo WHERE descripcion = '$descripcion'";
			$resultProd = mysqli_query($link,$sql_produc);
			$rowProd = mysqli_fetch_array($resultProd);

			$sql_existencia = "SELECT existencia FROM stock WHERE id_producto = '$rowProd[0]'";
			$resultExistencia = mysqli_query($link,$sql_existencia);
			$rowExistencia = mysqli_fetch_array($resultExistencia);
			
			

			$sql_update = "UPDATE stock SET existencia = '$rowExistencia[0]'-'$rowCa[1]' WHERE id_producto = '$rowProd[0]'";

			$resultUpdate = mysqli_query($link,$sql_update);

			$insercion = "INSERT INTO movimiento (tipo,cantidad,fecha,id_producto,id_usuario,id_ecof,numPed) VALUES('Envio','$cantidad','$row[1]','$rowProd[0]','$rowUser[0]','$rowEco[0]','$row[3]')";

			$ejecutar = mysqli_query($link,$insercion);	

		}


		

		$sql_clean = "DELETE FROM carrito";
		$resultClean = mysqli_query($link,$sql_clean);

		$sql_DelTmp = "DELETE FROM tmp_datos";
		$resultDelTmp = mysqli_query($link,$sql_DelTmp);



		 header("Location:dashboard.php"); 


			//for ($i=0;$i<$num ;$i++){
		/*
		$sql_carrito = "SELECT * FROM carrito";
		$resultCarrito = mysqli_query($link,$sql_carrito);
		$rowCarrito = mysqli_fetch_array($resultCarrito);
		$tableRow = mysqli_num_row($resultCarrito);	

		$col = mysqli_fetch_assoc($resultCarrito);

		*/

		/*
		$sql_sum = "SELECT sum(cantidad) FROM carrito WHERE descripcion = '$descripcion'";
		$resultSum = mysqli_query($link,$sql_sum);
		$rowSum = mysqli_fetch_array($resultSum);
	
		
		$sql="INSERT INTO movimiento (tipo,cantidad,fecha,id_producto,id_usuario,id_ecof,numPed)
        VALUES('Envio','$rowCarrito','$fila[1]','$row[0]',1,'$rowEco[0]','$fila[3]')";
		
		$insertar=mysqli_query($link,$sql);
*/
//	}
 ?>
