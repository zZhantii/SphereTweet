<?php
include_once ("../../BaseDeDatos/conexion.php");

$id = $_GET['id'];

$_id = new MongoDB\BSON\ObjectID($id);
// Comprovamos que si le da al boton de "eliminar", buscariamos la id de la publicacion y la eliminariamos
if (isset($_POST['eliminar'])) {
    $resultado = $db->publicaciones->deleteOne(['_id' => $_id]);
    header('Location:../../Frontend/profile.php?messageSuccess=3');
    // En el caso que le de a "guardar", comprovamos que el campo lo haya puesto y lo inserte a la base de datos
} else if (isset($_POST['guardar'])) {
    if (isset($_POST['descripcion'])) {
        $descripcion = $_POST['descripcion'];
        $resultado = $db->publicaciones->updateOne(
            ['_id' => $_id],
            ['$set' => ['descripcion' => $descripcion]]
        );
    }
    header('Location:../../Frontend/profile.php?messageSuccess=4');
}
?>