<?php 
    include("validar.php");
    include("cabecera.php");
    include("nav-menu.php");  
    include("aside-menu.php");

 ?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
      
    
    </div> 
  </div>    
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
  <script src="js/typeahead.min.js"></script>  
  <script>
      $(document).ready(function(){
 
 $('#um').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"ajax_categoria.php",
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
  $nombre = $_POST["nombreE"];
  $direccion = $_POST["direccion"];
  $telefono = $_POST["telefono"];
  $encargado = $_POST["encargado"];
   
  $sql_insert = "INSERT INTO ecof(nombre,direccion,telefono,encargado) VALUES('$nombre','$direccion','$telefono','$encargado')";

  $consulta = mysqli_query($link, $sql_insert); 
  
  mysqli_close($link); //cerramos conexion con la base de datos
  die();
  }
  
  ?>