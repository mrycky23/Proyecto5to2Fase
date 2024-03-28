<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <link rel="stylesheet" href="../../../assets/vendor/bootstrap-select/css/bootstrap-select.css">
    <title>Conductores</title>
</head>

<body>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Conductores</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Conductores</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Lista</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Licencia</th>
                                                <th>Vigencia</th>
                                                <th>Edad</th>
                                                <th>Telefono</th>
                                                <th>Cedula</th>
                                                <th>Direccion</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0" id="ListaConductores">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!--<div class="section-block" id="basicform">
                            <h3 class="section-title">Datos:</h3>
                        </div>-->
                        <div class="card">
                            <h5 class="card-header">Ingresar conductor: </h5>
                            <div class="card-body">
                                <form id= "form-conductores" method="post">
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Nombre/s:</label>
                                        <input id="inputText4" type="text" name= "nombreConductor" id= "nombreConductor" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Apellido/s:</label>
                                        <input id="inputText4" type="text" name= "apellidoConductor" id= "apellidoConductor" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Telefono:</label>
                                        <input id="inputText4" type="text" name= "telefonoConductor" id= "telefonoConductor" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Cedula:</label>
                                        <input id="inputText4" type="text" name= "cedulaConductor" id= "cedulaConductor" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" name= "tipoLicencia" id= "tipoLicencia" class="col-form-label">Tipo Licencia:</label>
                                            <select class="selectpicker">
                                                <option>A1</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>C1</option>
                                                <option>D</option>
                                                <option>D1</option>
                                                <option>E</option>
                                                <option>EI</option>
                                                <option>G</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Vigencia:</label>
                                        <input id="inputText4" type="date" name= "vigencia" id= "vigencia" class="form-control" placeholder="dd-mm-aaaa">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Dirección:</label>
                                        <input id="inputText4" type="text" name= "direccionConductor" id= "direccionConductor" class="form-control" placeholder="">
                                    </div>
                                    <div class="aside-compose"><a class="btn btn-lg btn-secondary btn-block" href="#">Guardar</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright ©. All rights reserved. Developed by <a href="https://colorlib.com/wp/">Transjovalsa S.A</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
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
    <script src="../../../assets/vendor/bootstrap-select/js/bootstrap-select.js"></script>
    
    <script src="../../scripts/conductores.script.js"> </script>
</body>
 
</html>