<?php

    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    ob_start();
    include "../Rpdf/reportesMenuPDF.php";
    $html = ob_get_clean();

    // Agregar metatag de codificación UTF-8 al contenido HTML
    $html = '<meta charset="UTF-8">' . $html;

    // Agregar estilos CSS para hacer que el texto sea más pequeño
    $html .= '<style>
                /* Cambia el tamaño de fuente a 10px (puedes ajustar este valor) */
                body {
                    font-size: 10px;
                }
            </style>';

    $dompdf->loadHtml($html);
    $dompdf->render();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=Reporte Menú - SAR.pdf");
    echo $dompdf->output();
?>
