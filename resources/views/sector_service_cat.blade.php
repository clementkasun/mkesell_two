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
                <h1>Sectors & Service Category</h1>

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
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    <h6><b>Sector</b></h6>
                </a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <h6><b>Servie Category</b></h6>
                </a>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <!-- form start -->
                <form id='save_sectors'>
                    <div class="card-body">
                        <input type="text" id="sector_id" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comp_ins_name">Sector Name</label>
                                    <div><input type="text" class="form-control" name="sector_name" id="sector_name" placeholder="Sector Name" style="width: 250px" required></div>
                                </div>
                                <button id="save_sector" class="btn btn-success pl-5 pr-5">Save</button>
                                <button id="update_sector" class="btn btn-warning pl-5 pr-5 d-none">Update</button>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <!-- <div class="card-header">
                                            <h3 class="card-title">List Of Sectors</h3>
                                        </div> -->
                                    <div class="card-body">
                                        <table id="sectorsTbl" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sector</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" colspan="3"><b>No Data Found</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- form start -->
                <form id='service_cat'>
                    <div class="card-body">
                        <input type="text" id="service_cat_id" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group col-6">
                                    <label for="comp_sector_id">Sector name</label>
                                    <select class="form-control" name="comp_sector_id" id="comp_sector_id" required></select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="comp_service_cat_name">Service Category Name</label>
                                    <div><input type="text" class="form-control" name="comp_service_cat_name" id="comp_service_cat_name" placeholder="Service Category Name" required></div>
                                </div>
                                <button id="save_service_cat" class="btn btn-success pl-5 pr-5 ml-2">Save</button>
                                <button id="update_service_cat" class="btn btn-warning pl-5 pr-5 ml-2 d-none">Update</button>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <!-- <div class="card-header">
                                            <h3 class="card-title">List Of Service Category</h3>
                                        </div> -->
                                    <div class="card-body">
                                        <table id="serviceTbl" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sector</th>
                                                    <th>Service Category</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" colspan="4">No Data Found</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


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
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../js/userjs/submit.js"></script>
<script src="../../js/sectors&ServiceJS/sectServiceScript.js"></script>

<!-- AdminLTE App -->
<script>
    loadSectorTable();
    loadServiceCatTable();
    loadSectorCombo();

    var sector_form;

    sector_form = $("#save_sectors").validate({
        errorClass: "invalid",
        highlight: function(element) {
            $(element).parent().addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).parent().removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'validation-error-message help-block form-helper bold',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    var service_category_form;

    service_category_form = $("#service_cat").validate({
        errorClass: "invalid",
        highlight: function(element) {
            $(element).parent().addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).parent().removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'validation-error-message help-block form-helper bold',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    // Data Picker Initialization
    $('.datepicker').datepicker({
        inline: true
    });

    $(document).on("click", "#save_sector", function() {
        var is_valid = jQuery("#save_sectors").valid();
        if (is_valid) {
            save_sector_details();
        } else {
            Swal.fire("Failed!", "Invalid data found!", "warning");
        }
    });

    $(document).on("click", "#update_sector", function() {
        var is_valid = jQuery("#save_sectors").valid();
        if (is_valid) {
            update_sector(id);
        } else {
            Swal.fire("Failed!", "Invalid data found!", "warning");
        }
    });

    $(document).on("click", "#save_service_cat", function() {
        var is_valid = jQuery("#service_cat").valid();
        if (is_valid) {
            save_service_cat_details();
        } else {
            Swal.fire("Failed!", "Invalid data found!", "warning");
        }
    });

    $(document).on("click", "#update_service_cat", function() {
        var is_valid = jQuery("#service_cat").valid();
        if (is_valid) {
            let id = $('#service_cat_id').val();
            update_service_cat(id);
        } else {
            Swal.fire("Failed!", "Invalid data found!", "warning");
        }
    });
</script>
@endsection