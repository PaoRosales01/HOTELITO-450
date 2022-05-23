<?php

    include 'registrar.php';
    include '../includes/funciones.php';
    

   
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELITO 450</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/registro.css">
    <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
</head>
<body>
       <!-- Login-->
       <div class="cuadrologin">
        <div class="formder">
        <img class="logotipo" src="../img/hotelitoazul.png" alt="Logo de Hotelito 450">
        <h1>HOTELITO 450</h1><br>
        <h2>¡Inicia tu registro ahora!</h2>
        <h4>Ingresa los datos que se solicitan</h4><br><br>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Para Nombre -->
            <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombrer?>" autofocus>
            <span class="error"><?php echo $nombre_error ?></span>

            <!-- Para Apellido -->
            <input type="text" placeholder="Apellido" name="apellido" value="<?php echo $apellidor?>">
            <span class="error"><?php echo $apellido_error ?></span>

            <!-- Para Teléfono -->
            <input type="tel" placeholder="Teléfono" name="tel" maxlength="10" pattern="[0-9]{10}" value="<?php echo $telefonor?>">
            <span class="error"><?php echo $telefono_error ?></span>

            <!-- Para Fecha de Nacimiento -->
            <label>Fecha de Nacimiento</label>
            <input type="date" value="0000-00-00" name="nacimiento" value="<?php echo $fechanacr?>">
            <span class="error"><?php echo $nacimiento_error ?></span>

            <!-- Para correo Electrónico -->
            <input type="email" placeholder="Correo Electrónico" name="correor" value="<?php echo $correor?>">
            <span class="error"><?php echo $correo_error ?></span>

            <!-- Para Contraseña -->
            <input type="password" placeholder="Contraseña" name="pass">
            <span class="error"><?php echo $pass_error ?></span>

            <div align="center" class="g-recaptcha"  data-sitekey="6LcsRrgZAAAAAIeyAwRy8qCDmV8_A6kVDGoGy2vD"></div><br>

            <!-- Botón para Crear Cuenta -->
            <input type="submit" value="CREAR MI CUENTA"><br><br>

        </form>
     </div>
</body>
</html>