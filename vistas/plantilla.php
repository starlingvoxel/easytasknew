<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">


<!-- Mirrored from bootstrapdemos.wrappixel.com/materialpro/dist/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Sep 2024 12:23:13 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="vistas/img/logo/easytask-slim.png" />

    <!-- Core Css -->

    <link rel="stylesheet" href="vistas/css/style.css" />
    <link rel="stylesheet" href="vistas/css/font-awesome.css" />
    <link rel="stylesheet" href="vistas/css/data-table.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS de DataTables -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.21.0/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>EasyTask</title>


</head>

<body>
    <?
  if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {

    echo "<div class='preloader'>
     <img src='vistas/img/logo/easytask-slim-black.png' alt='loader' class='lds-ripple img-fluid' />
    </div>";


    echo "<div id='main-wrapper'>";

    //Sidebar Start -->

    include "modulos/componentes/sidebar.php";

    //  Sidebar End -->
    echo "<div class='page-wrapper'>";


    // Header Start -->



    include "modulos/componentes/header.php";

    //  Header End -->
    //  aside comenter End -->

    //  aside comenter End -->
    echo "<div class='body-wrapper'>";
    echo "<div class='container-fluid'>";


    if (isset($_GET["ruta"])) {

      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "departamentos" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "inventario" ||
        $_GET["ruta"] == "eventos" ||
        $_GET["ruta"] == "tareas" ||
        $_GET["ruta"] == "view-tecnicos" ||
        $_GET["ruta"] == "tecnicos" ||
        $_GET["ruta"] == "ventas" ||
        $_GET["ruta"] == "caja-chica" ||
        $_GET["ruta"] == "perfil" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "reporte-tarea" ||
        $_GET["ruta"] == "logout"
      ) {

        include "modulos/" . $_GET["ruta"] . ".php";
      } else {

        include "modulos/componentes/404.php";
      }
    } else {

      include "modulos/inicio.php";
    }
  } else {
    include "modulos/login.php";
  }

  ?>
    </div>
    </div>





    </div>



    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->

</body>





<?
if ($_GET["ruta"] == "inicio" || $_GET["ruta"] == "") {
  echo '<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/js/breadcrumb/breadcrumbChart.js"></script>';
  echo '<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/libs/apexcharts/dist/apexcharts.min.js">
</script>';
  echo '<script src="vistas/js/inicio.js"></script>';

 
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jQuery/3.3.1/jQuery.min.js">
</script>
<!-- JS de DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.js">
</script>
<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/libs/simplebar/dist/simplebar.min.js">
</script>


<!--<script src="vistas/js/assets/js/vendor.min.js"></script>-->


<!-- Import Js Files -->


<script src="vistas/js/assets/simplebar.min.js">
</script>
<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/js/theme/app.init.js"></script>
<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/js/theme/theme.js"></script>
<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/js/theme/app.min.js"></script>
<script src="vistas/js/siderbarmenu.js"></script>
<script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/js/theme/feather.min.js"></script>



<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
</script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>


<!-- Tempus Dominus JS -->
 <script src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/js/extra-libs/moment/moment.min.js"></script>

<!-- JavaScript de Tempus Dominus Bootstrap 4 -->
<!-- JavaScript de daterangepicker -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="vistas/js/assets/responsive.bootstrap5.js"></script>
<script src="vistas/js/assets/select2.full.min.js">
</script>
<script src="vistas/js/assets/select2.min.js">
</script>
<script src="vistas/js/assets/select2.init.js"></script>
<script src="vistas/js/assets/toastr-init.js"></script>

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/calendar.js"></script>
<script src="vistas/js/departamentos.js"></script>
<script src="vistas/js/tareas.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/datepicker.js"></script>
<script src="vistas/js/caja.js"></script>

<script src="vistas/js/table.js">
</script>







</html>