<?php
include_once ("../../BaseDeDatos/conexion.php");
require ("../../Backend/sesiones/proteccion.php");
//Comprueba el metodo de la solicitud, procura que se utilice al enviar y no al recargar la pagina
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $numberPhone = $_POST['numberPhone'];


    $resultado = $db->usuarios->updateOne(['usuario' => $_SESSION['usuario']], [
        '$set' =>
            [
                'lastName' => $lastName,
                'email' => $email,
                'website' => $website,
                'country' => $country,
                'province' => $province,
                'city' => $city,
                'gender' => $gender,
                'birthday' => $birthday,
                'status' => $status,
                'description' => $description,
                'numberPhone' => $numberPhone
            ]
    ]);

    header("Location:../../Frontend/Personal-Information.php?messageSuccess=1");
}

?>