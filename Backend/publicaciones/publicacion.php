<?php
include_once ("../../Backend/parametros.php");
include_once ("../../BaseDeDatos/conexion.php");
include_once ("../sesiones/proteccion.php");

// Comprovamos que la imagen cumpla el formato permitido, sino saltará un error
if ((($_FILES["fotoContenido"]["type"] == "image/jpeg") || ($_FILES["fotoContenido"]["type"] == "image/png") || ($_FILES["fotoContenido"]["type"] == "image/webp")) && ($_FILES["fotoContenido"]["size"] < 3000000)) {

    $nombreImagen = time() . "_" . $_FILES["fotoContenido"]["name"];
    $carpetaImagenes = dir_img . $nombreImagen;

    $resultadoImagen = move_uploaded_file($_FILES["fotoContenido"]["tmp_name"], $carpetaImagenes);

    $descripcion = $_POST['descripcion'];
    // Una vez que la imagen haya sido aceptada y movida a la carpeta, se insertara a la base de datos
    if ($resultadoImagen) {
        $resultadoSelect = $db->usuarios->find(['usuario' => $_SESSION['usuario']]);
        foreach ($resultadoSelect as $usuarios) {
            $fotoPerfil = $usuarios["fotoPerfil"];
            $nombreUsuario = $usuarios["usuario"];
        }

        $resultado = $db->publicaciones->insertOne([
            'fotoContenido' => $nombreImagen,
            'usuario' => $nombreUsuario,
            'fotoPerfil' => $fotoPerfil,
            'descripcion' => $descripcion,
            'likes' => [],
            'comments' => 0,
            'fecha' => date('d-m'),
            'shares' => 0
        ]);

        header("Location:" . url_base . "Frontend/profile.php?messageSuccess=2");
    }
} else {
    header("Location:" . url_base . "Frontend/profile.php?messageError=6");
}

?>