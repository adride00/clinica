<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>
<script src="js/jquery-3.2.1.min.js"></script>
  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 
  
   
    <div class="theme-showcase" role="main">

      <div class="jumbotron">
        <div class="row">
          <div class="col-sm-6">
            <input type="text" size="30px" id="busqueda" name="busqueda" placeholder="Buscar...">
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
        <form method="GET" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Entradas</h4></center>

            
            <section class="row" id="tabla_resultado">
            
          </section>
            
            

    
              
          </fieldset>
      </form>
    </div>
    
    </div> 
         </div> 
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    <script src="peticion.js"></script>
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
    <script>
       $(document).ready(function(){


         
        
          $('button').click(function(){
            var clase = $(this).attr('id');
            var selDesc = '#' + clase + ' #desc'; 
            var selCant = '#' + clase + ' #cantidad';
            var descripcion = $(selDesc).text();
            var cantidad = $(selCant).val()
            
            
            if(cantidad){
              agregarDatos(cantidad,descripcion);
            }
              
            
              
            
            });
            
          });



       
       


    </script>
      <script>
        function agregarDatos(cantidad,descripcion){
          
          cadena = "descripcion=" + descripcion + "&cantidad=" +cantidad;
          $.ajax({
            type:"POST",
            url:"ingresarProd.php",
            data:cadena,
            succes:function(r){
              if(r==1){
                alert("Agregado");
              }else{
                aler("no se agrego");
              }
            }
          });
        }
      </script>
   
  </body>
 </html>

 <?php 

 



/*
 include("conectar.php");
  if($_POST){
  $fecha_entrada = $_POST["fecha_entrada"];
  $cantidad = $_POST["cantidad"];
  $fecha_vencimiento = $_POST["fecha_vencimiento"];
  $nombre_articulo = $_POST["codigo_art"];
  $sql_select = "SELECT id_producto,descripcion FROM articulo WHERE descripcion = '$nombre_articulo'";
  $consulta_select = mysqli_query($link, $sql_select);

  $fila = mysqli_fetch_array($consulta_select);  
  echo $fila[0];
  $sql_insert = "INSERT INTO entradas(id_producto,fecha_entrada,cantidad,fecha_vencimiento) 
  VALUES('$fila[0]','$fecha_entrada','$cantidad','$fecha_vencimiento')";
  $consulta = mysqli_query($link, $sql_insert); 
  
  $sql_update = "UPDATE articulo SET stock_actual = stock_actual+'$cantidad' WHERE id_producto = '$fila[0]'";
  $consulta_update = mysqli_query($link,$sql_update);
  mysqli_close($link); //cerramos conexion con la base de datos
  die();
  }
*/
  ?>