<!DOCTYPE html>
<html>

    <head>
        <meta name="csrf-token" content="{{--csrf_token()--}}" />
        <meta name="api-token" content="{{--auth()->user()->api_token--}}" />
        @yield('styles')
    </head>

    <body class="hold-transition text-sm">
        <div>

            <!-- Navbar -->
            <nav class="navbar navbar-expand navbar-dark navbar-light">
                @yield('navbar')
            </nav>

            <!-- Content Wrapper. Contains page content -->
            <div>
                @yield('content')
            </div>

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                @yield('footer')
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        @yield('scripts')
        @yield('pageScripts')
    </body>

</html>
