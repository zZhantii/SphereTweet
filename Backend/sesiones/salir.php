<?php
    //Incluimos el archivo php "Parametros" para utilizar la variable "url_base".
    include("../../Backend/parametros.php");
    //Inicia sesion para comprobar que funciona
    session_start();
    //Destruye la sesion ya iniciada
    session_destroy();
    //Te envia a otro archivo automaticamente
    header("location:" . url_base ."Frontend/login.php");
?>

<!-- En este codigo si la sesion esta iniciado pero a la hora de cerrar sesion no podremos volver a entrar a la pagin sin haber iniciado sesion 
    antes -->