<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
  

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="../../css/styleadmin.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="../../css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/fd39f5639f.js" crossorigin="anonymous"></script>
    <!--// Fontawesome -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&family=Fira+Sans+Condensed:wght@500&display=swap" rel="stylesheet">    <!--//web-fonts-->
</head>
<body>
<?php include '../../php/conexion.php';?>
<div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="background: #0f2453;">
            <div class="sidebar-header" style="background: #0f2453;">
                <h1>
                    <a href="indexadmin.php">Hotelito 450</a>
                </h1>
                <span>Hotelito</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="indexadmin.php">
                        <i class="fas fa-th-large"></i>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-laptop"></i>
                        Tablas
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="../admin/admin_prin.php"><i class="fa fa-user"></i>Usuarios</a>
                        </li>
                        <li>
                            <a href="../admin/admin_reservas.php"><i class="fas fa-book"></i>Reservaciones</a>
                        </li>
                        <li>
                            <a href="../admin/admin.php"><i class="fas fa-user-shield"></i>Administradores</a>
                        </li>
                        <li>
                            <a href="../admin/habadmin.php"><i class="fas fa-bed"></i>Habitaciones</a>
                        </li>
                        <li>
                            <a href="../admin/empleados.php"><i class="fas fa-concierge-bell"></i>Empleados</a>
                        </li>
                        <li>
                            <a href="../admin/contactoadmin.php"><i class="fas fa-envelope-open-text"></i>Contacto</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="../salir.php" id="cerrar"><i class="fa fa-sign-out-alt">Cerrar sesión</a></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->




