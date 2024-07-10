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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="dashboard-wrapper">
        <div class="row">
            <div class="container-fluid  dashboard-content">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-1">Registro</h3>
                            <p>Por favor ingrese los datos de registro para un usuario</p>
                        </div>
                        <div class="card-body">
                            <form id= "form-registroUsuario" method="post">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="nombre" name="nombre" type="text" required="" placeholder="Nombre" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="apellido" name="apellido" type="text" required="" placeholder="Apellido" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="correo" name="correo" type="email"  required="" placeholder="Correo" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Ingresar nuevo rol (si no existe)</label>
                                    <div class="input-group mb-4">
                                        <input class="form-control" id="nuevoRol" name="nuevoRol" type="text"  required="" placeholder="Ingresar nuevo rol">
                                        <div>
                                            <button id="btn-ingresarRol" type="button" class="btn btn-primary">Ingresar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="roles">Seleccionar rol:</label>
                                    <select id="roles" name="roles" class="form-control" required></select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="contrasenia" name="contrasenia"  type="password" required="" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="confirmaContrasenia" type="password" required="" placeholder="Confirmar contraseña">
                                </div>
                                <div class="form-group pt-2" id= "btn-guardar" >
                                    <button type="button" class="btn btn-block btn-primary" >Registrar</button>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Al crear esta cuenta, acepta los<a href="#"> términos y condiciones</a></span>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    

    
    
    <!-- Optional JavaScript -->
    <script src="../../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../../../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../../../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../../../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../../../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../../../assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
    <script src="../../scripts/registroUsuario.script.js"> </script>
</body>

 
</html>