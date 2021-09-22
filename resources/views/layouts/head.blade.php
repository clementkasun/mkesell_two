<!DOCTYPE html>
<html>

    <head>
        @yield('styles')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-208237465-1">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-208237465-1');
        </script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed text-sm">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
                @yield('navbar')
            </nav>
            <!-- Navbar -->
            <!-- Main Sidebar Container -->

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
