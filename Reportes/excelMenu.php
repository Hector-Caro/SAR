<?php

header("content-Type: application/xls");
header("content-Disposition: attachment; filename=Reporte_Menu.xls");

?>

<table class="table table-hover ">
    <thead>
    <thead>
        <tr class="d-flex row border rounded-top rounded-3">
            <th class="d-flex col-md-2">
                <div
                    style="padding-bottom: 8px; border-bottom: 3px solid #18d26e; justify-content: center; display: flex; align-items:center; width: 45px; height: 45px;">
                </div>
                <span class="ms-2">Nombres</span>
            </th>
            <th class="d-flex col-md-2">
                <div
                    style="padding-bottom: 8px; border-bottom: 3px solid #18d26e; justify-content: center; display: flex; align-items:center; width: 45px; height: 45px;">
                </div> <span class="ms-2">Ingredientes</span>
            </th>
            <th class="d-flex col-md-2">
                <div
                    style="padding-bottom: 8px; border-bottom: 3px solid #18d26e; justify-content: center; display: flex; align-items:center; width: 45px; height: 45px;">
                </div> <span class="ms-2">Descripción</span>
            </th>
            <th class="d-flex col-md-2">
                <div
                    style="padding-bottom: 8px; border-bottom: 3px solid #18d26e; justify-content: center; display: flex; align-items:center; width: 45px; height: 45px;">
                </div>
                <span class="ms-2">Estado</span>
            </th>
            <th class="d-flex col-md-2">
                <div
                    style="padding-bottom: 8px; border-bottom: 3px solid #18d26e; justify-content: center; display: flex; align-items:center; width: 45px; height: 45px;">
                </div>
                <span class="ms-2">precio</span>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php

            require_once "../Models/conexion.php";
            require_once "../Models/consultas.php";
            require_once "../Controllers/mostrarInfoAdmin.php";
            cargarMenuExcel();

        ?>
    </tbody>
</table>