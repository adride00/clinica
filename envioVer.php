<?php 
	include("conectar.php");
	$id = $_GET['id'];

echo '

<div class="page-header">
  <h3>Codigo Documento<small> # '.$id.'</small></h3>
</div>

';


$sql_ped = "SELECT * FROM movimiento WHERE numPed = '$id'";
$resultPed = mysqli_query($link,$sql_ped);
$row = mysqli_fetch_array($resultPed);	

	$tabla= '
		 <table class="table table-active">
<tr class="thead">
	<td>Codigo</td>
	<td>Descripcion</td>
	<td>Cantidad</td>
	<td>Tipo</td>
</tr>




	';

	$sql_join = "SELECT a.codigo, a.descripcion, m.cantidad, m.tipo

FROM articulo as a

JOIN movimiento as m

ON a.id_producto = m.id_producto

WHERE m.numPed = '$id'";

$resultJoin = mysqli_query($link,$sql_join);

while($rowJoin = mysqli_fetch_array($resultJoin)){

	$tabla.= '
<tbody id="tbody">
	<tr>
		<td>'.$rowJoin[0].'</td>
		<td>'.$rowJoin[1].'</td>
		<td>'.$rowJoin[2].'</td>
		<td>'.$rowJoin[3].'</td>
	</tr>
</tbody>


	';


}
$tabla.='</table>';
echo $tabla;
 ?>


