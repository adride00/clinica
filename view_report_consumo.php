<?php
    ob_start();
    
    $fecha1= $_GET['fecha1'];
    
    $fecha2= $_GET['fecha2'];
    
    include(dirname(__FILE__)."/report_detail_consum.php");
    
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'es');
        $html2pdf->pdf->SetDisplayMode('fullpage');
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('reporte_consumo.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
