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
                <li role="presentation"><a href="info.php">Datos</a></li>
                <li role="presentation"><a href="confirmacion.php">Confirmar Envio</a></li>
              </ul>
    <div class="theme-showcase" role="main">

      <div class="jumbotron">
        

        <form method="GET" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label">Seleccione medicamentos</h4></center>

            <table class="table table-hover" id="myTable">
              <thead>
                <tr>
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
            
            
            <div class="row">
              <div class="col-sm-6">
                <a href="info.php">Siguiente</a>
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
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    
  <script src="js/typeahead.min.js"></script>  
  <script>
    $(document).ready(function(){
            $('#myTable').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
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
          $(document).ready(function(){
              $('button').attr("disabled", true);
              $('td input').keyup(function(){
              var selec = $(this).attr('id');
              var consulta = $(' #'+selec).val();
              
              //var codigo = $('#desc').text();
              
              envio(selec,consulta);

              function envio(selec,consulta){

                $.ajax({
                              type: "POST",
                              url: "validarStock.php",
                              data: "b="+consulta+"&c="+selec,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    if(data === 'Stock insuficiente'){
                                       $('button').attr("disabled", true);
                                       $('button').css("background-color", "red");
                                       
                                       swal({
                                            title: 'No tiene suficientes existencias',
                                            html: $('<div>')
                                              .addClass('some-class')
                                              .text(''),
                                            animation: false,
                                            customClass: 'animated tada'
                                          });
                                    }else{
                                       $('button').attr("disabled", false);
                                       $('button').css("background-color", "skyblue");
                                    }
          
                              }
                  });




              }

            

            
           });
           
          });

      </script>

      <script>
        
          
        
      </script>
   <script src="js/sweetalert2.all.js"></script>
  </body>
 </html>

 