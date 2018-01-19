<?php 
	include("validar.php");
	include("cabecera.php");	

 ?>

  <body>

    
          <?php 
          		include("nav-menu.php");	
          		include("aside-menu.php");
           ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 

          	if($_SESSION["tipo"] == "farmacia"){

           ?>
			<div class="row">
				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="enca_reportes.php"><img class="card-img-top" src="img/lista.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Reportes Movimientos</p>
					  </div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="usuarios.php"><img class="card-img-top" src="img/usuario.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Administrar Usuarios</p>
					  </div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="registro_articulos.php"><img class="card-img-top" src="img/producto.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Registro Producto</p>
					  </div>
					</div>
				</div>
			</div>
			<div class="row">
				<!--<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="consumo.php"><img class="card-img-top" src="img/salida-diaria.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Salidas diarias</p>
					  </div>
					</div>
				</div>
			-->
				<!--<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href=""><img class="card-img-top" src="img/archivo.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Estado Medicamentos</p>
					  </div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="entradas.php"><img class="card-img-top" src="img/entrada.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Entrada Articulo</p>
					  </div>
					</div>
				</div>
			</div>
			<--></-->
			<div class="row">
				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="registro_eco.php"><img class="card-img-top" src="img/hospital.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">ECOSF</p>
					  </div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="enca_mov.php"><img class="card-img-top" src="img/movimientos.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Movimientos</p>
					  </div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card" style="width: 20rem;">
					  <a href="ajuste.php"><img class="card-img-top" src="img/cuenta-atras.png" alt="Card image cap"></a>
					  <div class="card-body">
					    <p class="card-text">Ajuste de Inventario</p>
					  </div>
					</div>
				</div>
			</div>
            
              
                  <?php 

                  	}

                  	else{

                  	

                   ?>
                	
                	<h2>Menu bodega</h2>

                	<?php } ?>

               

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/frm_RegInsumos.js"></script>
    
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