<?php
 /*Incluir archivo de conexion a BD*/ 
 require_once "conexion.php";


 //Definir variables e inicializarlas
 $hr_entrada = $fecha_entrada = $fecha_salida = $estado = $habitacion =  $usuario = "";
 $hora_error= $fecha_error ="";
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

     //Validar hora entrada
     if(empty(trim($_POST["hora"]))){
        $hora_error = "Ingrese su nombre";
     } else{
         //consulta de seleccion
         $sql= "SELECT Id_Reservacion FROM reservacion WHERE Id_Reservacion = ?";
         
         if($stmt = mysqli_prepare($conexion, $sql)){
             mysqli_stmt_bind_param($stmt, "s", $param_hrentrada);

             $param_horaentrada = trim($_POST["hora"]);
             if(mysqli_stmt_execute($stmt)){
                 mysqli_stmt_store_result($stmt);

                 if(mysqli_stmt_num_rows($stmt) == 1){
                     $hora_error = "Esta hora no está disponible";
                 }else{
                     $hr_entrada = trim($_POST["hora"]);
                 }
             }else{
                 echo "Algo salió mal, inténtalo más tarde";
             }
         }
     }

      //Validar fecha entrada
      if(empty(trim($_POST["fechae"]))){
            $fecha_error = "Ingrese la fecha de entrada";
         } else{
             //consulta de seleccion
             $sql= "SELECT Id_Reservacion FROM reservacion WHERE Fecha_Entrada = ?";
             
             if($stmt = mysqli_prepare($conexion, $sql)){
                 mysqli_stmt_bind_param($stmt, "s", $param_entrada);
 
                 $param_entrada = trim($_POST["fechae"]);
                 if(mysqli_stmt_execute($stmt)){
                     mysqli_stmt_store_result($stmt);
 
                     if(mysqli_stmt_num_rows($stmt) == 1){
                        $fecha_error = "Fecha ya reservada";
                     }else{
                        $fecha_entrada = trim($_POST["fechae"]);
                     }
                 }else{
                     echo "Algo salió mal, inténtalo más tarde";
                 }
             }
         }

         $param_salida = trim($_POST["fechas"]);
         $fecha_salida = trim($_POST["fechas"]);


         $param_estado = trim($_POST["estado"]);
         $estado = trim($_POST["estado"]);

         $param_habitacion = trim($_POST["hab"]);
         $habitacion = trim($_POST["hab"]);

         $param_usuario = trim($_POST["user"]);
         $usuario = trim($_POST["user"]);
           

         //Comprobar que variables de error están vacías
         if (empty ($hora_error) && empty ($fecha_error)){

                 $sql = "INSERT INTO usuarios (Hr_Entrada, Fecha_Entrada, Fecha_Salida, Estado, No_habitacion, Usuario)
                         VALUES (?,?,?,?,?,?)";
                 if ($stmt = mysqli_prepare ($conexion, $sql)){
                     mysqli_stmt_bind_param($stmt, "ssssss", $param_horaentrada, $param_entrada , $param_salida, $param_estado, $param_habitacion, $param_usuario);

                     //estableciendo parámetros
                     $param_horaentrada = $hr_entrada;
                     $param_entrada = $fecha_entrada;
                     $param_salida = $fecha_salida;
                     $param_estado = $estado;
                     $param_habitacion = $habitacion;
                     $param_usuario = $usuario ;

                     if(mysqli_stmt_execute($stmt)){
                         header("location: ../index.php");
                     }else{
                         echo "Algo salió mal, intente de nuevo";
                     }
                 }
             }

             mysqli_close($conexion);
 }
?>