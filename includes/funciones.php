<?php
    function sesion()
    {
        session_start();
        if (isset($_SESSION['loggedin']))  $cliente = $_SESSION['loggedin'];
        else
        {
            /*Servage*/ 
        header('Location: ../../../php/login.php');

        /*Localhost*/ 
        /* header('Location: ../../../hotelito450_cambio/php/login.php'); */
        die() ;
        }
    }
?>