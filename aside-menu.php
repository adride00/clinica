

<style>
  a{
    font-size: 15px;
  }
</style>

        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard.php"><i class="fa fa-cog fa-2x"&nbsp; aria-hidden="true"></i>

Panel de control<span class="sr-only">(current)</span></a></li>


            <?php if($_SESSION["tipo"] == "farmacia"){ ?>
            <li><a href="inventario_medicamentos.php">Inventario Medicamentos</a></li>
            <li><a href="inventario_insumo.php">Inventario Insumos</a></li>
            <li><a href="reporte_promedio.php">Consumo Mensual Promedio</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="reporte_mensual.php">Consumo mensual</a></li>
            <li><a href="cuadro_diario.php">Por dia</a></li>
            
          </ul>

          <?php  }

            else{

           ?>

           <h4>menu bodega</h4>
           <?php } ?>
        </div>