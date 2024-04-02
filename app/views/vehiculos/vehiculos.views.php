<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vehiculos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
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
                            <h2 class="pageheader-title">Vehiculos</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Vehiculos</a></li>
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
                            <h5 class="card-header">Listado de vehiculos</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Placa</th>
                                                <th>Tipo</th>
                                                <th>Tonelaje</th>
                                                <th>Clase</th>
                                                <th>Color</th>
                                                <th>Año</th>
                                                <th>Marca</th>
                                                <th>Chasis</th>
                                                <th>Motor</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0" id="ListaVehiculos">
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
                        <div class="card">
                            <h5 class="card-header">Ingresar vehiculo: </h5>
                            <div class="card-body">
                                <form id= "form-vehiculos" method="post">
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Placa:</label>
                                        <input id="placa" name= "placa"type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Tipo:</label>
                                        <input id="tipo" name = "tipo" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Tonelaje:</label>
                                        <input id="tonelaje" name= "tonelaje" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Clase:</label>
                                        <input id="clase" name="clase" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Color:</label>
                                        <input id="color" name= "color" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Año:</label>
                                        <input id="anio" name="anio" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Marca:</label>
                                        <input id="marca" name= "marca" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Chasis:</label>
                                        <input id="chasis" name= "chasis" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Motor:</label>
                                        <input id="motor" name= "motor" type="text" class="form-control" placeholder="">
                                    </div>
                                   <!-- <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>-->
                                    <div id="btn-guardar" class="aside-compose"><button type="button" class="btn btn-lg btn-secondary btn-block">Guardar</button></div>
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
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
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
    
    <script src="../../scripts/vehiculos.script.js"> </script>
</body>
 
</html>