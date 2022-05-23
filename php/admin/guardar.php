<?php
include '../conexion.php';

$msj='';
$tab=$_POST['tab'];

	if ($tab=='a') 
	{
		if (isset($_POST['guardar-admin'])) {
			$id=$_POST['id'];
			$correo=$_POST['correo'];
			$nombre=$_POST['nombre'];
			$ape=$_POST['apellido'];
			$contraseña=password_hash($_POST['pass'], PASSWORD_DEFAULT);
		  $sql="Insert INTO administrador (Id_admin, Correo, nombre, apellido, contrasenia) VALUES
						($id, '$correo', '$nombre', '$ape', '$contraseña')";
		  $resultado= mysqli_query($conexion, $sql);
		  if(!$resultado) {
			$msj='error';
		  }
		  $msj="agregadmin";
		
		}

  }
  elseif ($tab=='u') 	
	{
		if (isset($_POST['guardar-user'])) {
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$telefono=$_POST['telefono'];
			$fecha_nac=$_POST['fecha_nac'];
			$correo=$_POST['correo'];
			$contraseña=password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
		  $sql="Insert INTO usuarios (nombre, apellido, telefono, fecha_nac, correo, contrasenia) VALUES
						('$nombre', '$apellido', '$telefono', '$fecha_nac', '$correo', '$contraseña')";
		  $resultado= mysqli_query($conexion, $sql);
		  if(!$resultado) {
			$msj="error";
		  }
		  $msj="agreguser";

		
		}
	}

	elseif ($tab=='r') 	
	{
		if (isset($_POST['guardar-reserva'])) {
			$hrentrada=$_POST['hrent'];
			$fecha_ent=$_POST['fecha_entrada'];
			$fecha_sal=$_POST['fecha_salida'];
			$estado=$_POST['estado'];
			$hab=$_POST['habitacion'];
			$usuario=$_POST['usuario'];
		  $sql="Insert INTO reservacion (Hr_Entrada, Fecha_Entrada, Fecha_Salida, Estado, No_habitacion, Usuario) VALUES
						('$hrentrada', '$fecha_ent', '$fecha_sal', '$estado', '$hab', '$usuario')";
		  $resultado= mysqli_query($conexion, $sql);
		  if(!$resultado) {
			$msj='error';
		  }
		
		  $msj="agregreserva";

		
		}
	}

	elseif ($tab=='h') 	
	{
	/* 	if (isset($_POST['guardar-hab'])) {
			$hab = $_POST['hab'];
			$television=$_POST['telev'];
			$costo=$_POST['costo'];
			$descripcion=$_POST['desc'];
			$imagen=$_POST['img'];
		  $sql="Insert INTO habitacion (Habitacion_No, Television, Costo, Descripcion, Imagen) VALUES
						($hab, $television, $costo, '$descripcion', '$imagen')";
		  $resultado= mysqli_query($conexion, $sql);
		  if(!$resultado) {
			die("El registro no se realizó.");
		  }
		  header('Location: habadmin.php');
		
		} */

		if (isset($_POST['guardar-hab'])) 
		{
			$hab = $_POST['hab'];
			$television=$_POST['telev'];
			$costo=$_POST['costo'];
			$descripcion=$_POST['desc'];
		
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
					  $consulta="Insert INTO habitacion (Habitacion_No, Television, Costo, Descripcion, Imagen) VALUES
					  			($hab, $television, $costo, '$descripcion', '$nom_file')";
	  
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


	}

	elseif ($tab=='e') 	
	{
		if (isset($_POST['guardar-empleado'])) {
			$id = $_POST['id'];
			$nombre=$_POST['nombre'];
			$apellido =$_POST['apellido'];
			$contraseña=password_hash($_POST['pass'], PASSWORD_DEFAULT);
			$correo=$_POST['correo'];
		  	$sql="Insert INTO empleados (Id_empleado, Nombre, Apellido, Contrasenia, correo) VALUES
						($id, '$nombre', '$apellido', '$contraseña', '$correo')";
		  $resultado= mysqli_query($conexion, $sql);
		  if(!$resultado) {
			$msj='error';
		  }
		 	 $msj="agregemp";
		  
		}
	}

	elseif ($tab=='c') 	
	{
		if (isset($_POST['guardar-mensaje'])) {
			$nombre=$_POST['nombre'];
			$telefono=$_POST['tel'];
			$correo=$_POST['correo'];
			$msj =$_POST['mensaje'];
		  	$sql="Insert INTO contacto (nombre, telefono, correo, mensaje) VALUES
						('$nombre', '$telefono', '$correo','$msj')";
		  $resultado= mysqli_query($conexion, $sql);
		  if(!$resultado) {
			$msj='error';
		  }
		  $mensje="agregcontacto";
		
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
		  <title>Guardar</title>
</head>
<body>
    
</body>
</html>

<?php
if ($msj=="agreguser"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/bien.gif'),
      		title: '- Registro Agregado Exitosamente -',
			imageWidth: 150,
			imageHeight: 100,
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
    
    else if ($msj=="agregreserva"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/bien.gif'),
			title: '- Registro Agregado Exitosamente -',
			imageWidth: 150,
			imageHeight: 120,
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
    
    else if ($msj=="agregadmin"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/bien.gif'),
			title: '- Registro Agregado Exitosamente -',
			imageWidth: 150,
			imageHeight: 100,
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

	
    else if ($msj=="agreghab"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/bien.gif'),
			title: '- Registro Agregado Exitosamente -',
			imageWidth: 150,
			imageHeight: 100,
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

	
    else if ($msj=="agregemp"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/bien.gif'),
			title: '- Registro Agregado Exitosamente -',
			imageWidth: 150,
			imageHeight: 100,
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

	
    else if ($msj=="agregcontacto"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../../img/bien.gif'),
			title: '- Mensaje Enviado Exitosamente -',
			imageWidth: 150,
			imageHeight: 100,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "../../index.php";
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