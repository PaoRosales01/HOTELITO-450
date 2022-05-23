<?php
    include 'conexion.php';

$hora = $_POST ['hora'];
$fechae= $_POST['fechae'];
$fechas= $_POST['fechas'];
$estado= $_POST['estado'];
$hab= $_POST['hab'];
$user= $_POST['user'];

$insertar = "INSERT INTO reservacion (Hr_Entrada, Fecha_Entrada, Fecha_Salida, Estado, No_habitacion, Usuario) 
             VALUES ('$hora', '$fechae','$fechas', '$estado', $hab, $user)";

$resultado = mysqli_query($conexion, $insertar);
if($resultado){
   $msj="registrada";
} else{
    $msj="error";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.css'>
	      <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.js'></script>
          <title>Reservación</title>
</head>
<body>
    
</body>
</html>

<?php
	if ($msj=="registrada"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../img/reserva.png'),
            text: 'En este momento su reservación tiene un status pendiente, favor de revisar en 10 minutos la sección de "Mis reservaciones" para verificar que ha sido aprobada. En caso de que el status no cambie llamar al siguiente número: +52 618 143 46 31',
			imageWidth: 100,
			imageHeight: 100,
			padding: 10,
			animation: true,
            confirmButtonColor: '#77dd77',
            confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "usuario.php";
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
			imageUrl: ('../img/verificar.png'),
            title: 'No se registró la reserva',
            text: 'Verifique sus datos por favor',
			imageWidth: 150,
			imageHeight: 120,
			padding: 10,
			animation: true,
      confirmButtonColor: '#F22124',
      confirmButtonText: 'Verificar',
		}). then(function(){
			window.location = "usuario.php";
		});
		}
		mensaje();
		</script>
		<?php

    }
	
?>