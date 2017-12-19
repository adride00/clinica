<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>
<script src="js/jquery-3.2.1.min.js"></script>
  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 
  
   <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Seleccion</a></li>
                <li role="presentation"><a href="info_entrada.php">Datos</a></li>
                <li role="presentation"><a href="confirmacion_entrada.php">Confirmar Entrada</a></li>
              </ul>
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
           <center> <h4 class="control-label">Seleccione medicamentos</h4></center>

            
            <section class="row" id="tabla_resultado">
            
          </section>
            
            <div class="row">
              <div class="col-sm-6">
                <a href="info_entrada.php">Siguiente</a>
              </div>
              
            </div>

    
              
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
  </body>
 </html>

 <?php 








  ?>