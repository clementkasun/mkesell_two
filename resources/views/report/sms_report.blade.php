@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')
<!-- Select2 -->
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
<!-- sweet alert -->

<style>
    .invalid {
        color: #FF0000;
    }
</style>
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">

            </div>
            <div class="col-sm-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Registration</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">SMS REPORT</h3>
                    </div>
                    <div class="card-body">
                        <table id="tbl_sms_report" class="table table-bordered table-hover table-stripped" style="table-layout: fixed">
                            <thead>
                                <tr>
                                    <th style="width: 80px">#</th>
                                    <th style="width: 200px">First Name</th>
                                    <th style="width: 200px">Last Name</th>
                                    <th style="width: 200px">Contact Number</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center"><b>No Data</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>

@endsection


@section('pageScripts')
<!-- Page script -->
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- sweetalert -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE App -->
<script>
    
    loadSmsReport();

    function loadSmsReport() {
        msg_list = $('#tbl_sms_report').DataTable({
            "destroy": true,
            "processing": true,
            "colReorder": true,
            "serverSide": false,
            "pageLength": 10,
            language: {
                searchPlaceholder: "Search..."
            },

            "ajax": {
                "url": "/api/get_sms_report",
                "type": "GET",
                "dataSrc": ""
            },
            "columns": [{
                    "data": ""
                },
                {
                    "data": "graduates_fname",
                    "defaultContent": "-"
                },
                {
                    "data": "graduates_lname",
                    "defaultContent": "-"
                },
                {
                    "data": "contact_number",
                    "defaultContent": "-"
                },
                {
                    "data": "message",
                    "defaultContent": "-"
                }
            ]
        });

        $(function() {
            var t = $("#tbl_sms_report").DataTable();
            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });

        //data table error handling
        $.fn.dataTable.ext.errMode = 'none';
        $('#tbl_sms_report').on('error.dt', function(e, settings, techNote, message) {
            console.log('DataTables error: ', message);
        });
    }
</script>
@endsection