<?php
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");
  include("aside-menu.php");
  include("conectar.php");
?>
<style>
	.thead{
		background-color: skyblue;
	}

  #size_img{
    height: 34px;
    width: 31px;
  }
</style>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="registro_articulos.php"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp; Agregar Articulo</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="setting_articulos.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
  </ol>
</nav>

<div class="container">
 <main role="main">
  <div class="jumbotron">
   <form method="GET" role="form" id="formulario">

  <div class="row clearfix">
   <div class="col-md-8">
    <input type="text" id="q" name="q" class="form-control" placeholder="Ingrese consulta por Codigo o Descripción"
    value="<?php if(isset($_GET["q"]))echo $_GET["q"]; ?>">
   </div>
   <div class="col-md-4">
    <button type="submit" class="btn btn-primary">Buscar</button>
   </div>
   </div>
</form>

   <?php
   if(isset($_GET["action"])){
      if($_GET["action"]== "del"){
        mysqli_query($link,"delete from articulo where id_producto='$_GET[id]'");
        echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
               <strong>Exito</strong>
               Registro eliminado.
              </div>";
             }
    }

 if(isset($_GET["q"])){

$q = $_GET["q"];
$query = @mysqli_query($link,"SELECT * FROM articulo WHERE codigo LIKE '%$q%' OR descripcion LIKE '%$q%' order by id_producto");

if(!@mysqli_num_rows($query)){
  echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
         <strong>Error</strong>
         No se produjeron resultados.
        </div>";
}else{
  $nrows = mysqli_num_rows($query);

  if (isset($_GET["info"])){
    if ($_GET["info"] == "add")
        echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
         <strong>Exito</strong>
        Registro agregado.
       </div>";

    if ($_GET["info"] == "modificar")
      echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
          <strong>Exito</strong>
        Registro Modificado.
       </div>";
  }else{

         echo "<br><a href=\"#\">
                         Registros encontrados:
                     <span class=\"badge\">$nrows</span>
                     </a>";
  }

  echo "<p></p>
  <center>
              <div class=\"table-responsive\">
  <table class=\"table table-bordered table-hover\" >
  <tr class=\"success\">
    <th>ID </th>
    <th>Codigo</th>
    <th>Descripción</th>
    <th>UM</th>
    <th>Tipo</th>
    <th>Acciones</th>
  </tr>";
  while($data = mysqli_fetch_array($query)){

    echo "<tr class=\"warning\">
      <td>$data[0]</td>
      <td>$data[codigo]</td>
      <td>$data[descripcion]</td>
      <td>$data[UM]</td>
      <td>$data[tipo]</td>
      <td>

      <a href='modify_articulos.php?id=$data[0]'><img src='img/user_edit.png' border=0 title='Modificar' id='size_img'></a>

      <a href=# onclick=\"javascript:if(window.confirm('¿Desea eliminar el $data[tipo] $data[0]'))
      {location.replace('$_SERVER[PHP_SELF]?action=del&id=$data[0]&q=$q')}\">
      <img src='img/delete_user.png' border=0 title='Eliminar' id='size_img'></a></td>
    </tr>	";
  }
  echo "</table></center><br></br>

  ";

}
}
?>


         </div>
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>

  <script src="js/typeahead.min.js"></script>
  </body>
 </html>

 <?php



  ?>
