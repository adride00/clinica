<?php 
  include("validar.php");
  include("cabecera.php");
  include("nav-menu.php");  
  include("aside-menu.php");
?>
<script src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="DataTables/Data/css/jquery.dataTables.min.css">  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 
  
   <ul class="nav nav-tabs">
                <li role="presentation"><a href="vale_deteriorado.php">Seleccion</a></li>
                <li role="presentation"><a href="info_deteriorado.php">Datos</a></li>
                <li role="presentation"  class="active"><a href="#">Confirmar Envio</a></li>
              </ul>
    <div class="theme-showcase" role="main">
        <?php 
          include("conectar.php");
          $sql = "SELECT * FROM tmp_datos ORDER BY id_tmp DESC LIMIT 1";
          $result = mysqli_query($link,$sql);
          $row = mysqli_fetch_array($result); 

         ?>
         <table class="table table-bordered">
           <tr>
             <td>
               Fecha: <?php echo $row['fecha']; ?>
             </td>
             <td>
               Numero Documento: <?php echo $row['numPed']; ?>
             </td>
           </tr>
           <tr>
             <td>
               Responsable: <?php echo $_SESSION["nombre"]; ?>
             </td>
             <td>
               Establecimiento de salud: <?php echo $row['eco']; ?>
             </td>
           </tr>
         </table>
          
        
      <div class="jumbotron">
        <div class="row">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>

        <form method="GET" role="form" id="formulario" name="formulario">
          <fieldset>
           <center> <h4 class="control-label"></h4></center>

            
            <section class="row" id="tabla_resultado">
            
          </section>
            
            

    
              
          </fieldset>
      </form>
    </div>
    <nav aria-label="...">
  
    </div>
    <ul class="pager">
    <li class="previous"><a style="background-color: skyblue" class="btn-info" href="info_deteriorado.php"><span aria-hidden="true">&larr;</span>Atras</a></li>
    <li class="next"><a id="terminar" style="background-color: skyblue" class="btn-info" id="siguiente" href="facturar_deteriorado.php">Terminar<span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>
    </div> 
         </div> 
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    <script src="js/peticionconf.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
  <script src="js/typeahead.min.js"></script> 
  <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                pageLength: 25,
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
            var selCant = '#' + clase + ' #cant';
            var selCode = '#' + clase + ' #code';
            var descripcion = $(selDesc).text();
            var cantidad = $(selCant).text()
            var codigo = $(selCode).text()
            

            if(clase){
              agregarDatos(clase,cantidad,descripcion);
            }
              
            
              
            
            });
            
          });


       
       


    </script>
      <script>

        function agregarDatos(clase,cantidad,descripcion){
          
          cadena = "clase=" + clase + "&descripcion=" + descripcion + "&cantidad=" +cantidad;
          $.ajax({
            type:"POST",
            url:"borrar.php",
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

      <script>
        $(document).ready(function(){

          $('#terminar').click(function(event){


        
          $.ajax({
            url: 'agre.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
          })
          .done(function(respuesta){
              console.log(respuesta);
              if(!respuesta.eror){
                 alert('se ingresaron con exito');
              }else{
                alert("los datos no se ingresaron");
              }
          })
          .fail(function(resp){
            console.log(resp.responseText);
          })
          .always(function(){
            console.log("complete");
          })
        });

});
      </script>

   <script type="text/javascript">
/*
      $(document).ready(function(){
        $('#terminar').click(function(){
         var req = $('#numReq').text();
         var num = $('#tbody tr').length;
         
         if(num){
          facturar(num);
         }
        });
      });
*/
    /*
$(document).ready(function(){
    $("#terminar").click(function () 
    {
               var  StringDatos="";
        var i=0;
        $("#tbody tr").each(function (index) 
        {
            var campo1, campo2, campo3;

            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 0: campo1 = $(this).text();
                            break;
                    case 1: campo2 = $(this).text();
                            break;
                    case 2: campo3= $(this).text();
                            break;
                    
                }
                
            });
          
            StringDatos+=campo1+"|"+campo2+"|"+campo3+"#";
            i=i+1;
           

        });
        var dataString='stringdatos='+StringDatos+'&cuantos='+i;
         alert(dataString);
          $.ajax({
                    type:'POST',
                    url:'insertar.php',
                    data: dataString,           
                    dataType: 'json',
                    success: function(datax){   
                        //process=datax.process;
                        var msg=datax.msg;
                        if(msg=="OK")
                        {   
                            alert('Exito');
                        }
                        if(msg=="NO")
                        {
                            alert('Error');
                        }

                         
                    }
                }); 
    });
});
*/
</script>

<script>
/*
function facturar(num){
          
          cadena = "num=" + num;
          $.ajax({
            type:"POST",
            url:"facturar.php",
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
        */
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