<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>
<style>
  .thead{
    background-color: skyblue;
  }
</style>
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  <script type="text/javascript" src="DataTables/datatables.js"></script> 
<script type="text/javascript" src="DataTables/Data/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables/Data/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="DataTables/Data/css/jquery.dataTables.min.css">
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="DataTables/Data/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  
<table class="table table-bordered" id="myTable">
  <thead>
  <tr>
    <th>Descripcion</th>
    <?php 

    $x=1;
    while($x<32){
      echo '

      <th>'.$x.'</th>  

      ';
      $x++;

    } 

    ?>
    <th>total</th>
    </thead>
  </tr>
  
  <?php 
    include("conectar.php");
    $sql_articulo = "SELECT descripcion, id_producto FROM articulo";
    $result = mysqli_query($link,$sql_articulo);

    
    


    
    while($row_articulo=mysqli_fetch_array($result)){
      
      
      
      echo 
      '
        <tr>
        <td>'.$row_articulo[0].'</td>
        

        

      ';
      $x=1;
      while ($x<32) {
        $sql_cantidad = "SELECT cantidad FROM movimiento WHERE day(fecha) = '$x' and tipo = 'Consumo diario' and id_producto = '$row_articulo[1]' and fecha BETWEEN '2017-12-1' and '2017-12-31'";
        $result_cantidad = mysqli_query($link,$sql_cantidad);
        $row_cantidad = mysqli_fetch_array($result_cantidad);
         
        
         echo '<td>'.$row_cantidad[0].'</td>';
         $x++;
      
     }

     $sql_total = "SELECT sum(m.cantidad) as consumo, count(DISTINCT(day(m.fecha))) as dias FROM articulo as a JOIN movimiento as m ON a.id_producto = m.id_producto WHERE m.id_producto = '$row_articulo[1]' and m.tipo = 'Consumo diario' and m.fecha BETWEEN '2017-12-1' and '2017-12-31'";
     $result_total = mysqli_query($link,$sql_total);
     $row_total = mysqli_fetch_array($result_total);
     echo 
     '

     <td><br>'.$row_total[0].'</br></td> 

     ';

}
    


   ?>
</tr>    
</table>
    
         </div> 
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    


  <script src="js/typeahead.min.js"></script>  
  <script>
    $(document).ready(function(){
      $(".botonpdf").click(function(e){
        e.preventDefault();
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $('button').click(function(){
        var seleccion = $(this).attr('id');
        enviar(seleccion);
      });
    });
  </script>

  <script>
    function enviar(seleccion){
           $.get('envioVer.php',{id:seleccion},function(data){
              $('#aqui').html(data);
           });   



          }
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

  </script>
  </body>
 </html>

 