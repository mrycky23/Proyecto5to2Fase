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
</head>

<body onload="initialize()">
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Google Map </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Maps</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Google Map</li>
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
                    <!-- basic map -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Map</h5>
                            <div class="card-body">
                                <div id="map" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic map -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- map events -->
                        <!-- ============================================================== -->
                        <div class="card">
                            <h5 class="card-header">Map Events</h5>
                            <div class="card-body">
                                <div id="map_1" class="gmaps"></div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end map events -->
                        <!-- ============================================================== -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- markers -->
                        <!-- ============================================================== -->
                        <div class="card">
                            <h5 class="card-header">Markers</h5>
                            <div class="card-body">
                                <div id="map_2" class="gmaps"></div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end markers -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- polylines -->
                        <!-- ============================================================== -->
                        <div class="card">
                            <h5 class="card-header">Polylines</h5>
                            <div class="card-body">
                                <div id="map_3" class="gmaps"></div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end polylines -->
                        <!-- ============================================================== -->
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- polygons -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Polygons</h5>
                            <div class="card-body">
                                <div id="map_4" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- polygons -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Routes</h5>
                            <div class="card-body">
                                <div id="map_5" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- polygons -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- routes advance -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Routes Advance</h5>
                            <div class="card-body">
                                <div id="map_6" class="gmaps"></div>
                                <a href="#" id="start_travel" class="btn btn-primary m-t-20">start</a>
                                <ul id="instructions">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end routes advance -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!--street advance -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Street View Panoramas</h5>
                            <div class="card-body">
                                <div id="panorama" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!--end street advance -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- map types -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Map Types</h5>
                            <div class="card-body">
                                <div id="map_7" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!--end map advance -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!--fusion tables -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Fusion Tables layers</h5>
                            <div class="card-body">
                                <div id="map_8" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!--end fusion tables layers -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!--kml layers -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">KML layers</h5>
                            <div class="card-body">
                                <div id="map_9" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end kml layers -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- geofences -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Geofences</h5>
                            <div class="card-body">
                                <div id="map_10" class="gmaps"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end geofences -->
                    <!-- ============================================================== -->
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
    <script src="../../../assets/libs/js/main-js.js"></script>
    <script src="../../../assets/libs/js/gmaps.min.js"></script>
    <script src="../../../assets/libs/js/google_map.js">
    </script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBUb3jDWJQ28vDJhuQZxkC0NXr_zycm8D0&amp;sensor=true"></script>
</body>
 
</html>