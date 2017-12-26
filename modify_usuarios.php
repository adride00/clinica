<?php
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");
  include("aside-menu.php");
  include("conectar.php");


  if($_GET)
  {
   $id=$_GET["id"];
   $sql=mysqli_query($link,"SELECT *FROM usuario WHERE id_usuario='$id'");
   $row=mysqli_fetch_array($sql);
   $nombre=$row["nombre"];
   $usuario=$row["usuario"];
   $clave=$row["clave"];
   }
   else
   {
    $usuario="";
    $nombre="";
   echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
   <strong>Error</strong> No se han enviado variables</div>";
   }
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="setting_user.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
        </ol>
      </nav>

    <div class="container theme-showcase" role="main">

      <div class="jumbotron">

        <form method="POST" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Modificar Usuario</h4></center>






            <div class="form-group">
              <label class="control-label" for="num">Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombre?>">
            </div>


            <div class="form-group">
              <label class="control-label">Usuario</label>
              <input type="text"  id="usuario" name="usuario" class="form-control" placeholder="Nombre de Usuario" value="<?php echo $usuario?>">
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
 if($_POST)
 {
   $nombre=$_POST["nombre"];
   $usuario=$_POST["usuario"];
   $clave=$_POST["clave"];


     $update=mysqli_query($link, "UPDATE usuario SET nombre='$nombre',usuario='$usuario',clave='$clave' WHERE id_usuario='$id'");
     if($update)
     {
      echo "<script>
 	   location.replace('setting_user.php?q=$nombre&info=modificar');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>
