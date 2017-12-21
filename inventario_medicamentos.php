<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  <script type="text/javascript" src="DataTables/datatables.js"></script> 
<script type="text/javascript" src="DataTables/Data/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables/Data/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="DataTables/Data/css/jquery.dataTables.min.css">
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="DataTables/Data/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    

        <div class="panel panel-info">
    

      
      <table class="table table-hover" id="myTable">
                <thead>
                <tr>
                  
                  
                  
                  <th>
                    Descripcion
                  </th>
                  <th>
                    Stock
                  </th>
                 
                </tr>
                </thead>
                <?php 
                  include("conectar.php");

                    
                  $sql_select = "SELECT s.existencia, a.descripcion

                                FROM stock as s

                                JOIN articulo as a

                                ON s.id_producto = a.id_producto"; 
                  $result = mysqli_query($link,$sql_select);
                  
                  while($mostrar=mysqli_fetch_array($result)){ 
                 ?>
                 <tr>

                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['existencia'] ?></td>
                    
                    
                 </tr>
                  
                 <?php 

                  }
                  ?>
              </table>
    


      </div>
         </div> 
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    
  <script src="js/typeahead.min.js"></script>  
  <script>
      $(document).ready(function(){
 
 $('#codigo_art').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"ajax.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});

      /*$(document).ready(function(){
        $('#codigo_articulo').keyup(function(){
          var name = $(this).val();
          $.post('ajax.php', {name:name, cache:false}, function(data){
              $('div#display').css({'display': 'block'});
              $('div#display').html(data);
          });
        });
      }); */
    </script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
 


<!-- Script para controlar funciones de la tabla -->
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
  </body>
 </html>

 <?php 

 include("conectar.php");
  if($_POST){
  $fecha_entrada = $_POST["fecha_entrada"];
  $cantidad = $_POST["cantidad"];
  $fecha_vencimiento = $_POST["fecha_vencimiento"];
  $nombre_articulo = $_POST["codigo_art"];
  $sql_select = "SELECT id_producto,descripcion FROM articulo WHERE descripcion = '$nombre_articulo'";
  $consulta_select = mysqli_query($link, $sql_select);

  $fila = mysqli_fetch_array($consulta_select);  
  echo $fila[0];
  $sql_insert = "INSERT INTO entradas(id_producto,fecha_entrada,cantidad,fecha_vencimiento) 
  VALUES('$fila[0]','$fecha_entrada','$cantidad','$fecha_vencimiento')";
  $consulta = mysqli_query($link, $sql_insert); 
  
  $sql_update = "UPDATE articulo SET stock_actual = stock_actual+'$cantidad' WHERE id_producto = '$fila[0]'";
  $consulta_update = mysqli_query($link,$sql_update);
  mysqli_close($link); //cerramos conexion con la base de datos
  die();
  }

  ?>