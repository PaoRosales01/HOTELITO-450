<?php


define ('BD_SERVIDOR', 'localhost');
define ('BD_USUARIO', 'root');
define ('BD_CONTRASEÑA', 'PaolaRosales18');
define ('BD_NOMBRE', 'hotelito450');

//Servage
/* define ('BD_SERVIDOR', '10.209.81.2');
define ('BD_USUARIO', '1006416_iu13061');
define ('BD_CONTRASEÑA', 'Utd_2020');
define ('BD_NOMBRE', '1006416-1111'); */

$conexion = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_CONTRASEÑA, BD_NOMBRE);
  if ($conexion == false){
    die("Error en la conexión" .mysqli_connect_error());
   } else{
        //echo 'CONEXIÓN EXITOSA';
   }
?>