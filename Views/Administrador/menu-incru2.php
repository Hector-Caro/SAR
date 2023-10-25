<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme nav12" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center perfil" id="navbar-collapse">
    <!-- Search -->
      <div class="navbar-nav align-items-center" id="busqueda">
        <div class="nav-item d-flex align-items-center">
          <i class="bx bx-search fs-4 lh-0"></i>
          <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" id="inputSearch" placeholder="Buscar..."
            aria-label="Search...">
        </div>
      </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- User -->
        <?php
          perfil();
        ?>
      <!--/ User -->
    </ul>
  </div>
</nav>

<div class="container" id="boxSearch">
  <ul>
    <!-- Usuarios -->
    <li><a href="registrarUsuario.php">Registrar Usuario</a></li>
    <li><a href="verUsuarios.php">Ver Usuarios</a></li>
    <li><a href="reportesUsuarios.php">Reportes Usuarios</a></li>
    <!-- Productos -->
    <li><a href="registrarProducto.php">Registrar Productos</a></li>
    <li><a href="verProductos.php">Ver Productos</a></li>
    <li><a href="reportesProductos.php">Reportes Productos</a></li>
    <!-- Empleados -->
    <li><a href="registrarEmpleado.php">Registrar Empleados</a></li>
    <li><a href="verEmpleados.php">Ver Empleados</a></li>
    <li><a href="reportesEmpleados.php">Reportes Empleados</a></li>
    <!-- Menú -->
    <li><a href="registrarMenu.php">Registrar Menú</a></li>
    <li><a href="verMenu.php">Ver Menú</a></li>
    <li><a href="reportesMenu.php">Reportes Menú</a></li>
    <!-- Sedes -->
    <li><a href="registrarSede.php">Registrar Sede</a></li>
    <li><a href="verSedes.php">Ver Sedes</a></li>
    <li><a href="reportesSedes.php">Reportes Sedes</a></li>
    <!-- Inventario -->
    <li><a href="registrarEntradaInventario.php">Registrar Entrada en el Inventario</a></li>
    <li><a href="verInventario.php">Ver Inventario</a></li>
    <li><a href="reportesInventario.php">Reportes Inventario</a></li>
    <!-- Proveedores -->
    <li><a href="registrarProveedor.php">Registrar Proveedor</a></li>
    <li><a href="verProveedores.php">Ver Proveedores</a></li>
    <li><a href="reportesProveedores.php">Reportes Proveedores</a></li>
  </ul>
</div>