<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-body">
            <div class="card-header text-center">
                <a href="./home.php">
                <img src="./assets/images/Transjovalsa SA1.jpg" width="180" height="50" alt="logo"></a>
                <span class="splash-description">Ingrese su información.</span>
            </div>
            
            <h4 class="mb-2"></h4>
            <p class="mb-4"></p>
                <form action="./API/controllers/usuarios.controllers.php?op=login" class="mb-3" method="POST">
                    <?php if (isset($_GET['op'])) {
                        switch ($_GET['op']) {
                            case "1":
                    ?>
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        El usuario o la contraseña son incorrectos
                                    </div>
                                </div>
                            <?php
                                break;
                            case '2':
                            ?>
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        Por favor llene las casillas
                                    </div>
                                </div>
                    <?php
                        }
                    } ?>
                    <div class="mb-3">
                        <input class="form-control form-control-lg" id="correo" name= "correo" type="text" placeholder="Correo" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <input class="form-control form-control-lg" id="contrasenia" name= "contrasenia" type="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Recordar contraseña</span>
                        </label>
                    </div>
                    <button
                        type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesión
                    </button>
                </form>
            </div>
            <!--    REGISTRO DE USUARIO OCULTO POR PRIVILEGIOS
                <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="./app/views/usuarios/registroUsuario.views.php" class="footer-link">Crear cuenta</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="./app/views/usuarios/olvidarContrasenia.views.php" class="footer-link">Olvidé mi contraseña</a>
                </div>
            </div>-->
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

</body>
 
</html>