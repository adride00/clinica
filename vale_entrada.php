<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>
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
           <center> <h4 class="control-label">Seleccione medicamentos</h4></center>

            <table class="table table-hover" id="myTable">
              <thead>
                <tr class="bg-primary">
                  <th>
                    Codigo
                  </th>
                  <th>
                    Descripcion
                  </th>
                  <th>
                    Existencia
                  </th>
                  <th>
                    Lote
                  </th>
                  <th>
                    Fecha Vencimiento
                  </th>
                  <th>
                    Cantidad
                  </th>
                  <th>
                    Agregar
                  </th>
                </tr>
              </thead>
              <?php 
                include("conectar.php");
                $sql = "SELECT a.id_producto, a.codigo, a.descripcion, s.existencia FROM articulo as a JOIN stock as s ON a.id_producto = s.id_producto";
                $result = mysqli_query($link,$sql);
                while ($row=mysqli_fetch_array($result)) {
                  
                
               
                
                  

                echo '
                  <tr id='.$row["id_producto"].'>
                    <td id="code">'.$row['codigo'].'</td>
                    <td id="desc">'.$row['descripcion'].'</td>
                    <td>'.$row['existencia'].'</td>
                    <td>
                      <input id="lote" type="text" size="5px"> 
                    </td>
                    <td><input autocomplete="off" type="text" class="form-control datepicker fechaV" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha"
                         placeholder="Introduce fecha"></td>
                    <td>
                      <input id='.$row['codigo'].' class='.$row["id_producto"].' type="text" size="5px"> 
                    </td>
                    <td>
                      <button class="btn-success btn btn-info btn-md" id='.$row["id_producto"].'><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </td>
                  </tr>




                ';
                

              }

                 ?>

            </table>
            
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
  $(function(){
      $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
        };
      window.prettyPrint && prettyPrint();
      $('.fechaV').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',

      });
      $('#fecha2').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        });
    });
  </script>
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

 