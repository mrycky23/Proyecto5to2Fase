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
    <link rel="stylesheet" href="../../../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../../../assets/vendor/inputmask/css/inputmask.css" />
</head>

<body>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Programacion de mantenimientos </h2>
                                    <p class="pageheader-text"></p>
<!--BREADCRUMBS-->
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Programacón de mantenimientos</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Ingresar datos: </h5>
                                    <div class="card-body">
                                        <form id="form-ProgramacionMantenimientos" method="post">
                                            <div class="form-group">
                                                <label for="nombreMantenimiento">Nombre de mantenimiento</label>
                                                <input id="nombreMantenimiento" name="nombreMantenimiento" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="campoRepuesto">Ingresar repuesto:</label>
                                                <div class="input-group mb-3">
                                                    <input id="campoRepuesto" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <button id="btn-ingresarRepuesto" type="button" class="btn btn-primary">Ingresar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="repuesto">Repuesto:</label>
                                                <select id="repuesto" name="repuesto" class="form-control"  required>
                                                    <option value="">Seleccionar</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="vehiculo">Vehículo:</label>
                                                <select  id="vehiculo" name="vehiculo" class="form-control" required>
                                                <option value="">Seleccionar</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="frecuencia">Frecuencia:</label>
                                                <select id="frecuencia" name="frecuencia" class="form-control" required>
                                                    <option value="undefined">Seleccionar</option>
                                                    <option value="hora">Horas</option>
                                                    <option value="kilometraje">Kilometro</option>
                                                    <option value="dia">Día</option>
                                                    <option value="mes">Mes</option>
                                                    <option value="anio">Año</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="duracion">Duración</label>
                                                <input id="duracion" name="duracion" type="number" class="form-control" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nota">Nota:</label>
                                                <textarea class="form-control" id="nota" name="nota" rows="3"></textarea>
                                            </div>
                                            <button id= "btn-guardar"  class="btn btn-lg btn-secondary btn-block">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../../../assets/libs/js/main-js.js"></script>
    <script src="../../../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
    <script src= "../../scripts/programacion_mant.script.js"></script>
</body>
 
</html>
