<?php
// Esto es el buscador de las publicaciones, si pone un nombre, lo buscara por la base de datos y ordenará las publicaciones por orden de fecha
if (isset($_POST['nameSearch'])) {
    $nameSearch = $_POST['nameSearch'];
    $resultado = $db->publicaciones->find(['usuario' => $nameSearch], ['sort' => ['fecha' => -1]]);
} else {
    $resultado = $db->publicaciones->find(['usuario' => $_SESSION['usuario']], ['sort' => ['fecha' => -1]]);
}
// Mostrariamos la publicacion con todos los datos de la base de datos del usuario y la foto que haya selecionado.
$publicacion = "";

foreach ($resultado as $key) {
    $publicacion .= "<div class='row border-radius'>";
    $publicacion .= '<div class="feed">';

    $publicacion .= "<div class='feed_title'>";

    $publicacion .= "<img src='images/" . $key['fotoPerfil'] . "'/>";
    $publicacion .= "<span><b>" . $key['usuario'] . "</b> shared a <a>photo</a><br><p>" . $key['fecha'] . "</p></span>";
    $publicacion .= "<button style='padding: 5px;' onclick='location.href=\"modificarPublicacion.php?id=" . $key['_id'] . "\"'>Edit</button>";

    $publicacion .= "</div>";

    $publicacion .= "<div class='feed_content'>";
    $publicacion .= "<div class='feed_content_image'>";

    $publicacion .= "<a'><img src='images/" . $key['fotoContenido'] . "' /></a>";

    $publicacion .= "</div>";
    $publicacion .= "</div>";

    $publicacion .= "<div class='feed_footer'>";
    $publicacion .= "<ul class='feed_footer_left'>";

    $publicacion .= "<a href=" . url_base . "Backend/publicaciones/like.php?id=" . $key['_id'] . " style='color:#515365;'><li class='hover-orange'><i class='fa fa-heart'></i>" . count($key['likes']) . "</li></a>";
    $publicacion .= "<li><span>" . $key['descripcion'] . "</span></li>";

    $publicacion .= "</ul>";
    $publicacion .= "<ul class='feed_footer_right'>";
    $publicacion .= "<li>";

    $publicacion .= "<li class='hover-orange selected-orange'><i class='fa fa-share'></i>" . $key['shares'] . "</li>";
    $publicacion .= "<a style='color:#515365;'><li class='hover-orange'><i class='fa fa-comments-o'></i>" . $key['comments'] . "</li></a>";

    $publicacion .= "</li>";
    $publicacion .= "</ul>";
    $publicacion .= "</div>";

    $publicacion .= "</div>";
    $publicacion .= "</div>";
}

echo $publicacion;
?>