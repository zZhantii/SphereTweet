<?php
//cookies
setcookie("nomcookie", "valor cookie", time() + (10));

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

    <?php include ('headerAndNav/header.php') ?>

    <div class="all">

        <?php include ('headerAndNav/NavBarRight.php'); ?>

        <div class="right_row">
            <div class="row">
                <div class="publish">
                    <div class="row_title">
                        <span><i class="fa fa-newspaper-o" aria-hidden="true"></i> Status</span>
                        <?php
                        if (isset($_GET['messageSuccess'])) {
                            if ($_GET['messageSuccess'] == 2) {
                                echo "<span style='color:green'>Se ha añadido correctamente la publicación</span>";
                            }
                        }

                        if (isset($_GET["messageError"])) {
                            if ($_GET["messageError"] == 6) {
                                echo "<span style='color:red'>Debes de añadir una imagen</span>";
                            }
                        }
                        ?>
                    </div>
                    <form method="POST" action="../Backend/publicaciones/publicacionIndex.php" enctype="multipart/form-data">
                        <div class="publish_textarea">
                            <img class="border-radius-image" src="images/<?php echo $fotoPerfil; ?>" alt="" />
                            <textarea name="descripcion" type="text"
                                placeholder="¿Whats up, <?php echo $_SESSION['usuario'] ?>?"
                                style="resize: none;"></textarea>
                        </div>
                        <div class="publish_icons">
                            <ul>
                                <li>
                                    <div class="publish-post">
                                        <div class="publish-post-options">
                                            <label for="file">
                                                <i class="fa fa-camera">
                                                <input type="file" id="file" name="fotoContenido">
                                                </i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button>Publish</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php include('publicaciones/publicacionIndex.php'); ?>

            <center>
                <a href="">
                    <div class="loadmorefeed">
                        <i class="fa fa-ellipsis-h"></i>
                    </div>
                </a>
            </center>
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