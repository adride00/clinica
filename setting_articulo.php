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
  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="registro_articulos.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
&nbsp; Agregar Articulo</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="setting_articulo.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
  </ol>
</nav>
    
    <div class="row">
      <table class="table table-hover ">
                <tr class="thead">
                  
                  <th >
                    Codigo
                  </th>
                  
                  <th>
                    Descripcion
                  </th>
                  <th>
                    UM
                  </th>
                  <th>
                    Categoria
                  </th>
                </tr>
                <?php 
                  include("conectar.php");


                  $sql_select = "SELECT codigo, descripcion, UM, tipo from articulo"; 
                  $result = mysqli_query($link,$sql_select);
                  
                  while($mostrar=mysqli_fetch_array($result)){ 
                 ?>
                 <tr>
                    <td><?php echo $mostrar['codigo'] ?></td>
                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['UM'] ?></td>
                    <td><?php echo $mostrar['tipo'] ?></td>
                 </tr>
                  
                 <?php 

                  }
                  ?>
              </table>
    </div>

    
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