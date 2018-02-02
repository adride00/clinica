<?php 
	include("conectar.php");
	$cat = $_GET['cat'];

echo '

<div class="page-header">
  <h3>'.$cat.'<small> </small></h3>
</div>

';

	

	$tabla= '
		 <table class="table table-active" id="myTable">
		 <thead>
<tr class="thead">
	<td>Codigo</td>
	<td>Descripcion</td>
	<td>Consumo promedio mensual</td>
	<td>Existencia</td>
	<td>Cantidad a solicitar para 3 meses</td>
	<td>Agregar</td>
</tr>
</thead>



	';

	$sql_join = 
  "
SELECT a.id_producto, a.codigo, a.descripcion, sum(m.cantidad)/3 as promedio, s.existencia 

from articulo as a

join movimiento as m

on a.id_producto=m.id_producto

join stock as s

on s.id_producto=m.id_producto

where m.fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 month)  and CURRENT_DATE and m.tipo = 'consumo diario' and a.tipo = '$cat' group by a.descripcion

  ";

$resultJoin = mysqli_query($link,$sql_join);

while($rowJoin = mysqli_fetch_array($resultJoin)){
	$tabla.='
	
	<tr id='.$rowJoin["id_producto"].'>
                    <td id="code">'.$rowJoin['codigo'].'</td>
                    <td id="desc">'.$rowJoin['descripcion'].'</td>
                    <td>'.$rowJoin['promedio'].'</td>
                    <td>'.$rowJoin['existencia'].'</td>
                    <td>
                      <input id="lote" type="text" size="5px"> 
                    </td>
                    <td>
                      <button class="btn-success btn btn-info btn-md" id='.$rowJoin["id_producto"].'><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </td>
                  </tr>


	';


}


$tabla.='</table>';
echo $tabla;

 ?>



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


















