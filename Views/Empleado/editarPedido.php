<?php
    // Enlazamos las dependencias necesario
    require_once ("../../Models/seguridadEmpleado.php"); 
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/La-Salchipaperia-DC.jpg" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap -->

    <title>
        Home Epleado - SAR
    </title>
</head>

<body>
    <?php   
        include("menuIncru.php");
    ?>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Buscar">
            </div>
            <img src="img/sar.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-clipboard-alt"></i>
                    <span class="text">Editar Pedidos</span>
                </div>

                <div class="cartaPedidos">
                    <div class="title tituloP">
                        <span class="text textPlato">Platos</span>
                        <span class="text textCantidad">Cantidad</span>
                    </div>
                    <div class="editarPedido">
                        <form action="">
                            <div class="platos">
                                <input type="text" class="textForm" name="plato">
                            </div>
                            <div class="quantity">
                                <div class="border">
                                    <button class="increment" type="button" onclick="increment()"> + </button>
                                    <input type="text" value="1" class="number" id="quantityInput" name="cantidad">
                                    <button class="decrement" type="button" onclick="decrement()"> - </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
    <script src="js/Main.js"></script>
    <script src="js/pedidos.js"></script>

    <script>
        function increment() {
            var input = document.getElementById('quantityInput');
            var currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        }

        function decrement() {
            var input = document.getElementById('quantityInput');
            var currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        }
    </script>

</body>

</html>