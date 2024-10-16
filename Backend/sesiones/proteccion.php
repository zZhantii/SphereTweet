<?php
    session_start();
    
    if (!isset($_SESSION['usuario'])) {
        header("location:login.php");
    }
?>

<!--Estas lineas de codigo comprueban que no puedan entrar a ciertas paginas sin antes haber iniciador sesion, comprobando la variable que sea igual
    al nombre de usuario de la base de datos-->