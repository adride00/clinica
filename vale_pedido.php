<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>a
<script src="js/jquery-3.2.1.min.js"></script>

  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 
  
   <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Seleccion</a></li>
                <li role="presentation"><a href="info_entrada.php">Datos</a></li>
                <li role="presentation"><a href="confirmacion_entrada.php">Confirmar Envio</a></li>
              </ul>
    <div class="theme-showcase" role="main">

      <div class="jumbotron">
        
        
        <form method="GET" role="form" id="formulario" name="formulario">
          <fieldset>

            <div class="form-group">
              <select name="productos" class="form-control" name="" id="">
                
                <option value="insumo">Insumos</option>
                <option value="medicamento">Medicamentos</option>
                
              </select>
            </div>

           <center> <h4 class="control-label">Seleccione Categoria</h4></center>
         
            <div id="aqui">
              

            </div>
            <div style="border-radius: 35px; height: 90px" class="alert alert-info" role="alert">
            <nav aria-label="...">
            <ul class="pager">
              
              <li class="next"><a style="background-color: skyblue" class="btn-info" href="info_entrada.php">Siguiente<span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
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
    
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    
  <script src="js/typeahead.min.js"></script>  
    
    <script>
      $(document).ready(function(){
        $('select').change(function(){
          var cat = $(this).val()
          tabla(cat);
        });
      });
    </script>

    <script>
      function tabla(categoria){
        $.get('tabla_pedido.php',{cat:categoria},function(data){
          $('#aqui').html(data);
        });
      }
    </script>
  
    <script>
       $(document).ready(function(){


                 
          $('button').click(function(e){
            e.preventDefault();
            var clase = $(this).attr('id');
            var selDesc = '#' + clase + ' #desc'; 
            var selCant = '.' + clase;
            var selCode = '#' + clase + ' #code';
            var selLote = '#' + clase + ' td #lote';
            var selFecha = '#' + clase + ' td #fecha';
            var lote = $(selLote).val()
            var fecha = $(selFecha).val()
            var descripcion = $(selDesc).text();
            var cantidad = $(selCant).val()
            var codigo = $(selCode).text()

            
              
            if(cantidad){
              
              swal({
                position: 'top-center',
                type: 'success',
                title: 'Producto se agrego correctamente',
                showConfirmButton: false,
                timer: 1500
              });
             $(selCant).hide();
             $(selLote).hide();
             $(selFecha).hide();
             $(selCode).hide();
             $(selDesc).hide();
             $(this).hide();
                
              agregarDatos(codigo,cantidad,descripcion,lote,fecha);
              //validarStock(cantidad,selCant,codigo);
            }
              
            
              
            
            });
            
          });



       
       


    </script>
      <script>
                function agregarDatos(codigo,cantidad,descripcion,lote,fecha){
          
          cadena = "codigo=" + codigo + "&descripcion=" + descripcion + "&cantidad=" +cantidad + "&lote=" + lote + "&fecha=" + fecha;
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
      

    
   <script src="js/sweetalert2.all.js"></script>
   
   <script src="js/bootstrap-datepicker.js"></script>
 
  <script>
   $(document).ready(function() {
    $('#myTable').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ resultados por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No existen registros",
            "search": "Buscar",
            
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
} );
  </script>
  </body>
 </html>

 