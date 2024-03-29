<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
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
                            <h2 class="pageheader-title">Viajes</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Viajes</a></li>
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
                                                <th>Placa</th>
                                                <th>Chofer</th>
                                                <th>Fecha Partida</th>
                                                <th>Fecha Llegada</th>
                                                <th>Lugar Partida</th>
                                                <th>Lugar Destino</th>
                                                <th>KM Inicial</th>
                                                <th>KM Final</th>
                                                <th>Orden de trabajo</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>PCA - 9145</td>
                                                <td>Juan Maliza</td>
                                                <td>2022-02-05</td>
                                                <td>2022-02-07</td>
                                                <td>Base Mision</td>
                                                <td>Guayaquil Puerto</td>
                                                <td>1000256</td>
                                                <td>1000300</td>
                                                <td>01258-8965</td>
                                            </tr>
                                            
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Tipo Licencia</th>
                                                <th>Vigencia</th>
                                                <th>Edad</th>
                                                <th>Teléfono</th>
                                                <th>Cedula</th>
                                                <th>Dirección</th>
                                            </tr>
                                        </tfoot>-->
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
                            <h5 class="card-header">Ingresar viaje: </h5>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Seleccionar placa:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Seleccionar conductor:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Fecha Partida:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Fecha Llegada:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Lugar Partida:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Lugar Destino:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Km Inicial:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Km Final:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Orden de trabajo:</label>
                                        <input id="inputText4" type="text" class="form-control" placeholder="">
                                    </div>
                                   <!-- <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>-->
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nota:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                            Copyright © 2018 Tranjovalsa. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Tranjovalsa S.A</a>.
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
    
</body>
 
</html>