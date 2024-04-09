<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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

        .card {
            margin-top: 20px; /* Agrega margen superior al formulario */
        }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" id= "form-registro"  method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registro</h3>
                <p>Por favor ingrese sus datos de registro</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" id="nombre" name="nombre" type="text" required="" placeholder="nombre" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="apellido" name="apellido" type="text" required="" placeholder="apellido" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="correo" name="correo" type="email"  required="" placeholder="Correo" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="contrasenia" name="contrasenia"  type="password" required="" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg"  required="" placeholder="Confirmar">
                </div>
                <div class="form-group pt-2">
                    <button id= "btn-guardar" class="btn btn-block btn-primary" type="submit">Registrarme</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Al crear esta cuenta, acepta los<a href="#">terminos y condiciones</a></span>
                    </label>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Ya es miembro?<a href="../../../login.php" class="text-secondary">Iniciar sesion aquí.</a></p>
            </div>
        </div>
    </form>

    <script src="../../scripts/registroUsuario.script.js"> </script>
</body>

 
</html>