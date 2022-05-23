<?php
    session_start();

     if( isset($_GET["falloc"]))
    {
         $correo = $_SESSION['correo'];

    }
    else
        $correo ='';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELITO 450</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
       <!-- Login (lado izquierdo) -->
       <div class="cuadrologin">
        <div class="formder">
        <img class="logotipo" src="../img/hotelitoazul.png" alt="Logo de Hotelito 450">
        <h1>HOTELITO 450</h1><br>
        <h2>Bienvenido</h2>
        <h4>Ingresa a tu cuenta</h4><br><br>
        <form action="iniciarsesion.php" method="post"> 
            <label for="correo">Correo Electrónico</label>
            <input type="text" placeholder="Ingresa tu correo" name="correo" value="<?php echo $correo?>" autofocus required>
            <?php
             if(isset($_GET["falloe"]) && $_GET["falloe"] == 'true')
            {
                echo "<div style='color:red; font-weight:bold;'>Correo incorrecto </div>";
            }
            ?>
            <!-- Para contraseña -->
            <label for="contraseña">Contraseña</label>
            <input type="password" placeholder="Ingresa tu contraseña" name="pass" required>
            <?php
             if(isset($_GET["falloc"]) && $_GET["falloc"] == 'true')
            {
                echo "<div style='color:red; font-weight:bold;'>Contraseña incorrecta </div>";

            }
            ?>
            <!-- Botón para ingresar -->
            <input type="submit" value="INGRESAR" name="enviar"><br><br>
            <a href="registro.php">¿No tienes una cuenta? Regístrate</a>
        </form>
     </div>
</body>
</html>