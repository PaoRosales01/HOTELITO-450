<?php
   session_start();
    /*Incluir archivo de conexion a BD*/ 
    require_once "conexion.php";

    $bander='' ;
    //Definir variables e inicializarlas
    $nombrer = $apellidor = $telefonor = $nacimientor = $correor =  $pass = "";
    $nombre_error = $apellido_error = $telefono_error = $nacimiento_error = $correo_error = $pass_error = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //Validar usuario
        if(empty(trim($_POST["nombre"]))){
        $nombre_error = "Ingrese su nombre";
        } else{
                $nombrer = trim($_POST["nombre"]);
                }
        
         //Validar apellido
         if(empty(trim($_POST["apellido"]))){
            $apellido_error = "Ingrese su apellido";
            } else{
                
                    $apellidor = trim($_POST["apellido"]);
                
                        }


              //Validar telefono
         if(empty(trim($_POST["tel"]))){
            $telefono_error = "Ingrese su teléfono";
            } else{
                if(strlen(trim($_POST["tel"]))<10){
                    $telefono_error = "El teléfono debe tener 10 dígitos";
                } else{
                    $telefonor = trim($_POST["tel"]);
                }
                  }
               
                  

              //Validar fecha_nac
         if(empty(trim($_POST["nacimiento"]))){
            $nacimiento_error = "Ingrese su fecha de nacimiento";
            } else{
                            $nacimientor = trim($_POST["nacimiento"]);
                           
                        }



              //Validar correo
         if(empty(trim($_POST["correor"]))){
            $correo_error = "Ingrese su correo";
            } else{
                //consulta de seleccion
                $sql= "SELECT id_usuario FROM usuarios WHERE correo = ?";
                
                if($stmt = mysqli_prepare($conexion, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_correo);
    
                    $param_correo = trim($_POST["correor"]);
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
    
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $correo_error = "Correo ya registrado";
                        }else{
                            $correor = trim($_POST["correor"]);
                            
                        }
                    }else{
                        echo "Algo salió mal, inténtalo más tarde";
                    }
                }
            }

            
              //Validar contraseña
         if(empty(trim($_POST["pass"]))){
            $pass_error = "Ingrese su contraseña";
            } elseif(strlen(trim($_POST["pass"]))<7){
                $pass_error = "La contraseña debe tener al menos 6 caracteres";
            } else{
                $pass = trim($_POST["pass"]);
            }
  
            //Comprobar que variables de error están vacías
            if (empty ($nombre_error) && empty ($apellido_error) && empty ($telefono_error) 
                && empty ($nacimiento_error) && empty ($correo_error) &&empty ($pass_error)){

                    $sql = "INSERT INTO usuarios (nombre, apellido, telefono, fecha_nac, correo, contrasenia)
                            VALUES (?,?,?,?,?,?)";
                    if ($stmt = mysqli_prepare ($conexion, $sql)){
                        mysqli_stmt_bind_param($stmt, "ssssss", $param_nombre, $param_apellido, $param_tel, $param_nacimiento, $param_correo, $param_pass);

                        //estableciendo parámetros
                        $param_nombre = $nombrer;
                        $param_apellido = $apellidor;
                        $param_tel = $telefonor;
                        $param_nacimiento = $nacimientor;
                        $param_correo = $correor;
                        $param_pass = password_hash($pass, PASSWORD_DEFAULT); //contraseña encriptada
                        
                        if(mysqli_stmt_execute($stmt)){
                            header("location: login.php");
                        }else{
                            echo "Algo salió mal, intente de nuevo";
                        }
                    }
                }

                mysqli_close($conexion);
    }


?>