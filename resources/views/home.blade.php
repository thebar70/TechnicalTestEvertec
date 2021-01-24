<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tienda.com</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('asset/images/evertec.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('asset/atlantis/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('asset/atlantis/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});

    </script>


    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset/atlantis/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/atlantis/css/atlantis.min.css') }}">


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('asset/atlantis/css/demo.css') }}">



</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">


                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        
                    </div>

                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">

                    <ul class="nav nav-primary">
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menú</h4>
                        </li>
                        
                       

                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content" style ="background-color: #b8b6bd79;" >
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Tienda.com</h2>
                            </div>

                        </div>
                    </div>
                </div>
                
                @yield('script')
                @yield('content')
                
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        Prueba Técnica para Evertec <i class="fa fa-heart heart text-danger"></i> by <a
                            href="http://endurance-software.com.co/">Yeison Mosquera</a>
                    </div>
                </div>
            </footer>
        </div>



    </div>
    
    <!--   Core JS Files   -->
   
    <script src="{{ asset('asset/atlantis/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('asset/atlantis/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset/atlantis/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('asset/atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('asset/atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('asset/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('asset/atlantis/js/atlantis.min.js') }}"></script>

</body>

</html>
