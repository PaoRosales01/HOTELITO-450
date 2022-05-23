<?php
    include '../../includes/funciones.php';
    include '../conexion.php';
    sesion();

    $sql = "SELECT * FROM administrador";
    $res = mysqli_query($conexion, $sql);
    $numadmin=mysqli_num_rows($res);

    $sql2 = "SELECT * FROM usuarios";
    $res2 = mysqli_query($conexion, $sql2);
    $numusuarios=mysqli_num_rows($res2);

    $sql3 = "SELECT * FROM reservacion";
    $res3 = mysqli_query($conexion, $sql3);
    $numreserva=mysqli_num_rows($res3);

    $sql4 = "SELECT * FROM habitacion";
    $res4 = mysqli_query($conexion, $sql4);
    $numhab=mysqli_num_rows($res4);

    $sql5 = "SELECT * FROM empleados";
    $res5 = mysqli_query($conexion, $sql5);
    $numemp=mysqli_num_rows($res5);

    $sql6 = "SELECT * FROM contacto";
    $res6 = mysqli_query($conexion, $sql6);
    $numcon=mysqli_num_rows($res6);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administración</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

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
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
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
                                <a class="dropdown-item" href="../salir.php" id="cerrar"><i class="fa fa-sign-out-alt"></i> Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->

<div align="center">
  <h1 class="tab-titulo ">PANEL DE ADMINISTRACIÓN</h1>
</div>


<div class="card-deck" style="margin-top: 5vmin;">
<div class="card" style="background-color:#92a6cc">
  <div class="card-header">Registros: <?php echo $numusuarios?> </div>
  <a href="admin_prin.php">
  <div class="card-body">
  <h5 class="card-title"><p class="font-weight-bold text-white">Usuarios<p></h5>
    </a>
  </div>
  </div>
    <div class="card" style="background-color:#92a6cc">
    <div class="card-header">Registros: <?php echo $numreserva?> </div>
  <div class="card-body">
  <a href="admin_reservas.php">
  <h5 class="card-title"><p class="font-weight-bold text-white">Reservaciones<p></h5>
    </a>
</div>
  </div>
</div>

<div class="card-deck" style="margin-top: 5vmin;">
<div class="card" style="background-color:#92a6cc">
  <div class="card-header">Registros: <?php echo $numadmin?> </div>
  <a href="admin.php">
  <div class="card-body">
  <h5 class="card-title"><p class="font-weight-bold text-white">Administradores<p></h5>
    </a>
  </div>
  </div>
  <div class="card" style="background-color:#92a6cc">
  <div class="card-header">Registros: <?php echo $numhab?> </div>
  <a href="habadmin.php">
  <div class="card-body">
  <h5 class="card-title"><p class="font-weight-bold text-white">Habitaciones<p></h5>
    </a>
  </div>
  </div>
</div>

<div class="card-deck" style="margin-top: 5vmin;">
<div class="card" style="background-color:#92a6cc">
<div class="card-header">Registros: <?php echo $numemp?> </div>
<a href="empleados.php">
  <div class="card-body">
  <h5 class="card-title"><p class="font-weight-bold text-white">Empleados<p></h5>
    </a>
  </div>
  </div>
  <div class="card" style="background-color:#92a6cc">
  <div class="card-header">Registros: <?php echo $numcon?> </div>
  <a href="contactoadmin.php">
  <div class="card-body">
  <h5 class="card-title"><p class="font-weight-bold text-white">Contacto<p></h5>
    </a>
  </div>
  </div>
</div>






          
            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© 2020 Hotelito 450 . Todos los derechos reservados</p>
            </div>
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='../../js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->
    
    <!-- loading-gif Js -->
    <script src="../../js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

   
    <!-- Js for bootstrap working-->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>