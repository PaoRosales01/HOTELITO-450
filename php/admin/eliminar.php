<?php

include '../conexion.php';

$tab= $_GET['tab'];

	if ($tab=='a') 
	{
    if(isset($_GET['id_admin'])) {
      $id = $_GET['id_admin'];
      $sql = "DELETE FROM administrador WHERE Id_admin = $id";
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado) {
        $msj='error';
      }
      $msj="eliminaradmin";
    }
  }

  elseif ($tab=='u') 
	{
    if(isset($_GET['id_usuario'])) {
      $id = $_GET['id_usuario'];
      $sql = "DELETE FROM usuarios WHERE id_usuario = $id";
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado) {
        $msj='error';
      }
      $msj="eliminaruser";
    }
  }

  elseif ($tab=='r') 
	{
    if(isset($_GET['id_reserva'])) {
      $id = $_GET['id_reserva'];
      $sql = "DELETE FROM reservacion WHERE Id_Reservacion = $id";
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado) {
        $msj='error';
      }
      $msj="eliminarreserva";
    }    
  }

  
  elseif ($tab=='h') 
	{
    if(isset($_GET['id_hab'])) {
      $id = $_GET['id_hab'];
      $sql = "DELETE FROM habitacion WHERE Habitacion_No = $id";
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado) {
        $msj='error';
      }
      $msj="eliminarhab";
    }    
  }

  elseif ($tab=='e') 
	{
    if(isset($_GET['id_emp'])) {
      $id = $_GET['id_emp'];
      $sql = "DELETE FROM empleados WHERE Id_empleado = $id";
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado) {
        $msj='error';
      }
      $msj="eliminaremp";
    }    
  }

  elseif ($tab=='c') 
	{
    if(isset($_GET['id_msj'])) {
      $id = $_GET['id_msj'];
      $sql = "DELETE FROM contacto WHERE id_msj = $id";
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado) {
        $msj='error';
      }
      $msj="eliminarcontacto";
    }    
  }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.css'>
	      <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.js'></script>
		  <title>Eliminar</title>
</head>
<body>
    
</body>
</html>


<?php
if ($msj=="eliminaruser"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/drop.gif'),
      		title: '- Registro Eliminado Exitosamente -',
			imageWidth: 250,
			imageHeight: 200,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "admin_prin.php";
		});
		}
		mensaje();
		</script>
		<?php

    }
    
    else if ($msj=="eliminarreserva"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/drop.gif'),
      		title: '- Registro Eliminado Exitosamente -',
          imageWidth: 250,
			imageHeight: 200,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "admin_reserva.php";
		});
		}
		mensaje();
		</script>
		<?php

    }
    
    else if ($msj=="eliminaradmin"){
		?>
		<script>
		function mensaje(){
 		 swal({
      imageUrl: ('../../img/drop.gif'),
      		title: '- Registro Eliminado Exitosamente -',
          imageWidth: 250,
			imageHeight: 200,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "admin.php";
		});
		}
		mensaje();
		</script>
		<?php

	}

	
    else if ($msj=="eliminarhab"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/drop.gif'),
      		title: '- Registro Eliminado Exitosamente -',
          imageWidth: 250,
			imageHeight: 200,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "habadmin.php";
		});
		}
		mensaje();
		</script>
		<?php

	}

	
    else if ($msj=="eliminaremp"){
		?>
		<script>
		function mensaje(){
 		 swal({
      imageUrl: ('../../img/drop.gif'),
      		title: '- Registro Eliminado Exitosamente -',
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

	
    else if ($msj=="eliminarcontacto"){
		?>
		<script>
		function mensaje(){
 		 swal({
      imageUrl: ('../../img/drop.gif'),
      		title: '- Registro Eliminado Exitosamente -',
          imageWidth: 250,
			imageHeight: 200,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "contactoadmin.php";
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