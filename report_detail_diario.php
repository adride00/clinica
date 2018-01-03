<style type="text/css">
<!--
    table.page_header {width: 100%;     border: none; background-color: #FFFFFF; text-align:right;font-family:helvetica,serif; position: absolute; top: 28px;}
    table.page_footer {width: 100%; border: none; background-color: #A9A9A9;  padding: 2mm;color:#FFFFFF; font-family:helvetica,serif; font-weight:bold;}
    div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
    ul.main { width: 95%; list-style-type: square; }
    ul.main li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 20mm}
    h3 { text-align:right; font-size: 14px; color:#000080}
    table { vertical-align: middle; }
    tr    { vertical-align: middle; }
    p {margin: 0px 5px 0px 5px;}
    span {margin: 5px;}
    img { border: 1px #000000;}
-->

</style>
<page backtop="70mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 15pt" backimgx="center" backimgy="bottom" backimgw="100%">
    <page_header>

        <table class="page_header" >
                <tr>
                  <td align=left style="width: 10%; color: #444444;" >
                      <img style="width: 10%;" src="./img/escudo.png">
                  </td>
                </tr>
                <tr>
                  
                  <td align=right style="width: 10%; color: #444444;" >
                      <img style="width: 15%;" src="./img/logosv.png">
                  </td>
                </tr>
                <tr>
                  <td align=center style="width:95%; "><b>MINISTERIO DE SALUD</b></td>
                </tr>
                <tr>
                  <td align=center style="width:95%; "><h5>DIRECCION DE REGULACION</h5></td>
                </tr>
                <tr>
                  <td align=center style="width:95%; "><h5>UNIDAD REGULADORA DE MEDICAMENTOS E INSUMOS MEDICOS</h5></td>
                </tr>
                <tr>
                  <td align=center style="width:95%; "><h5>REPORTE MENSUAL DE CONSUMO Y EXISTENCIAS DE MEDICAMENTOS, PRIMER NIVEL DE ATENCION, 10° VERSION LISTADO OFICIAL</h5></td>
                </tr>
                <tr>
                  
                </tr>
             


        </table>
        
       

        <table border="0.5px" align="center" cellspacing="0"  style="width: 100%; border:none; text-align: center; font-size: 13pt; color:#000; font-family:helvetica,serif;">
    
        
  <tr>
    <th style="width:3%">N°</th>
    <th style="width:6%">Codigo</th>
    <th style="width:18%">Descripcion</th>
    <th style="width:3%">U/M</th>
    <?php 

    $x=1;
    while($x<32){
      echo '

      <th style="width:2.05%">'.$x.'</th>  

      ';
      $x++;

    } 

    ?>
    <th style="width:7%">Consumo total</th>
  </tr>
</table>

    </page_header>
    <page_footer>
        <table class="page_footer">

            <tr>
               <td style="width:30%; "><b>FECHA DE IMPRESION:</b> <?php echo date("d-m-Y H:i:s");?></td>
                
                <td style="width: 30%; text-align: center">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td align=center style="width:40%; "><b>FECHA: </b><?php echo  ED($fecha1)?> <b>HASTA</b> <?php echo  ED($fecha2) ?></td>
            </tr>
        </table>
    </page_footer>

  <?php
  function ED($fecha)
  {
      $dia = substr($fecha, 8, 2);
      $mes = substr($fecha, 5, 2);
      $a = substr($fecha, 0, 4);
      $fecha = "$dia-$mes-$a";
      return $fecha;
  }

   include('conectar.php');
    $fecha1= $_GET['fecha1'];
    $fecha2= $_GET['fecha2'];


?>
<table border="0.5px" cellspacing="0"  style="width: 100%; border:none; text-align: center; font-size: 13pt; color:#000; font-family:helvetica,serif; position: absolute; right: 37px;"> 
     <?php 
    include("conectar.php");
    $sql_articulo = "SELECT descripcion, id_producto, codigo, UM FROM articulo";
    $result = mysqli_query($link,$sql_articulo);

    
    $i=1;
    while($row_articulo=mysqli_fetch_array($result)){
        
      
     
      echo '
      
         <tr>
        <td style="width:3.1%">'.$i.'</td>
        <td style="width:6.5%">'.$row_articulo[2].'</td>
        <td style="width:19%">'.$row_articulo[0].'</td>
        <td style="width:3.2%">'.$row_articulo[3].'</td>
        
        
        
          ';
          
        
          ?>
         
 


<?php  
    $x=1;
     while($x<32){
      $sql_cantidad = "SELECT cantidad FROM movimiento WHERE day(fecha) = '$x' and tipo = 'Consumo diario' and id_producto = '$row_articulo[1]' and fecha BETWEEN '$fecha1' and '$fecha2'";
        $result_cantidad = mysqli_query($link,$sql_cantidad);
        $row_cantidad = mysqli_fetch_array($result_cantidad);
         echo 
         '
       
         <td style="width:2.178%">'.$row_cantidad[0].'</td>
        
         ';
         $x++;
      }

      $sql_total = "SELECT sum(m.cantidad) as consumo, count(DISTINCT(day(m.fecha))) as dias FROM articulo as a JOIN movimiento as m ON a.id_producto = m.id_producto WHERE m.id_producto = '$row_articulo[1]' and m.tipo = 'Consumo diario' and m.fecha BETWEEN '$fecha1' and '$fecha2'";
     $result_total = mysqli_query($link,$sql_total);
     $row_total = mysqli_fetch_array($result_total);
     echo 
     '

     <td style="width:7.3%"><b>'.$row_total[0].'</b></td> 

     ';


     $i++;
echo '</tr>';
  
}

      ?>

    </table>  

</page>






































































