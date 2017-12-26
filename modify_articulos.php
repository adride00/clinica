<?php
    include("validar.php");
    include("cabecera.php");
    include("nav-menu.php");
    include("aside-menu.php");
    include("conectar.php");

    if($_GET)
    {
     $id=$_GET["id"];
     $sql=mysqli_query($link,"SELECT *FROM articulo WHERE id_producto='$id'");
     $row=mysqli_fetch_array($sql);
     $codigo=$row["codigo"];
     $descripcion=$row["descripcion"];
     $um=$row["UM"];
     $tipo=$row["tipo"];
     }
     else
     {
      $codigo="";
      $descripcion="";
     echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
     <strong>Error</strong> No se han enviado variables</div>";
     }
 ?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="setting_articulos.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
  </ol>
</nav>
    <div class="container theme-showcase" role="main">

      <div class="jumbotron">
        <form method="POST" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Modificar Articulos</h4></center>
            <div class="form-group">
              <label class="control-label" for="num">Codigo</label>
              <input type="text" id="codigo_articulo" name="codigo_articulo" class="form-control" placeholder="Codigo" value="<?php echo $codigo?>">
            </div>


            <div class="form-group">
              <label class="control-label">Descripción</label>
              <input type="text"  id="descripcion" name="descripcion" class="form-control" placeholder="Descripción del Producto" value="<?php echo $descripcion?>">
            </div>

            <div class="form-group">
              <label class="control-label">U/M</label><br>
              <label><input type="radio" id="radio" name="radio" value="C/U"></input>  C/U</label> <br>
              <label><input type="radio" id="radio" name="radio" value="CTO"></input>  CTO</label>
              &nbsp;&nbsp;&nbsp;<label for="radio" class="error" style="display:none;"></label>
            </div>

            <div class="form-group">
              <label class="control-label">Tipo de articulo</label><br>
              <label><input type="radio" id="tipo" name="tipo" value="Medicamento"></input>Medicamento</label> <br>
              <label><input type="radio" id="tipo" name="tipo" value="Insumo"></input>Insumo</label>
              &nbsp;&nbsp;&nbsp;<label for="um" class="error" style="display:none;"></label>

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
 if($_POST)
 {
   $codigo = $_POST["codigo_articulo"];
   $descripcion = $_POST["descripcion"];
   $um = $_POST["radio"];
   $tipo_articulo = $_POST["tipo"];


     $update=mysqli_query($link, "UPDATE articulo SET codigo='$codigo',descripcion='$descripcion',UM='$um',tipo='$tipo_articulo' WHERE id_producto='$id'");
     if($update)
     {
      echo "<script>
 	   location.replace('setting_articulos.php?q=$descripcion&info=modificar');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>
