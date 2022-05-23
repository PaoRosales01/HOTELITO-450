<?php  
    include '../includes/funciones.php';
    sesion();
    $id2=isset($_SESSION['enviar']) ? $_SESSION['enviar'] : 'NoHayDatos';
    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacer reservación</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="../css/reserva.css">
</head>
<body>

  <!--  General -->
  <div class="reservacion">
        <div class="reservar">
        <img class="logotipo" src="../img/hotelitoazul.png" alt="Logo de Hotelito 450">
        <h1>Realizar Reservación</h1><br>
        <form action="agregar_reserva.php" method="post"> 
            
            <label>Hora de Entrada:</label><br>
            <input type="time"  placeholder="HH:MM:SS" name="hora" autofocus required><br><br>
            

            <!-- Para contraseña -->
            <label>Fecha de Entrada:</label><br>
            <input type="date" placeholder="MM/DD/AA" name="fechae" required><br><br>
            

            <!-- Para contraseña -->
            <label>Fecha de Salida:</label><br>
            <input type="date" placeholder="MM/DD/AA" name="fechas" required><br>
            
             <!-- Para contraseña -->
             <label hidden>Estado</label><br>
            <input type="text" name="estado" value="Pendiente" readonly hidden>

            <?php
            if ($_REQUEST['one']=='1')
                $hab="Una cama matrimonial sin TV";
           if ($_REQUEST['one']=='2')
             $hab="Una cama matrimonial con TV";
           if ($_REQUEST['one']=='3')
            $hab="Dos camas individuales con TV";
            ?>
             <!-- Para contraseña -->
             <label hidden>Número de Habitación</label>
            <input type="text"  name="hab" value="<?php echo $_REQUEST['one']?>" readonly hidden>

             <!-- Para contraseña -->
            <label hidden>Usuario</label>
            <input type="text" name="user" value="<?php echo $id2 ?>" readonly hidden>

            <label class="desc">Eligió:  <?php echo $hab?></label><br><br>
           
            <!-- Botón para ingresar -->
            <input type="submit" value="Enviar"><br><br>

        </form>
     </div>
     </div>

           
</body>
</html>