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
          
         
        </div>
        <form method="GET" role="form" id="formulario" name="formulario" action="view_report_consumo.php">
          <fieldset>
           <center> <h4 class="control-label">Reporte de consumos</h4></center>
             <div class="row">
               <div class="col-md-4">
                  <label for="ejemplo_email_1">Fecha inicio </label>
                  <input autocomplete="off" type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha1"
                         placeholder="Introduce la fecha de inicio">
                  </div>
                             <div class="col-md-4">
                  <label for="ejemplo_password_1">Fecha Fin</label>
                  <input autocomplete="off" type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha2" id="fecha2"
                         placeholder="Introduce la fecha fin">
                  </div>
              
               
             </div>
             
            
                       
            <div class="row">
              
            </div>

    
              
          </fieldset>
  

    </div>
    
    </div> 

        <div class="row">
          
<button type="submit" class="btn btn-primary"><i class="fa fa-file-pdf-o fa-1x" aria-hidden="true"> Generar reporte</i></button>
        </div>
</form>
         </div> 
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/typeahead.min.js"></script>  
  <script>
      $(document).ready(function(){
 
 $('#eco').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"ajaxeco.php",
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
        $('#siguiente').click(function(){
          var fecha = $('#fecha').val();
          var numPed = $('#numPed').val();
          var eco = $('#eco').val();
          
            enviar(fecha,numPed,eco);
          
        });
     });
   </script>
   <script>
     
    function enviar(fecha,numPed,eco){
          
          cadena = "fecha=" + fecha + "&numPed=" + numPed + "&eco=" +eco;
          $.ajax({
            type:"POST",
            url:"envioDat.php",
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
  $(function(){
      $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
        };
      window.prettyPrint && prettyPrint();
      $('#fecha1').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',

      });
      $('#fecha2').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        });
    });
  </script>
  </body>
 </html>

 <?php 




  ?>