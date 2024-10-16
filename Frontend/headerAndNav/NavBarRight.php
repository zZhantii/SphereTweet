<div class="rowfixed"></div>
<div class="left_row">
    <div class="left_row_profile">
        <img id="portada" src="images/portada.jpg" />
        <div class="left_row_profile">
            <img id="profile_pic" src="images/<?php echo $fotoPerfil; ?>" />
            <span><?php echo $_SESSION['usuario'] ?><br>
                <p><?php echo $seguidores ?> followers / <?php echo $seguidos ?> follow</p>
            </span>
        </div>
    </div>
    <div class="rowmenu">
        <ul>
            <li><a href="index.php" id="rowmenu-selected"><i class="fa fa-globe"></i>Newsfeed</a></li>
            <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>         
        </ul>
    </div>
</div>