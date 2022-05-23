<?php
    require 'conexion.php';
   
   
  session_start();
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: login.php");
       exit;
   }
   $_SESSION['enviar'] = '';
   $nm=isset($_SESSION['correo']) ? $_SESSION['correo'] : 'NoHayDatos';
?>
 <?php
    
   $id=$_GET['id_usuario'];
   ?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINCIPAL</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/usuario.css">
    <script src="https://kit.fontawesome.com/fd39f5639f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
  <style>
    th,td{
      font-family: 'Roboto Condensed', sans-serif;
      letter-spacing: 1px;
    }

    .ine{
      margin-top:8vmin;
        color: black;
        text-shadow: -.5px -.5px .5px black, .5px -.5px .5px black, -.5px .5px .5px black, .5px .5px .5px black;
        text-transform: uppercase;
        font-family: 'Roboto Condensed', sans-serif;
        letter-spacing: 2px;
        font-size: 1.4rem;
    }

    .reglamento{
      font-family: 'Roboto Condensed', sans-serif;
      font-size: 1.2rem;
      color:black;
      text-shadow: -.1px -.1px .1px blue, .1px -.1px .1px blue, -.1px .1px .1px blue, .1px .1px .1px blue;
      text-decoration:none;
      cursor: pointer;
    }

    .cobro{
      font-family: 'Roboto Condensed', sans-serif;
      font-size: 1.5rem;
      margin: 3rem;
    }

    .fa-exclamation-triangle{
      color: orange;
      margin-left: 2vmin;
      margin-right: 2vmin;
    }
  </style>

</head>
<body>

<header class="menu">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="../img/hotelitoblanco.png" alt="Hotelito 450" style="width:50px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="usuario.php">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Mis reservaciones</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="salir.php">Cerrar sesión</a>
    </li>
  </ul>
</nav>

</header>

<div class="contenedor"> 
    <div class="bienvenida"> 
    <h1 class="text-center">Tus reservaciones: </h1>  
  </div>

   <div class="table-responsive text-center" style="margin-top:4rem">
       <table class="table">
       <thead style="background:#c6cddb">
            <th scope="col">Hora de Entrada:</th>
            <th scope="col">Fecha de Entrada:</th>
            <th scope="col">Fecha de Salida:</th>
            <th scope="col">Estado de Reserva</th>
            <th scope="col">Tipo de habitación</th>
        </thead>

        <?php
          $sql = "SELECT * FROM reservacion where Usuario = $id";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Hr_Entrada']; ?></td>
            <td><?php echo $fila['Fecha_Entrada']; ?></td>
            <td><?php echo $fila['Fecha_Salida']; ?></td>
            <td><?php echo $fila['Estado']; ?></td>
            <td><?php echo $fila['No_habitacion']; ?></td>
          </tr>
         <?php } ?>
      </table>

      <div class="text-center">
              <p class="ine">No olvides mostrar tu INE al presentarte a Hotelito 450</p>
              <p class="cobro"><i class="fas fa-exclamation-triangle"></i>Al presentarte se te cobrará lo correspondiente a las noches seleccionadas en el tipo de habitación que elegiste<i class="fas fa-exclamation-triangle"></i></p>  
              <a class="reglamento" href="../img/reglamento.png" download="Reglamento_Hotelito450">Descarga nuestro reglamento</p>
          </div> 
       




</div>            
</div>  
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>