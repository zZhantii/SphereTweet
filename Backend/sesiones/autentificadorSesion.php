<?php
include_once ("../../Backend/parametros.php");
include_once ("../../BaseDeDatos/conexion.php");

if (isset($_POST["email"], $_POST["password"])) {

    $email_ingresado = $_POST["email"];
    $password_ingresado = $_POST["password"];

    $usuario = $db->usuarios->findOne(['email' => $email_ingresado]);

    if ($usuario) {
        if ($usuario['password'] === $password_ingresado) {
            session_start();
            $_SESSION['usuario'] = $usuario['usuario'];
            header("Location:" . url_base . "Frontend/index.php");
            exit;
        } else {
            header("Location:" . url_base . "Frontend/login.php?messageError=2");
            exit;
        }
    } else {
        header("Location:" . url_base . "Frontend/login.php?messageError=1");
        exit;
    }
} else {
    header("Location:" . url_base . "Frontend/login.php?messageError=3");
    exit;
}
?>

<!--En este codigo comprovamos que el usuario haya insertado los datos necesarios para inicar sesion, una vez hecho se comprueban la base de datos
    Si exiten iniciará sesion con el "session_start()" y lo reenviará al indice, en cambio si se equivoca con la contraseña saltará un error y lo 
    mismo con el correo-->
