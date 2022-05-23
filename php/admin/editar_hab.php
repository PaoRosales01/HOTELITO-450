<?php
include '../conexion.php';
$id= '';
$television= '';
$costo = '';
$descripcion= '';
$imagen= '';
if  (isset($_GET['id_hab'])) {
  $id = $_GET['id_hab'];
  $sql = "SELECT * FROM habitacion WHERE Habitacion_No= $id";
  $resultado = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_array($resultado);   
    $television= $fila['Television']; 
    $costo= $fila['Costo']; 
    $descripcion= $fila['Descripcion'];
    $imagen= $fila['Imagen']; 
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id_hab'];
  $television= $_POST['telev'];     
  $costo= $_POST['costo']; 
  $descripcion= $_POST['desc']; 
  
  if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0)
  { 
   $ruta_server = substr(substr($_SERVER['PHP_SELF'],0,-1),0,(strrpos($_SERVER['PHP_SELF'],"/")+1));
   $ruta_file=$ruta_server."../../img/".$_FILES['archivo']['name'];
   $nom_file=$_FILES['archivo']['name'];
   //$size_arch=$_FILES['archivo']['size']." bytes";
   $extencion_arch=substr(($_FILES['archivo']['name']),(strrpos($_FILES['archivo']['name'],".")+1),strlen($_FILES['archivo']['name']));
   
  if ( ($extencion_arch=="jpg") || ($extencion_arch=="gif") || ($extencion_arch=="png") )
   { 
     
      if (! move_uploaded_file ($_FILES['archivo']['tmp_name'], "../../img/".$_FILES['archivo']['name'])) 
         {  
           echo "<script> alert('No se ha podido copiar el archivo al servidor');</script>";
         } 
       else
        {
            require_once("../conexion.php");
            $consulta="UPDATE habitacion set  Television = $television, Costo = $costo, Descripcion = '$descripcion', Imagen = '$nom_file' WHERE Habitacion_No = $id";

            $resultado=mysqli_query($conexion, $consulta);
            if($resultado) 
            {
                echo "<script> alert('Archivo subido con Exito y Registro agregado correctamente');
                              location.href='habadmin.php'; 
                      </script> ";
            } 
            else 
            {
                echo "<script> alert('Error al agregar el registro, verifique por favor ...'); 
                      </script> ";
            }
        }
           
   }
  else
   {
    echo "<script> alert('Por favor verifique, SOLO SE PERMITE: 'DOC', 'XLS' ó 'PDF' ');</script>";
   }
 } 
else 
 {  
    echo "<script> alert('No se ha seleccionado un archivo para SUBIR');</script>"; 
 }  

}

 /* $sql = "UPDATE habitacion set  Television = $television, Costo = $costo, Descripcion = '$descripcion', Imagen = '$imagen' WHERE Habitacion_No = $id";
  mysqli_query($conexion, $sql);
  header('Location: habadmin.php');*/

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
  <h1 class="tab-titulo ">Editar Habitación</h1>
</div>


<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
        <form action="editar_hab.php?id_hab=<?php echo $_GET['id_hab']; ?>" method="POST" enctype="multipart/form-data">
        <label class="desc">¿Cuenta con televisión? (1 ó 0):</label>
          <div class="form-group">
            <input type="number" value="<?php echo $television; ?>" name="telev" class="form-control" autofocus required>
          </div>
          <label class="desc">Costo por noche:</label>
          <div class="form-group">
            <input type="number" value="<?php echo $costo; ?>" name="costo" class="form-control" autofocus required>
          </div>
          <label class="desc">Breve descripción de la habitación:</label>
          <div class="form-group">
            <input type="textarea" value="<?php echo $descripcion; ?>" name="desc" class="form-control" autofocus required>
          </div>
          <label class="desc">Imagen de la habitación:</label>
          <div class="form-group">
            <input type="file" value="<?php echo $imagen; ?>" name="archivo" class="form-control" autofocus required>
          </div>
          <input type="reset" name="borrar" class="btn btn-danger" value="Borrar">
          <input type="submit" name="update" class="btn btn-success" value="Actualizar Habitación">
          </form>
      </div>
    </div>
      </div>
    </div>
<?php include '../../includes/pie.php'; ?>