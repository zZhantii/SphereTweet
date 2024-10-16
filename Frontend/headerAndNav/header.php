<div class="navbar">
    <div class="navbar_menuicon" id="navicon">
        <i class="fa fa-navicon"></i>
    </div>
    <div class="navbar_logo">
        <img src="images/logo.webp" alt="" />
    </div>
    <div class="navbar_page">
        <span>SphereTweet</span>
    </div>

    <div class="navbar_search">
        <form method="POST" action="index.php">
            <input type="text" name="nameSearch" placeholder="Search people.." />
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="navbar_icons">
        <ul>
            <a href="index.php" style="color:white">
                <li><i class="fa fa-globe"></i></li>
            </a>
        </ul>
    </div>
    <div class="navbar_user" id="profilemodal" style="cursor:pointer">
        <img src="images/<?php echo $fotoPerfil; ?>" alt="" />
        <span id="navbar_user_top"><?php echo $_SESSION['usuario'] ?><br>
            <p>User</p>
        </span><i class="fa fa-angle-down"></i>
    </div>
</div>

<div class="modal modal-profile">
    <div class="modal-icon-select"><i class="fa fa-sort-asc" aria-hidden="true"></i></div>
    <div class="modal-title">
        <span>YOUR ACCOUNT</span>
        <a href="settings.php"><i class="fa fa-cogs"></i></a>
    </div>
    <div class="modal-content">
        <ul>
            <li>
                <a href="settings.php">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <span><b>Profile Settings</b><br>Yours profile settings</span>
                </a>
            </li>
            <li>
                <a href="../Backend/sesiones/salir.php">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <span><b>Log Out</b><br>Close your session</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="mobilemenu">

    <div class="mobilemenu_profile">
        <img id="mobilemenu_portada" src="images/portada.jpg" />
        <div class="mobilemenu_profile">
            <img id="mobilemenu_profile_pic" src="images/fotoPerfil.webp" /><br>
            <span><?php echo $_SESSION['usuario'] ?><br>
                <p><?php echo $seguidores ?> followers / <?php echo $seguidos ?> follow</p>
            </span>
        </div>
        <div class="mobilemenu_menu">
            <ul>
                <li><a href="index.php" id="mobilemenu-selected"><i class="fa fa-globe"></i>Newsfeed</a></li>
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
                    <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Page.html</a></li>
                    <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Group.html</a></li>
                </ul>
            </ul>
            <hr>
            <ul>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">FAQ's</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </div>
    </div>
</div>