<!DOCTYPE html>
<html>

    <head>
        @yield('styles')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed text-sm">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
                @yield('navbar')
            </nav>
            <!-- Navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevaprimarytion-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <span class="brand-text font-weight-light">VEHICLEWORLD.COM</span>
                </a>

                
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                @yield('footer')
            </footer>

           
        </div>
        <!-- ./wrapper -->
        @yield('scripts')
        @yield('pageScripts')
    </body>

</html>
