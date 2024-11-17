<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<div class="preloader">
<div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <a class="navbar-brand" href="escritorio.php">
                    <b class="logo-icon ps-2">
                        <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <span class="logo-text">
                        <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                    </span>
                </a>
            </div>

            <!-- ============================================================== -->
            <!-- Navbar items y boton toggle para ocultar el aside -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-start me-auto">
                    <!-- ============================================================== -->
                    <!-- Botón para ocultar o mostrar el Sidebar -->
                    <!-- ============================================================== -->
                    
                </ul>

                <!-- ============================================================== -->
                <!-- Usuario y nombre a la derecha -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Mostrar el nombre del usuario a la derecha -->
                            <span class="me-2"><?php echo $_SESSION['nombre']; ?></span> <!-- Nombre del usuario -->
                            <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user me-1 ms-1"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet me-1 ms-1"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email me-1 ms-1"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings me-1 ms-1"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                            <div class="dropdown-divider"></div>
                            <div class="ps-4 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">View Profile</a></div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


        <aside class="main-sidebar" id="sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <section class="sidebar">
            <ul class="sidebar-menu" id="sidebarnav" class="pt-4">
                <li class="header"></li>

                <?php if ($_SESSION['escritorio'] == 1) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="escritorio.php" aria-expanded="false">
                            <i class="fa fa-dashboard"></i><span class="hide-menu">Escritorio</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['almacen'] == 1) : ?>
                    <li class="sidebar-item has-arrow">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-boxes"></i><span class="hide-menu">Almacén</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item"><a href="articulo.php" class="sidebar-link"><i class="fa fa-box-open"></i><span class="hide-menu">Artículos</span></a></li>
                            <li class="sidebar-item"><a href="categoria.php" class="sidebar-link"><i class="fa fa-tags"></i><span class="hide-menu">Categorías</span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['compras'] == 1) : ?>
                    <li class="sidebar-item has-arrow">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-clipboard-list"></i><span class="hide-menu">Compras</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item"><a href="ingreso.php" class="sidebar-link"><i class="fa fa-plus-square"></i><span class="hide-menu">Ingresos</span></a></li>
                            <li class="sidebar-item"><a href="proveedor.php" class="sidebar-link"><i class="fa fa-truck"></i><span class="hide-menu">Proveedores</span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['ventas'] == 1) : ?>
                    <li class="sidebar-item has-arrow">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-credit-card"></i><span class="hide-menu">Ventas</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item"><a href="venta.php" class="sidebar-link"><i class="fa fa-receipt"></i><span class="hide-menu">Ventas</span></a></li>
                            <li class="sidebar-item"><a href="cliente.php" class="sidebar-link"><i class="fa fa-users"></i><span class="hide-menu">Clientes</span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['acceso'] == 1) : ?>
                    <li class="sidebar-item has-arrow">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-user-shield"></i><span class="hide-menu">Acceso</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item"><a href="usuario.php" class="sidebar-link"><i class="fa fa-user"></i><span class="hide-menu">Usuarios</span></a></li>
                            <li class="sidebar-item"><a href="permiso.php" class="sidebar-link"><i class="fa fa-lock"></i><span class="hide-menu">Permisos</span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['consultac'] == 1) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comprasfecha.php" aria-expanded="false">
                            <i class="fa fa-search-dollar"></i><span class="hide-menu">Consulta Compras</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['consultav'] == 1) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ventasfechacliente.php" aria-expanded="false">
                            <i class="fa fa-chart-line"></i><span class="hide-menu">Consulta Ventas</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-question-circle"></i><span class="hide-menu">Ayuda</span>
                        <small class="label pull-right bg-red">PDF</small>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-info-circle"></i><span class="hide-menu">Acerca De...</span>
                        <small class="label pull-right bg-yellow">DG</small>
                    </a>
                </li>

            </ul>
        </section>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

