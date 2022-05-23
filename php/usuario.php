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
    
    $sql3="SELECT nombre from usuarios where correo='$nm';";
    $result3=mysqli_query($conexion,$sql3);
    $nombre2=mysqli_fetch_array($result3);

    $sql4="SELECT id_usuario from usuarios where correo='$nm';";
    $result4=mysqli_query($conexion,$sql4);
    $iden=mysqli_fetch_array($result4);

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
      <a class="nav-link" href="#">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="reservauser.php?id_usuario=<?php echo $iden['id_usuario'] ?>">Mis reservaciones</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="salir.php">Cerrar sesión</a>
    </li>
  </ul>
</nav>

</header>

    <h1></h1>
    <div class="contenedor">   
    <div method="post" class="bienvenida"> 
    <h1> ¡Bienvenid@ <?php echo $nombre2['nombre']; ?>!</h1>  
  </div>
    <?php
    $user = $nm;
    $sql2="SELECT id_usuario from usuarios where correo='$nm';";
    $result2=mysqli_query($conexion,$sql2);
    $id2=mysqli_fetch_array($result2);
   ?> 
    <div class="habitaciones">
    <h2 id="mensaje" class="text-center">Reserva tu habitación ideal</h2>

    <!-- Tabla hab 1-->
  
        <?php        
        $sql="SELECT * from habitacion where Habitacion_No=1;";
        $result=mysqli_query($conexion,$sql);
        while ($mostrar=mysqli_fetch_array($result)){
            ?>
          <div class="container mt-4">
            <div class="row justify-content-center">

            <div class="col-md-4 col-12"> 
              <div class="card bg-dark text-white border-0">
                <div class="img-animtion">
                <img alt="hab1" class="card-img-top" src="../img/<?php echo $mostrar['Imagen']?>">
         </div>
         <div class="card-body text-center">
           <h5 class="card-title">Opción <?php echo $mostrar['Habitacion_No']?></h5>
           <p class="card-text text-center"><?php echo $mostrar['Descripcion']?></p>
           <p style="font-size:1.8rem" class="card-text text-center" >$<?php echo $mostrar['Costo']?> por noche</p>
           <form action='reservar.php' target="_blank">
           <button class="btn btn-light" type="submit" name="one" value="1">RESERVAR</a>
           </form>
        </div>
        </div>
        </div>
         
        <?php
        }
        ?>

  <!-- Tabla hab 2-->
  
  <?php      
        $sql="SELECT * from habitacion where Habitacion_No=2;";
        $result=mysqli_query($conexion,$sql);
        while ($mostrar=mysqli_fetch_array($result)){
            ?>

            <div class="col-md-4 col-12"> 
              <div class="card bg-dark text-white border-0">
                <div class="img-animtion">
                <img alt="hab2" class="card-img-top" src="../img/<?php echo $mostrar['Imagen']?>">
         </div>
         <div class="card-body text-center">
           <h5 class="card-title">Opción <?php echo $mostrar['Habitacion_No']?></h5>
           <p class="card-text text-center"><?php echo $mostrar['Descripcion']?></p>
           <p style="font-size:1.8rem" class="card-text text-center">$<?php echo $mostrar['Costo']?> por noche</p>
           <form action='reservar.php' target="_blank">
           <button class="btn btn-light" type="submit" name="one" value="2">RESERVAR</a>
           </form>
        </div>
        </div>
        </div>
                
        <?php
        }
        ?>

        
  <!-- Tabla hab 3-->
  
  <?php       
        $sql="SELECT * from habitacion where Habitacion_No=3;";
        $result=mysqli_query($conexion,$sql);
        while ($mostrar=mysqli_fetch_array($result)){
            ?>

            <div class="col-md-4 col-12"> 
              <div class="card bg-dark text-white border-0">
                <div class="img-animtion">
                <img alt="hab3" class="card-img-top" src="../img/<?php echo $mostrar['Imagen']?>">
         </div>
         <div class="card-body text-center">
           <h5 class="card-title">Opción <?php echo $mostrar['Habitacion_No']?></h5>
           <p class="card-text text-center"><?php echo $mostrar['Descripcion']?></p>
           <p style="font-size:1.8rem" class="card-text text-center">$<?php echo $mostrar['Costo']?> por noche</p>
           <form action='reservar.php' target="_blank">
           <button class="btn btn-light" type="submit" name="one" value="3">RESERVAR</a>
           </form>
        </div>
        </div>
        </div>
                
        <?php
        } $_SESSION['enviar']=$id2['id_usuario'];
        ?>

</div>
</div>  
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>