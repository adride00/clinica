<?php 
$i++;

      $x=1;
      while ($x<32) {
        $sql_cantidad = "SELECT cantidad FROM movimiento WHERE day(fecha) = '$x' and tipo = 'Consumo diario' and id_producto = '$row_articulo[1]' and fecha BETWEEN '2017-12-1' and '2017-12-31'";
        $result_cantidad = mysqli_query($link,$sql_cantidad);
        $row_cantidad = mysqli_fetch_array($result_cantidad);
         
        
         echo 
         '
        
         <td style="width:2%">'.$row_cantidad[0].'</td>
		
         ';
         $x++;
      
     


 ?>     