<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Pasteleria Diego's</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="assets/libs/datatables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/extra-libs/DataTables/datatables.min.css">
    <link rel="stylesheet" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<style>

  /* Estilo para la tabla */
  .panel-body{
    width: 90%;
  }
  #tbllistado {
    font-size: 15px; /* Reduce el tamaño del texto */
  }

  /* Hacer las celdas de la tabla más compactas */
  #tbllistado th, #tbllistado td {
    padding: 5px; /* Reduce el padding de las celdas */
  }

  /* Hacer las imágenes más pequeñas */
  #tbllistado img {
    width: 80px;
    height: 60px;
  }

  /* Reducir el tamaño del contenedor, moverlo ligeramente a la derecha y ajustarlo verticalmente */
  #listadoregistros {
    max-width: 78%; /* Establecer el ancho máximo del contenedor al 70% */
    margin: 50px auto; /* Centrar inicialmente */
    transform: translateX(13%); /* Desplazar ligeramente a la derecha */
  }

  /* Estilo adicional para mejorar la apariencia de las celdas */
  .table-condensed th, .table-condensed td {
    padding: 3px 5px;
  }
</style>
<style>
    /* Estilos generales del aside */
    .main-sidebar {
        background: linear-gradient(135deg, #4a69bd, #6a89cc); /* Fondo degradado azul y púrpura */
        color: #ecf0f1; /* Texto claro */
        width: 260px; /* Ancho del sidebar */
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        overflow-y: auto;
        transition: transform 0.3s ease, width 0.3s ease; /* Animación al cambiar tamaño */
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.4); /* Sombra lateral */
    }

    .scroll-sidebar {
        padding: 20px;
    }

    /* Estilos del encabezado */
    .sidebar .header {
        font-size: 16px;
        color: #d1d8e0; /* Texto claro */
        padding: 15px 10px;
        text-transform: uppercase;
        font-weight: bold;
        border-bottom: 2px solid #4a69bd; /* Línea azul en el encabezado */
        text-align: center; /* Centrar encabezado */
    }

    /* Estilo de los elementos de la lista */
    .sidebar-menu .sidebar-item {
        margin-bottom: 8px;
    }

    .sidebar-menu .sidebar-item a {
        color: #ecf0f1;
        display: flex;
        align-items: center;
        padding: 14px;
        text-decoration: none;
        border-radius: 6px;
        transition: background 0.3s ease, transform 0.3s ease; /* Animación de hover */
    }

    /* Iconos */
    .sidebar-menu .sidebar-item i {
        margin-right: 15px;
        font-size: 20px;
        color: #f39c12; /* Color dorado */
    }

    /* Hover y efectos */
    .sidebar-menu .sidebar-item a:hover {
        background: #38ada9; /* Color azul verdoso para hover */
        color: #ffffff;
        transform: translateX(5px); /* Desplaza ligeramente al pasar el cursor */
    }

    .sidebar-menu .sidebar-item.active a {
        background: #e55039; /* Fondo naranja quemado para activo */
        color: #ffffff;
    }

    .sidebar-menu .sidebar-item.active i {
        color: #ffffff; /* Icono blanco para activo */
    }

    /* Colores personalizados para iconos */
    .sidebar-menu .sidebar-item i.fa-dashboard {
        color: #1abc9c; /* Icono verde para "Escritorio" */
    }

    .sidebar-menu .sidebar-item i.fa-boxes {
        color: #e74c3c; /* Icono rojo para "Almacén" */
    }

    .sidebar-menu .sidebar-item i.fa-clipboard-list {
        color: #9b59b6; /* Icono morado para "Compras" */
    }

    .sidebar-menu .sidebar-item i.fa-credit-card {
        color: #3498db; /* Icono azul para "Ventas" */
    }

    .sidebar-menu .sidebar-item i.fa-user-shield {
        color: #f39c12; /* Icono amarillo para "Acceso" */
    }

    .sidebar-menu .sidebar-item i.fa-search-dollar {
        color: #e67e22; /* Icono naranja para "Consulta Compras" */
    }

    .sidebar-menu .sidebar-item i.fa-chart-line {
        color: #2ecc71; /* Icono verde claro para "Consulta Ventas" */
    }
    /* Asegurarse de que los submenús se desplieguen correctamente */
.sidebar-item.has-arrow .collapse {
    display: none;  /* Los submenús están ocultos por defecto */
    padding-left: 20px; /* Para un pequeño desplazamiento de los elementos */
}

/* Cuando el submenú está abierto, muestra los elementos */
.sidebar-item.has-arrow.active .collapse {
    display: block;
}

/* Para el efecto de transición suave cuando se abre o cierra un submenú */
.sidebar-item.has-arrow .collapse {
    transition: all 0.3s ease;
}

/* Asegúrate de que los iconos cambien de color cuando el submenú está activo */
.sidebar-item.has-arrow.active > a {
    background-color: #34495e;
    color: white;
}

.sidebar-item.has-arrow.active i {
    color: #1abc9c; /* Cambia el color del ícono cuando se expande */
}


    /* Estilo de las etiquetas pequeñas */
    .sidebar-menu .sidebar-item .label {
        margin-left: auto;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 3px;
        font-weight: bold;
    }

    /* Colores personalizados de las etiquetas */
    .bg-red {
        background: #e55039;
        color: #ffffff;
    }

    .bg-yellow {
        background: #f8c291;
        color: #ffffff;
    }

    /* Submenú o lista de segundo nivel */
    .sidebar-menu .sidebar-item .collapse .sidebar-link {
        padding-left: 40px; /* Más indentación */
        color: #bdc3c7; /* Color gris claro */
        font-size: 14px;
    }

    .sidebar-menu .sidebar-item .collapse .sidebar-link:hover {
        color: #ffffff;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .main-sidebar {
            width: 220px; /* Sidebar más delgado en pantallas pequeñas */
        }
    }

    @media (max-width: 576px) {
        .main-sidebar {
            transform: translateX(-100%); /* Oculta el sidebar en pantallas extra pequeñas */
        }

        .main-sidebar.active {
            transform: translateX(0); /* Muestra el sidebar al activarlo */
        }
    }
</style>




</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
     <?php include "header.php"; ?>
    
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php  include "footer.php"; ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script src="assets/libs/toastr/build/toastr.min.js"></script>
    
    <script type="text/javascript" src="assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/extra-libs/DataTables/DataTables-1.10.16/js/dataTables.semanticui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script>
    // Agregar el comportamiento de abrir/cerrar los submenús
    document.querySelectorAll('.sidebar-item.has-arrow').forEach(function(item) {
        item.addEventListener('click', function() {
            // Alternar la clase 'active' en el elemento 'li' para mostrar/ocultar el submenú
            item.classList.toggle('active');
        });
    });
</script>


</body>

</html>