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

    <title>Profile Settings - Social Network</title>
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

            <div class="row border-radius">
                <div class="settings shadow">
                    <div class="settings_title">
                        <h3>Account Settings</h3>
                    </div>
                    <div class="settings_content">
                        <ul>
                            <li>
                                <p><b>Notifications Sound</b><br>A sound will be played each time you receive a new
                                    activity notification</p>
                                <label class="switch"><input type="checkbox" class="primary"><span
                                        class="slider round"></span></label>
                            </li>
                            <li>
                                <p><b>Notifications Email</b><br>We’ll send you an email to your account each time you
                                    receive a new activity notification</p>
                                <label class="switch"><input type="checkbox" class="primary" checked><span
                                        class="slider round"></span></label>
                            </li>
                            <li>
                                <p><b>Friend’s Birthdays</b><br>Choose wheather or not receive notifications about your
                                    friend’s birthdays on your newsfeed</p>
                                <label class="switch"><input type="checkbox" class="primary" checked><span
                                        class="slider round"></span></label>
                            </li>
                            <li>
                                <p><b>Chat Message Sound</b><br>A sound will be played each time you receive a new
                                    message on an inactive chat window</p>
                                <label class="switch"><input type="checkbox" class="primary"><span
                                        class="slider round"></span></label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="suggestions_row">
            <div class="row shadow">
                <div class="row_title">
                    <span>Profile Settings</span>
                </div>
                <div class="menusetting_contain">
                    <ul>
                        <li>
                            <a href="Personal-Information.php">Personal Information</a>
                        </li>
                        <li>
                            <a href="settings.php" id="settings-select">Account Settings</a>
                        </li>
                        <li>
                            <a href="Change-Password.php">Change Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>



    <!-- Modal Messages -->
    <div class="modal modal-comments">
        <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
        <div class="modal-title">
            <span>CHAT / MESSAGES</span>
            <a href="messages.php"><i class="fa fa-ellipsis-h"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="#">
                        <img src="images/user-7.jpg" alt="" />
                        <span><b>Diana Jameson</b><br>Hi James! It’s Diana, I just wanted to let you know that we have
                            to reschedule...<p>4 hours ago</p></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Elaine Dreyfuss</b><br>We’ll have to check that at the office and see if the client is
                            on board with...<p>Yesterday at 9:56pm</p></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-3.jpg" alt="" />
                        <span><b>Jake Parker</b><br>Great, I’ll see you tomorrow!.<p>4 hours ago</p></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Modal Friends -->
    <div class="modal modal-friends">
        <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
        <div class="modal-title">
            <span>FRIEND REQUESTS</span>
            <a href="friends.php"><i class="fa fa-ellipsis-h"></i></a>
        </div>
        <div class="modal-content">
            <ul>
                <li>
                    <a href="#">
                        <img src="images/user-2.jpg" alt="" />
                        <span><b>Tony Stevens</b><br>4 Friends in Common</span>
                        <button class="modal-content-accept">Accept</button><button
                            class="modal-content-decline">Decline</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-6.jpg" alt="" />
                        <span><b>Tamara Romanoff</b><br>2 Friends in Common</span>
                        <button class="modal-content-accept">Accept</button><button
                            class="modal-content-decline">Decline</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/user-4.jpg" alt="" />
                        <span><b>Nicholas Grissom</b><br>1 Friend in Common</span>
                        <button class="modal-content-accept">Accept</button><button
                            class="modal-content-decline">Decline</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <!-- NavMobile -->
    <div class="mobilemenu">

        <div class="mobilemenu_profile">
            <img id="mobilemenu_portada" src="images/portada.jpg" />
            <div class="mobilemenu_profile">
                <img id="mobilemenu_profile_pic" src="images/<?php echo $fotoPerfil; ?>" /><br>
                <span> <?php echo $_SESSION["usuario"] ?><br>
                    <p>150k followers / 50 follow</p>
                </span>
            </div>
            <div class="mobilemenu_menu">
                <ul>
                    <li><a href="index.php"><i class="fa fa-globe"></i>Newsfeed</a></li>
                    <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="friends.php"><i class="fa fa-users"></i>Friends</a></li>
                    <li><a href="messages.php"><i class="fa fa-comments-o"></i>messages</a></li>
                    <li class="primarymenu"><i class="fa fa-compass"></i>Explore</li>
                    <ul class="mobilemenu_child">
                        <li style="border:none"><a href="#"><i class="fa fa-globe"></i>Activity</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Friends</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Groups</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Pages</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-file"></i>Saves</a></li>
                    </ul>
                    <li class="primarymenu"><i class="fa fa-user"></i>Rapid Access</li>
                    <ul class="mobilemenu_child">
                        <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Page.php</a></li>
                        <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Group.php</a></li>
                    </ul>
                </ul>
                <hr>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQ's</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="../Backend/sesiones/salir.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

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