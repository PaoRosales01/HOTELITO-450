<?php
include '../conexion.php';
$id= '';
$nombre= '';
$apellido = '';
$contraseña ='';
$correo='';
$msj="";

if  (isset($_GET['id_emp'])) {
  $id = $_GET['id_emp'];
  $sql = "SELECT * FROM empleados WHERE Id_empleado= $id";
  $resultado = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_array($resultado);   
    $nombre= $fila['Nombre']; 
    $apellido= $fila['Apellido']; 
    $contraseña= $fila['Contrasenia']; 
    $correo= $fila['correo']; 
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id_emp'];
  $nombre= $_POST['nombre'];     
  $apellido= $_POST['apellido']; 
  $contraseña= password_hash($_POST['pass'], PASSWORD_DEFAULT);   
  $correo= $_POST['correo']; 

  $sql = "UPDATE empleados set  Nombre = '$nombre', Apellido = '$apellido', Contrasenia = '$contraseña', correo = '$correo'   WHERE Id_empleado = $id";
  $resultado=mysqli_query($conexion, $sql);
  if(!$resultado) {
  $msj="error";
}
$msj="actualizado";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>

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
    <!--//web-fonts-->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.css'>
	      <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.js'></script>
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
                               <a class="dropdown-item" href="../../index.php"><i class="fa fa-sign-out-alt">Cerrar sesión</a></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div align="center">
  <h1 class="tab-titulo ">Editar Empleado</h1>
</div>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
        <form action="editar_empleado.php?id_emp=<?php echo $_GET['id_emp']; ?>" method="POST">
        <label class="desc">Nombre:</label>
         <div class="form-group">
            <input type="text" value="<?php echo $nombre; ?>" name="nombre" class="form-control" autofocus required>
          </div>
          <label class="desc">Apellido:</label>
          <div class="form-group">
            <input type="text" value="<?php echo $apellido; ?>" name="apellido" class="form-control" autofocus required>
          </div>
          <label class="desc">Contraseña:</label>
          <div class="form-group">
            <input type="password"  name="pass" class="form-control" autofocus required>
          </div>
          <label class="desc">Correo electrónico:</label>
          <div class="form-group">
            <input type="text" value="<?php echo $correo; ?>" name="correo" class="form-control" autofocus required>
          </div>
          <input type="reset" name="borrar" class="btn btn-danger" value="Borrar">
          <input type="submit" name="update" class="btn btn-success" value="Actualizar Empleado">
        </form>
      </div>
      </div>
    </div>
  </div>
<?php include '../../includes/pie.php'; ?>


<?php
if ($msj=="actualizado"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/cambio.png'),
      		title: '- Empleado Actualizado Exitosamente -',
			imageWidth: 250,
			imageHeight: 200,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "empleados.php";
		});
		}
		mensaje();
		</script>
		<?php

    }

    
	else if ($msj=="error"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/error.gif'),
      		title: '- Error, verifique los datos ingresados -',
			imageWidth: 150,
			imageHeight: 100,
			padding: 10,
			animation: true,
			confirmButtonColor: '#77dd77',
			confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "indexadmin.php";
		});
		}
		mensaje();
		</script>
		<?php

	}
	?>
