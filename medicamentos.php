<?php 
  include("cabecera.php");
  include("menu.php");

 ?>
    <div class="container theme-showcase" role="main">

      <div class="jumbotron">
        
        <form method="POST" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Existencias- clinica</h4></center>

            
              <table class="table">
                <tr>
                  
                  <th>
                    descripcion
                  </th>
                  
                  <th>
                    codigo
                  </th>
                  <th>
                    stock actual
                  </th>
                </tr>
                <?php 
                  include("conectar.php");

                  $sql_select = "SELECT * FROM articulo";
                  $result = mysqli_query($link,$sql_select);
                  while($mostrar=mysqli_fetch_array($result)){ 
                 ?>
                 <tr>
                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['codigo'] ?></td>
                    <td><?php echo $mostrar['stock_actual'] ?></td>
                    
                 </tr>
                  
                 <?php 

                  }
                  ?>
              </table>
            
    
      
    <?php 
      include("footer.php");
     ?>
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
  </body>
 </html>

 <?php 

 include("conectar.php");
  if($_POST){
  $fecha_entrada = $_POST["fecha_entrada"];
  $cantidad = $_POST["cantidad"];
  $nombre_articulo = $_POST["codigo_art"];

  $sql_select = "SELECT id_producto FROM articulo WHERE descripcion = '$nombre_articulo'";
  $consulta_select = mysqli_query($link, $sql_select);
  $fila = mysqli_fetch_array($consulta_select);  
  

  $sql_insert = "INSERT INTO consumo(id_articulo,consumo_diario,fecha) 
  VALUES('$fila[0]','$cantidad','$fecha_entrada')";
  $consulta = mysqli_query($link, $sql_insert); 
  
  $sql_update = "UPDATE articulo SET stock_actual = stock_actual-'$cantidad' WHERE id_producto = '$fila[0]'";
  $consulta_update = mysqli_query($link,$sql_update);

  mysqli_close($link); //cerramos conexion con la base de datos
  die();
  }

  ?>