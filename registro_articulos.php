<?php 
    include("validar.php");
    include("cabecera.php");
    include("nav-menu.php");  
    include("aside-menu.php");

 ?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="registro_articulos.php"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp; Agregar Articulo</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="setting_articulo.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
  </ol>
</nav>
    <div class="container theme-showcase" role="main">

      <div class="jumbotron">
        <form method="POST" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Registro Articulos</h4></center>
            <div class="form-group">
              <label class="control-label" for="num">Codigo</label>
              <input type="text" id="codigo_articulo" name="codigo_articulo" class="form-control" placeholder="Codigo">
            </div>
            

            <div class="form-group">
              <label class="control-label">Descripción</label>
              <input type="text"  id="descripcion" name="descripcion" class="form-control" placeholder="Descripción del Producto">
            </div>

            <div class="form-group">
              <label class="control-label">U/M</label><br>
              <label><input type="radio" id="radio" name="radio" value="c/u"></input>  C/U</label> <br>
              <label><input type="radio" id="radio" name="radio" value="cto"></input>  CTO</label>
              &nbsp;&nbsp;&nbsp;<label for="radio" class="error" style="display:none;"></label>
            </div>

            <div class="form-group">
              <label class="control-label">Tipo de articulo</label><br>
              <label><input type="radio" id="tipo" name="tipo" value="medicamento"></input>Medicamento</label> <br>
              <label><input type="radio" id="tipo" name="tipo" value="insumo"></input>Insumo</label>
              &nbsp;&nbsp;&nbsp;<label for="um" class="error" style="display:none;"></label>

            </div>
            
            <div class="form-group">
              <label class="control-label">Concentracion</label>
              <input type="text"  id="concentracion" name="concentracion" class="form-control" placeholder="Concentracion">
            </div>

            <div class="form-group">
              <label class="control-label">Presentacion</label>
              <input type="text"  id="presentacion" name="presentacion" class="form-control" placeholder="Presentacion">
            </div>

            <div class="form-group">
              <label class="control-label">Nivel de uso</label><br>
              <label><input type="radio" id="radio" name="nivel" value="P"></input>  P</label> <br>
              <label><input type="radio" id="radio" name="nivel" value="M"></input>  M</label>
              &nbsp;&nbsp;&nbsp;<label for="radio" class="error" style="display:none;"></label>
            </div>

            <div class="form-group">
              <label class="control-label">Prioridad</label><br>
              <label><input type="radio" id="radio" name="prioridad" value="E"></input>  E</label> <br>
              <label><input type="radio" id="radio" name="prioridad" value="A"></input>  A</label>
              &nbsp;&nbsp;&nbsp;<label for="radio" class="error" style="display:none;"></label>
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
  $codigo = $_POST["codigo_articulo"];
  $descripcion = $_POST["descripcion"];
  $um = $_POST["radio"];
  $tipo_articulo = $_POST["tipo"]; 
  $concentracion = $_POST["concentracion"];
  $presentacion = $_POST["presentacion"];
  $nivel= $_POST["nivel"];
  $prioridad = $_POST["prioridad"];

  $sql_insert = "INSERT INTO articulo(codigo,descripcion,UM,tipo,concentracion,presentacion,nivel_uso,prioridad) VALUES('$codigo','$descripcion','$um','$tipo_articulo','$concentracion','$presentacion','$nivel','$prioridad')";

  $consulta = mysqli_query($link, $sql_insert); 
  
  $sql_consulta = "SELECT id_producto from articulo where descripcion = '$descripcion'";
  $result = mysqli_query($link, $sql_consulta);
  $row = mysqli_fetch_array($result);
  $sql_stock = "INSERT INTO stock (existencia,id_producto) VALUES(0,'$row[0]')";

  $consultaStock = mysqli_query($link, $sql_stock);
  mysqli_close($link); //cerramos conexion con la base de datos
  die();
  }
  
  ?>