<?php
include_once ("../parametros.php");
include_once ("../../BaseDeDatos/conexion.php");
require ("../sesiones/proteccion.php");
// Al dar like mandamos por url el id de la imagen, entonces se buscaria en la base de datos

$id = $_GET['id'];

$_id = new MongoDB\BSON\ObjectID($id);

$resultado = $db->publicaciones->find(['_id' => $_id]);

foreach ($resultado as $publicacion) {
    $likes = $publicacion['likes'];
    // Al dar like mandamos por url el id de la imagen, entonces se buscaria en la base de datos

    $usuarioEncontrado = false;
    foreach ($likes as $like) {
        if ($like == $_SESSION['usuario']) {
            $usuarioEncontrado = true;
            break;
        }
    }
    // Si el usuario no ha dado like se insertará a la array, si ya le ha dado se quitara del array

    if (!$usuarioEncontrado) {
        $db->publicaciones->updateOne(['_id' => $_id], ['$push' => ['likes' => $_SESSION['usuario']]]);
    } else if ($usuarioEncontrado) {
        $db->publicaciones->updateOne(['_id' => $_id], ['$pull' => ['likes' => $_SESSION['usuario']]]);
    }
}
header("location:../../Frontend/index.php");
?>