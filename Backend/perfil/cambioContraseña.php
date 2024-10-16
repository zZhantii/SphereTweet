<?php
include_once ("../../BaseDeDatos/conexion.php");
require ("../../Backend/sesiones/proteccion.php");
// Comprovamos que haya insertado los campos correctamente
if (isset($_POST['password'], $_POST['newPassword'], $_POST['confirmNewPassword'])) {
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    $error = false;
    // Si la contraseña nueva no es igual que la repeticion saltará error
    if ($newPassword != $confirmNewPassword) {
        header("Location:../../Frontend/Change-Password.php?messageError=1");
        $error = true;
        // Si la contraseña nueva es la misma que la antigua saltará error
    } else if ($password == $newPassword) {
        header("Location:../../Frontend/Change-Password.php?messageError=2");
        $error = true;
        // Si la contraseña nueva es diferente se cambiara en la base de datos
    } else {
        $resultado = $db->usuarios->updateOne(['usuario' => $_SESSION['usuario']], [
            '$set' => ['password' => $newPassword]
        ]);
        $error = false;
        header("Location:../../Frontend/Change-Password.php?messageSuccess=1");

    }


}
?>