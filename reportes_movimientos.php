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
  <div class="page-header">
  <h3>Reporte Movimientos <small>Envios Y Entradas</small></h3>
</div>
    
    <a href="view_report.php"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
</a>
    <div class="row">
      <table class="table table-hover ">
                <tr class="thead">
                  
                  <th >
                    Numero documento
                  </th>
                  
                  <th>
                    Fecha
                  </th>
                  <th>
                    Responsable
                  </th>
                  <th>
                    Tipo Movimiento
                  </th>
                </tr>
                <?php 
                  include("conectar.php");


                  $sql_select = "SELECT DISTINCT m.numPed, m.fecha, u.nombre, m.tipo FROM movimiento as m JOIN usuario as u ON m.id_usuario = u.id_usuario"; 
                  $result = mysqli_query($link,$sql_select);
                  
                  while($mostrar=mysqli_fetch_array($result)){ 
                 ?>
                 <tr>
                    <td><?php echo $mostrar['numPed'] ?></td>
                    <td><?php echo $mostrar['fecha'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['tipo'] ?></td>
                    
                      
                    <td><button id="<?php echo $mostrar['numPed'] ?>" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Ver</button></td>
                    
                 </tr>
                  
                 <?php 

                  }
                  ?>
              </table>
    </div>
        

        <div class="container">
  
  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Clinica Sociedad</h4>
          
        </div>
        <div class="modal-body">
          <p>Detalle Movimiento</p>
          <div class="row">
            <div class="col-md-6">
              <!--<a class="<?php echo $mostrar['numPed'] ?>" href="view_detalle.php"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
</a>
-->
            <button id="<?php echo $mostrar['numPed'] ?>" class="btn btn-info btn-md"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></button>
            </div>
          </div>
          <div id="aqui">
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
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
      $('button').click(function(){
        var seleccion = $(this).attr('id');
        enviar(seleccion);
      });
    });
  </script>

  <script>
    function enviar(seleccion){
           $.get('envioVer.php',{id:seleccion},function(data){
              $('#aqui').html(data);
           });   



          }
  </script>
  </body>
 </html>

 <?php 

 

  ?>