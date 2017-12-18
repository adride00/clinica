<?php
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");
  include("aside-menu.php");
  include("conectar.php");


  if($_GET)
  {
   $id=$_GET["id"];
   $sql=mysqli_query($link,"SELECT *FROM ecof WHERE id_ecof='$id'");
   $row=mysqli_fetch_array($sql);
   $nombre=$row["nombre"];
   $direccion=$row["direccion"];
   $telefono=$row["telefono"];
   $encargado=$row["encargado"];
   }
   else
   {
    $nombre="";
    $direccion="";
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
           <center> <h4 class="control-label">Modificar ECOSF</h4></center>

           <div class="form-group">
             <label class="control-label">Nombre ECOSF</label>
             <input type="text"  id="nombreE" name="nombreE" class="form-control" placeholder="Nombre ECOSF" value="<?php echo $nombre?>">
           </div>

           <div class="form-group">
             <label class="control-label">Direccion</label>
             <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="Dirección" value="<?php echo $direccion?>">
           </div>

           <div class="form-group">
             <label class="control-label">Telefono</label>
             <input type="text"  id="telefono" name="telefono" class="form-control" placeholder="Teléfono">
           </div>

           <div class="form-group">
             <label class="control-label">Encargado</label>
             <input type="text"  id="encargado" name="encargado" class="form-control" placeholder="Encargado">
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
   $nombre = $_POST["nombreE"];
   $direccion = $_POST["direccion"];
   $telefono = $_POST["telefono"];
   $encargado = $_POST["encargado"];


     $update=mysqli_query($link, "UPDATE ecof SET nombre='$nombre',direccion='$direccion',telefono='$telefono',encargado='$encargado' WHERE id_ecof='$id'");
     if($update)
     {
      echo "<script>
 	   location.replace('setting_ecosf.php?q=$nombre&info=modificar');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>
