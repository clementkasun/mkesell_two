@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.footer')

@section('pageStyles')
<!-- Select2 -->
<link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="./plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<!--<link rel="stylesheet" href="./dist/css/adminlte.min.css">-->
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">
<!-- sweet alert -->
<link rel="stylesheet" href="./plugins/custom-css/graduate_update.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class=" content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1> <b class="text-primary">Customer Registration</b> </h1>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title"><b>Customer Registration</b></h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form id='customer_registration'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name*</label>
                                        <div><input type="text" class="form-control" name="firstName" id="firstName" value="" placeholder="FIRST NAME" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name*</label>
                                        <div><input type="text" class="form-control" name="lastName" id="lastName" value="" placeholder="LAST NAME" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contactNo">Mobile No*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <div><input type="text" class="form-control" name="contactNo" id="contactNo" value="" minlength="10" maxlength="10" placeholder="TELPHONE" required></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="email" class="form-control" name="email" id="email" value="" placeholder="EMAIL">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nic">NIC*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="nic" id="nic" value="" placeholder="NIC" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <textarea class="form-control" name="location" id="location" value="" placeholder="Location" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_origin">Password*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="password" class="form-control" name="password_origin" id="password_origin" value="" placeholder="PASSWORD" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirm">Confirm Password*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="CONFIRM PASSWORD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-secondary text-center p-5" style="width: 100%; height: 100%; border-radius: 15px">
                                        <div class="bg-light" style="width: 95%; height: 60%">
                                            <img src="{{asset('storage/System/avater.png')}}" style="width: 95%; height: 80%"/><br>
                                            <div><h1><b>VEHICLEWORLD.COM</b></h1></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="save_customer" type="button" class=" btn btn-warning pl-5 pr-5"><b>SAVE</b></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            @endsection

            @section('pageScripts')
            <!-- Page script -->

            <!-- Select2 -->
            <script src="./plugins/select2/js/select2.full.min.js"></script>
            <!-- sweetalert -->
            <script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- validation -->
            <script src="./plugins/jquery-validation/jquery.validate.min.js"></script>
            <!-- Bootstrap4 Duallistbox -->
            <script src="./plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
            <!-- InputMask -->
            <script src="./plugins/moment/moment.min.js"></script>
            <script src="./plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

            <script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Bootstrap Switch -->
            <script src="./plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
            <script src="./dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="./dist/js/demo.js"></script>
            <script src="./js/userjs/submit.js"></script>
            <script src="./js/registrationJs/registration.js"></script>
            <script src="./js/commenFunctions/file_upload.js"></script>
            <script src="./plugins/typeahead/typeahead.js"></script>

            <!-- AdminLTE App -->
            <script>
                var degree_registration;

                graduate_registration = jQuery("#graduate_registration").validate({
                    errorClass: "invalid",
                    rules: {
                        tel: {
                            valid_lk_phone: true,
                        },
                        email: {
                            valide_email: true,
                        },
                    },
                    highlight: function (element) {
                        $(element).parent().addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element).parent().removeClass('has-error');
                    },
                    errorElement: 'span',
                    errorClass: 'validation-error-message help-block form-helper bold',
                    errorPlacement: function (error, element) {
                        if (element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });

                $("#save_customer").click(function () {
                    var data = {
                        email: $('#email').val(),
                        nic: $('#nic').val()
                    };
                    let url_email_nic = "/api/is_email_nic_exist";

                    ajaxRequest("POST", url_email_nic, data, function (resp) {
                        if (resp == 1) {
                            $('#email').addClass('has-error');
                            $('#nic').addClass('has-error');
                            Swal.fire("Failed!", "Email or NIC already exist!", "warning");
                        } else {
                            $('#email').removeClass('has-error');
                            $('#nic').removeClass('has-error');
                            if ($('#password_origin').val() == '' || $('#password_confirm').val() == '') {
                                $('#password_origin').addClass('has-error');
                                $('#password_confirm').addClass('has-error');
                                Swal.fire("Failed!", "Password fields is required to register!", "warning");
                            }
                            if ($('#password_origin').val() != $('#password_confirm').val()) {
                                $('#password_origin').addClass('has-error');
                                $('#password_confirm').addClass('has-error');
                                Swal.fire("Failed!", "Confirm password is need to same as password!", "warning");
                            } else {
                                $('#password_origin').removeClass('has-error');
                                $('#password_confirm').removeClass('has-error');
                                var is_valid = jQuery("#customer_registration").valid();
                                if (is_valid) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Record will be Saved",
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes!'
                                    }).then((result) => {
                                        if (result.value) {
                                            save_cus_details();
                                        }
                                    });
                                } else {
                                    Swal.fire("Failed!", "Invalid data found!", "warning");
                                }
                            }
                        }
                    });
                });

                jQuery.validator.setDefaults({
                    errorElement: "span",
                    ignore: ":hidden:not(select.chosen-select)",
                    errorPlacement: function (error, element) {
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
                    highlight: function (element, errorClass, validClass) {
                        jQuery(element).parents(".validate-parent").addClass("has-error").removeClass("has-success");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        jQuery(element).parents(".validate-parent").removeClass("has-error");
                    }
                });

                jQuery.validator.addMethod("valide_code", function (value, element) {
                    return this.optional(element) || /^[a-zA-Z\s\d\_\-()]{1,100}$/.test(value);
                }, "Please enter a valid Code");

                jQuery.validator.addMethod("valid_name", function (value, element) {
                    return this.optional(element) || /^[a-zA-Z\s\.\&\-()]*$/.test(value);
                }, "Please enter a valid name");

                jQuery.validator.addMethod("valid_date", function (value, element) {
                    return this.optional(element) || /^\d{4}\-\d{2}\-\d{2}$/.test(value);
                }, "Please enter a valid date ex. 2017-03-27");


                jQuery.validator.addMethod("valide_email", function (value, element) {
                    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value);
                }, "Please enter a valid email addresss");


                jQuery.validator.addMethod("valid_lk_phone", function (value, element) {
                    return this.optional(element) || /^0[7][0-9]{8}$/.test(value);
                }, "Please enter a valid phone number");

                jQuery.validator.addMethod("valid_year", function (value, element) {
                    return this.optional(element) || /^(19|20)\d{2}$/.test(value);
                }, "Please enter a valid year");
            </script>
            @endsection

