<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Register - Social Network</title>
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/login/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/main.css">

    <!-- Icons FontAwesome 4.7.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />




</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <form action="../Backend/registro/autentificadorRegistro.php" class="login100-form validate-form"
                    method="POST" enctype="multipart/form-data">
                    <span class="login100-form-title">
                        Member Register
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid user is required">
                        <input class="input100" type="text" name="user" placeholder="Username" pattern="[a-zA-Z0-9]+"
                            required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" pattern="[a-zA-Z0-9@\]+"
                            required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password"
                            pattern="[a-zA-Z0-9@\._]+" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="repeatPassword" placeholder="Repeat Password"
                            pattern="[a-zA-Z0-9@\._]+" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="input-div">
                        <input class="input" name="fotoPerfil" type="file">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round"
                            stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none"
                            stroke="currentColor" class="icon">
                            <polyline points="16 16 12 12 8 16"></polyline>
                            <line y2="21" x2="12" y1="12" x1="12"></line>
                            <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                            <polyline points="16 16 12 12 8 16"></polyline>
                        </svg>
                    </div>

                    <?php
                    if (isset($_GET["messageError"])) {
                        if ($_GET["messageError"] == 4) {
                            echo "<span style='color:red'>El nombre ya existe</span>";
                        } else if ($_GET["messageError"] == 5) {
                            echo "<span style='color:red'>El correo ya existe</span>";
                        } else if ($_GET["messageError"] == 6) {
                            echo "<span style='color:red'>Las contraseñas no coinciden</span>";
                        }
                    }
                    ?>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="login.php">
                            Login Now
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-pic js-tilt" data-tilt>
                    <a href="index.php"><img src="images/logo.webp" alt=""></a>
                </div>
            </div>
        </div>
    </div>



    <script src="js/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>



</body>

</html>