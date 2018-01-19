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
  


<link rel="stylesheet" href="DataTables/Data/css/jquery.dataTables.min.css">


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="usuarios.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
&nbsp; Agregar usuario</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="setting_user.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
  </ol>
</nav>
    
    <div class="theme-showcase" role="main">

      <div class="jumbotron">
        

        
          <fieldset>
           <center> <h4 class="control-label">Usuarios Registrados</h4></center>

            <table id="myTable" class="table table-info table-hover">
              <thead>
            <tr>
              
                <th>Nombre</td>
                <th>Usuario</td>
                <th>Tipo de usuario</td>
              
            </tr>  
            </thead>
           <?php 

              include("conectar.php");
              $sql_usuarios = "SELECT nombre,usuario,tipo_usuario FROM usuario";
              $result_usuario = mysqli_query($link,$sql_usuarios);

              while($row_usuario=mysqli_fetch_array($result_usuario)){

              

            ?>
            <tr>
              <td><?php echo $row_usuario['nombre']; ?></td>
              <td><?php echo $row_usuario['usuario']; ?></td>
              <td><?php echo $row_usuario['tipo_usuario']; ?></td>
            </tr>
            <?php } ?>

    
            </table>  
          </fieldset>
      
    </div>
    
    </div> 
    
         </div> 
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    <script src="peticionUser.js"></script>
  <script src="js/typeahead.min.js"></script>  
  <script>
      $(document).ready(function(){
 
 $('#codigo_art').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"ajaxUser.php",
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
    <script>
       $(document).ready(function(){


                 
          $('button').click(function(){
            var clase = $(this).attr('id');
            var selDesc = '#' + clase + ' #desc'; 
            var selCant = '.' + clase;
            var selCode = '#' + clase + ' #code';
            var descripcion = $(selDesc).text();
            var cantidad = $(selCant).val()
            var codigo = $(selCode).text()
            
              
            if(cantidad){
              

                
              agregarDatos(codigo,cantidad,descripcion);
              //validarStock(cantidad,selCant,codigo);
            }
              
            
              
            
            });
            
          });



       
       


    </script>
      <script>
                function agregarDatos(codigo,cantidad,descripcion){
          
          cadena = "codigo=" + codigo + "&descripcion=" + descripcion + "&cantidad=" +cantidad;
          $.ajax({
            type:"POST",
            url:"envioMed.php",
            data:cadena,
            succes:function(resp){
              if(resp){
                alert("Agregado");
              }else{
                aler("no se agrego");
              }
            }
          });
        }
      </script>
      <script>
          

      </script>

      <script>
        
          
        
      </script>
   <script src="js/sweetalert2.all.js"></script>
   <script src="js/plugins/dataTables/datatables.min.js"></script>
 


<!-- Script para controlar funciones de la tabla -->
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                

            });

        });

    </script>
  </body>
 </html>

 <?php 
