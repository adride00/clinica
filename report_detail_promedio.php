<style type="text/css">
<!--
    table.page_header {width: 100%;     border: none; background-color: #FFFFFF; text-align:right;font-family:helvetica,serif;}
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
        <table style="border: 1px solid black">
        	<tr>
        		<td style="width:10%">
        			<b>REGION:</b><input type="text">
        		</td style="width:10%">
        		<td>
        			<b></b>
        		</td>
        		<td style="width:5%">
        			<b>SIBASI:</b><input type="text"> 
        		</td>
        		<td style="width:5%">
        			<b>ELABORO:</b><input type="text">
        		</td>
        		<td style="width:30%">
        			<b>FIRMA:</b><input type="text">
        		</td>
        		<td style="width:10%">
        			<b>CARGO:</b><input type="text">
        		</td>
        	</tr>
        	
        </table>
        <table style="margin-top: 10px; border: 1px solid black"">
        	<tr>
        		<td>
        			<b>
        				CODIGO ESTABLECIMIENTO:
        			</b><input type="text">
        		</td>
        		<td>
        			<b>
        				NOMBRE:
        			</b><input type="text">
        		</td>
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

     <br>
    <table align="center" cellspacing="1" style="width: 100%; border: solid 1px black; background: #A9A9A9; text-align: center; font-size: 11pt; color:#FFFFFF; font-family:helvetica,serif;">
        <tr >
            <th style="width:5%">N&deg;</th>
            <th style="width: 9%">Codigo</th>
            <th style="width: 40%">Descripcion</th>
            <th style="width: 10%">Existencia</th>
            <th style="width: 10%">Consumo Promedio Mensual</th>
         
           


        </tr>
    </table>

<?php
    include('conectar.php');
    $sql= "SELECT a.codigo, a.descripcion, s.existencia, sum(m.cantidad) as consumo, count(DISTINCT(day(m.fecha))) as dias FROM articulo as a JOIN movimiento as m ON a.id_producto = m.id_producto JOIN stock as s ON s.id_producto = m.id_producto WHERE m.tipo = 'Consumo diario' and date(fecha) BETWEEN '$fecha1' and '$fecha2' group by a.descripcion
        LIMIT 0 , 30";

    $query=mysqli_query($link, $sql);

    $i=1;
    while ($row = mysqli_fetch_array($query)) {
        ?>
    <table border="0.5px" align="center" cellspacing="0"  style="width: 100%; border:none; text-align: center; font-size: 13pt; color:#000; font-family:helvetica,serif;">
        <?php $promedio = number_format($row['consumo']/$row['dias'], 0,"",""); ?>
        <tr>
	    <td style="width:5%; height:5%"><?php echo $i; ?></td>
           <td style="width:9%"><?php echo $row['codigo']; ?></td>
            <td style="width:40%"><?php echo utf8_decode($row['descripcion']); ?></td>
           <td style="width:10%"><?php echo utf8_decode($row['existencia']); ?></td>
           <td style="width:10%"><?php echo utf8_decode($promedio); ?></td>
           
           
        </tr>
    </table>
<?php
    $i++;
    }
?>


</page>
