<?php
sleep(1);
include('conectar.php');
if($_REQUEST) {
    $username = $_REQUEST['codigo_articulo'];
    $query = "select descripcion from articulo where codigo = '".strtolower($username)."'";
    $results = mysql_query( $query) or die('ok');
    echo "hola";
    if(mysql_num_rows(@$results) > 0)
        echo '<div id="Error">Usuario ya existente</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
?>