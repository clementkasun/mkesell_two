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
                <h1> Universities</h1>

            </div>
            <div class="col-sm-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Universities</li>
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
            <!--servicecat-->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add University</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id='uni_form'>
                        <div class="card-body">
                            <input type="text" id="university_id" hidden />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="comp_uni_name">University Name</label>
                                        <div><input type="text" class="form-control" name="comp_uni_name" id="comp_ins_name" placeholder="University Name" required></div>
                                    </div>
                                    <button id="save" type="button" class="btn btn-primary">Save</button>
                                    <button id="update" type="button" class="btn btn-warning d-none">Update</button>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">List Of Universities</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="univerTbl" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" colspan="3">No Data Found</td>
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
                    </form>
                </div>

            </div>
        </div>
        <!-- /.row -->
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
<script src="../../js/universityJS/uniJS.js"></script>
<!-- validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- AdminLTE App -->
<script>
    loadUniTable();
    $(document).ready(function() {
        var university_form;

        university_form = $("#uni_form").validate({
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
    });
    // Data Picker Initialization
    $('.datepicker').datepicker({
        inline: true
    });

    $("#save").click(function() {
        var is_valid = jQuery("#uni_form").valid();
        if (is_valid) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Record will be saved",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    save_uni_details();
                }
            });

        } else {
            Swal.fire("Failed!", "Invalid data found!", "warning");
        }
    });

    $("#update").click(function() {
        var is_valid = jQuery("#uni_form").valid();
        if (is_valid) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Record will be saved",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    update_uni_details($('#university_id').val());
                }
            });

        } else {
            Swal.fire("Failed!", "Invalid data found!", "warning");
        }
    });

    $(document).on('click', '.delete', function() {
        if (confirm('Are sure to delete the university!')) {
            Swal.fire("University!", "This vacancy will delete!", "danger");
            delete_uni_details(this.value);
        } else {
            Swal.fire("University!", "Deletion Cancelled!", "warning");
        }
    });

    jQuery.validator.setDefaults({
        errorElement: "span",
        ignore: ":hidden:not(select.chosen-select)",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                //                error.insertAfter(element.parent("label"));
                error.appendTo(element.parents("validate-parent"));
            } else if (element.is("select.chosen-select")) {
                error.insertAfter(element.siblings(".chosen-container"));
            } else if (element.prop("type") === "radio") {
                error.appendTo(element.parents("div.validate-parent"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            jQuery(element).parents(".validate-parent").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            jQuery(element).parents(".validate-parent").removeClass("has-error");
        }
    });

    jQuery.validator.addMethod("valide_code", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s\d\_\-()]{1,100}$/.test(value);
    }, "Please enter a valid Code");

    jQuery.validator.addMethod("valid_name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s\.\&\-()]*$/.test(value);
    }, "Please enter a valid name");

    jQuery.validator.addMethod("valid_date", function(value, element) {
        return this.optional(element) || /^\d{4}\-\d{2}\-\d{2}$/.test(value);
    }, "Please enter a valid date ex. 2017-03-27");


    jQuery.validator.addMethod("valide_email", function(value, element) {
        return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value);
    }, "Please enter a valid email addresss");


    jQuery.validator.addMethod("valid_lk_phone", function(value, element) {
        return this.optional(element) || /^(\+94)?\d{2,3}[-]?\d{7}$/.test(value);
    }, "Please enter a valid phone number");

    jQuery.validator.addMethod("valid_year", function(value, element) {
        return this.optional(element) || /^(19|20)\d{2}$/.test(value);
    }, "Please enter a valid year");
</script>
@endsection