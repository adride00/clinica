<?php 

$connect = mysqli_connect("localhost", "root", "adride", "mydb");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM categoria WHERE nombre LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["nombre"];
 }
 echo json_encode($data);
}

	/*include "conectar.php";

	$sql = "select descripcion from articulo where codigo like '%".$_POST['name']."%'";
	$array = $link->query($sql);

	foreach ($array as $key) {
		# code...
	
 ?>

<div id="user"><?php echo "*".$key['descripcion'] ?>
	
</div>

 <?php 

  }

*/
  ?>