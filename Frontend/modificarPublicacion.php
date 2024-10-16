<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Newsfeed - Social Network</title>
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Icons FontAwesome 4.7.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <?php
    include_once ("../Backend/parametros.php");
    include_once ("../BaseDeDatos/conexion.php");
    require ("../Backend/sesiones/proteccion.php");

    $resultado = $db->usuarios->find(['usuario' => $_SESSION['usuario']]);

    foreach ($resultado as $usuarios) {
        $fotoPerfil = $usuarios["fotoPerfil"];
        $seguidores = $usuarios["seguidores"];
        $seguidos = $usuarios["seguidos"];
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Newsfeed - Social Network</title>
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">


        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- Icons FontAwesome 4.7.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            type="text/css" />



    </head>

    <body>
        <div class="all">
            <div class="right_row">


                <?php

                $id = $_GET['id'];

                $_id = new MongoDB\BSON\ObjectID($id);

                $resultado = $db->publicaciones->find(['_id' => $_id]);

                $publicacion = "";

                foreach ($resultado as $key) {
                    $publicacion .= "<form method='POST' action='../Backend/publicaciones/modificarPubli.php?id=" . $key['_id'] . "' class='row border-radius'>";
                    $publicacion .= '<div class="feed">';

                    $publicacion .= "<div class='feed_title'>";

                    $publicacion .= "<img src='images/" . $key['fotoPerfil'] . "'/>";
                    $publicacion .= "<span><b>" . $key['usuario'] . "</b> shared a <a href='feed.php'>photo</a><br><p>" . $key['fecha'] . "</p></span>";
                    $publicacion .= "<button style='padding: 5px;' name='eliminar'>Eliminar</button>";
                    $publicacion .= "<button style='padding: 5px;margin-left: 2px;' name='guardar' style='margin-left: 15px;'>Guardar</button>";

                    $publicacion .= "</div>";

                    $publicacion .= "<div class='feed_content'>";
                    $publicacion .= "<div class='feed_content_image'>";

                    $publicacion .= "<img  src='images/" . $key['fotoContenido'] . "' />";

                    $publicacion .= "</div>";
                    $publicacion .= "</div>";

                    $publicacion .= "<div class='feed_footer'>";
                    $publicacion .= "<ul class='feed_footer_left'>";

                    $publicacion .= "<a  style='color:#515365;'><li class='hover-orange'><i class='fa fa-heart'></i>" . count($key['likes']) . "</li></a>";
                    $publicacion .= "<li><input name='descripcion' type='text' value='" . $key['descripcion'] . "'/></li>";

                    $publicacion .= "</ul>";
                    $publicacion .= "<ul class='feed_footer_right'>";
                    $publicacion .= "<li>";

                    $publicacion .= "<li class='hover-orange selected-orange'><i class='fa fa-share'></i>" . $key['shares'] . "</li>";
                    $publicacion .= "<a href='feed.php' style='color:#515365;'><li class='hover-orange'><i class='fa fa-comments-o'></i>" . $key['comments'] . "</li></a>";

                    $publicacion .= "</li>";
                    $publicacion .= "</ul>";
                    $publicacion .= "</div>";

                    $publicacion .= "</div>";
                    $publicacion .= "</form>";
                }

                echo $publicacion;

                if (isset($_POST))

                ?>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            // Modals
            $(document).ready(function () {


                $("#messagesmodal").hover(function () {
                    $(".modal-comments").toggle();
                });
                $(".modal-comments").hover(function () {
                    $(".modal-comments").toggle();
                });



                $("#friendsmodal").hover(function () {
                    $(".modal-friends").toggle();
                });
                $(".modal-friends").hover(function () {
                    $(".modal-friends").toggle();
                });


                $("#profilemodal").hover(function () {
                    $(".modal-profile").toggle();
                });
                $(".modal-profile").hover(function () {
                    $(".modal-profile").toggle();
                });


                $("#navicon").click(function () {
                    $(".mobilemenu").fadeIn();
                });
                $(".all").click(function () {
                    $(".mobilemenu").fadeOut();
                });
            });
        </script>
        <script>
            window.onscroll = function () { scrollFunction() };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }

            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    </body>

    </html>
</body>

</html>