<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>

  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="usuarios.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
          &nbsp; Agregar usuario</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="setting_user.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
        </ol>
      </nav>

    <div class="container theme-showcase" role="main">

      <div class="jumbotron">
        
        <form method="POST" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Crear Usuario</h4></center>

            
  
   
          

            <div class="form-group">
              <label class="control-label" for="num">Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
            </div>
            

            <div class="form-group">
              <label class="control-label">Usuario</label>
              <input type="text"  id="usuario" name="usuario" class="form-control" placeholder="Cantidad">
            </div>

            <div class="form-group">
              <label class="control-label">Contraseña</label><br>
              <input type="password" id="clave" name="clave" class="form-control">
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
  $nombre = $_POST["nombre"];
  $usuario = $_POST["usuario"];
  $clave = $_POST["clave"];
  $sql_insert = "INSERT INTO usuario(nombre,usuario,clave) 
  VALUES('$nombre','$usuario','$clave')";
  $consulta = mysqli_query($link, $sql_insert);   
  
  mysqli_close($link); //cerramos conexion con la base de datos
  die();
  }

  ?>