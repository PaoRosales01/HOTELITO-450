<?php

    require_once "conexion.php";

   
    $correo=  $contra= $passform="";
    $correo_error = $contra_error = "";

     if (isset($_POST['enviar'])) 
        {
        $correo = trim($_POST["correo"]);
        $contra = trim($_POST["pass"]);
        }
    
    $sql = "SELECT * FROM administrador WHERE Correo = '$correo'";
    $res = mysqli_query($conexion, $sql);
    $datos= mysqli_fetch_array($res);

    $sql2 = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $res2 = mysqli_query($conexion, $sql2);
    $datos2 = mysqli_fetch_array($res2);

    $sql3 = "SELECT * FROM empleados WHERE correo = '$correo'";
    $res3 = mysqli_query($conexion, $sql3);
    $datos3 = mysqli_fetch_array($res3);
   
    if(mysqli_num_rows($res) > 0) 
    {
        if(password_verify($contra,$datos['contrasenia']))
        {
            session_start();
            $_SESSION['correo']= $correo;
            $_SESSION["loggedin"] = true;
            $msj = "correctoadmin";
        }

        else
        {
            session_start();
            $_SESSION['correo']= $correo;
            header("location: login.php?falloc=true");
            exit();
        }
        
    }
    else if(mysqli_num_rows($res2) > 0) 
    {
        if(password_verify($contra,$datos2['contrasenia']))
        {
            session_start();
            $_SESSION['correo']= $correo;
            $_SESSION["loggedin"] = true;
            $msj = "correctouser";
            
        }

        else
        {
            session_start();
            $_SESSION['correo']= $correo;
            header("location: login.php?falloc=true");
            exit();
        }
        
    }
    else if(mysqli_num_rows($res3) > 0) 
    {
        if(password_verify($contra,$datos3['Contrasenia']))
        {
            session_start();
            $_SESSION['correo']= $correo;
            $_SESSION["loggedin"] = true;
            $msj = "correctoemp";
            
        }

        else
        {
            session_start();
            $_SESSION['correo']= $correo;
            header("location: login.php?falloc=true");
            exit();
        }
        
    }
    else
    {
        session_start();
        $_SESSION['correo']= $correo;
        header("location: login.php?falloe=true");
        exit();
        
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.css'>
	      <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.js'></script>
          <title>Iniciar Sesión</title>
</head>
<body>
    
</body>
</html>


<?php
	if ($msj=="correctoadmin"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../img/admin.png'),
      title: '- B I E N V E N I D O -',
			imageWidth: 150,
			imageHeight: 100,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "admin/indexadmin.php";
		});
		}
		mensaje();
		</script>
		<?php

    }
    
    else if ($msj=="correctouser"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../img/user.png'),
      title: '- B I E N V E N I D O -',
			imageWidth: 150,
			imageHeight: 120,
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
    
    else if ($msj=="correctoemp"){
		?>
		<script>
		function mensaje(){
 		 swal({
			imageUrl: ('../img/empleados.png'),
      title: '- B I E N V E N I D O -',
			imageWidth: 150,
			imageHeight: 100,
			padding: 10,
			animation: true,
      confirmButtonColor: '#77dd77',
      confirmButtonText: 'Continuar',
		}). then(function(){
			window.location = "empleados/menu.php";
		});
		}
		mensaje();
		</script>
		<?php

	}
	
?>