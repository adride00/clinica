<?php 
    include("validar.php");
    include("cabecera.php");
    include("nav-menu.php");  
    include("aside-menu.php");

 ?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="registro_eco.php"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp; Agregar ECO</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="crud_eco.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
  </ol>
</nav>
    <div class="container theme-showcase" role="main">

      <div class="jumbotron">
        <form method="POST" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Registro ECO</h4></center>
            
            

            <div class="form-group">
              <label class="control-label">Nombre ECO</label>
              <input type="text"  id="nombreE" name="nombreE" class="form-control" placeholder="Descripción del Producto">
            </div>

           <div class="form-group">
              <label class="control-label">Direccion</label>
              <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="Descripción del Producto">
            </div>

            <div class="form-group">
              <label class="control-label">Telefono</label>
              <input type="text"  id="telefono" name="telefono" class="form-control" placeholder="Descripción del Producto">
            </div>
            
            <div class="form-group">
              <label class="control-label">Encargado</label>
              <input type="text"  id="encargado" name="encargado" class="form-control" placeholder="Descripción del Producto">
            </div>

              <button type="submit" class="btn btn-primary">Enviar</button> <input type="reset" class="btn btn-primary">
          </fieldset>
      </form>
    </div>
      
    
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