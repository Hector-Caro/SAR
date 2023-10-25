<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/plantilla-pdf.css">
    <title>Reportes Menú - SAR</title>
    <link rel="stylesheet" href="../sneat/assets/vendor/fonts/boxicons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    </style>
</head>
 
<body>
    <h2 style="font-family: 'Poppins', sans-serif;">Reporte Menú - SAR</h2>
    <div style="border-bottom: 2px solid #000; border-radius: 50%;"></div>
    <table class="table table-striped" style="width: 100%; border-collapse: collapse; margin-top: 30px;">
        <thead>
            <tr>
                <th style="text-align: left; padding: 8px; font-family: 'Poppins', sans-serif; background: #233446; color: #fff;">Nombres</th>
                <th style="text-align: left; padding: 8px; font-family: 'Poppins', sans-serif; background: #233446; color: #fff;">Ingrdientes</th>
                <th style="text-align: left; padding: 8px; font-family: 'Poppins', sans-serif; background: #233446; color: #fff;">Descripción</th>
                <th style="text-align: left; padding: 8px; font-family: 'Poppins', sans-serif; background: #233446; color: #fff;">Estado</th>
                <th style="text-align: left; padding: 8px; font-family: 'Poppins', sans-serif; background: #233446; color: #fff;">Precio</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                require_once "../Models/conexion.php";
                require_once "../Models/consultas.php";
                require_once "../Controllers/mostrarInfoAdmin.php";
                cargarMenuPDF(); 
            ?>
        </tbody>
    </table>
</body>

</html>