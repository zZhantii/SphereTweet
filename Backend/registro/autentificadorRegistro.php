<?php
include_once ("../../Backend/parametros.php");
include_once ("../../BaseDeDatos/conexion.php");

$error = false;
// Comprovamos si el usuario haya insertado los datos necesarios para registrarse correctamente
if (isset($_POST["user"], $_POST["email"], $_POST["password"], $_POST["repeatPassword"], $_FILES["fotoPerfil"]["name"])) {
    // En esta variable la convertimos con la primera letra en mayusculas y las demas en minusculas para evitar repeticiones
    $user = ucfirst(strtolower($_POST["user"]));
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $fotoPerfil = $_FILES["fotoPerfil"]["name"];
    // Comprovamos que la contraseña sea igual que la segunda contraseña
    if ($password != $repeatPassword) {
        header("Location:" . url_base . "Frontend/register.php?messageError=6");
        $error = true;
        exit;
    }

    $existeUsuario = $db->usuarios->findOne(['usuario' => $user]);

    $existeEmail = $db->usuarios->findOne(['email' => $email]);
    // Al buscar en la base de datos si alguna variable ya existe, saltará un error
    if ($existeUsuario) {
        header("Location:" . url_base . "Frontend/register.php?messageError=4");
        $error = true;
        exit;
    } else if ($existeEmail) {
        header("Location:" . url_base . "Frontend/register.php?messageError=5");
        $error = true;
        exit;
    }
    // Verificamos la imgen de foto perfil para que cumpla los requisitos, sino los cumple o no la pone directamente se le pondra una default
    // Le agregamos un nombre clave a la imagen para evitar confuciones y insertamos a la base de datos todo lo necesario
    if (((($_FILES["fotoPerfil"]["type"] == "image/jpeg") || ($_FILES["fotoPerfil"]["type"] == "image/png") || ($_FILES["fotoPerfil"]["type"] == "image/webp")) && ($_FILES["fotoPerfil"]["size"] < 3000000))) {
        $nombreImagen = time() . "_" . $_FILES["fotoPerfil"]["name"];
        $carpetaImagenes = dir_img . $nombreImagen;
        $resultadoImagen = move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $carpetaImagenes);

        $resultado = $db->usuarios->insertOne(['usuario' => $user, 'lastName' => "-", 'email' => $email, 'website' => "-", 'country' => "-", 'province' => "-", 'city' => "-", 'gender' => "-", 'status' => "-", 'description' => "-", 'password' => $password, 'birthday' => date('d-m-Y'), 'numberPhone' => "888888888", 'fotoPerfil' => $nombreImagen, 'seguidores' => 0, 'seguidos' => 0, 'fechaInicio' => date('Y-m-d')]);
        header("Location:" . url_base . "Frontend\login.php?messageSuccess=1");
    } else {
        $nombreImagenDefault = "default.png";
        $resultado = $db->usuarios->insertOne(['usuario' => $user, 'lastName' => "-", 'email' => $email, 'website' => "-", 'country' => "-", 'province' => "-", 'city' => "-", 'gender' => "-", 'status' => "-", 'description' => "-", 'password' => $password, 'birthday' => date('d-m-Y'), 'numberPhone' => "888888888", 'fotoPerfil' => $nombreImagenDefault, 'seguidores' => 0, 'seguidos' => 0, 'fechaInicio' => date('Y-m-d')]);
        header("Location:" . url_base . "Frontend\login.php?messageSuccess=1");
    }
}
?>