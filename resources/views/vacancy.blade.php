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
                <h1> Vacancy Registration</h1>
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
            <div class="col-md-5">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Vacancy Details Form</h3>
                    </div>
                    <form id='vacancy_registration'>
                        <div class="card-body">
                            <input type="text" id="vacancy_id" value="" hidden />
                            <div class="form-group">
                                <label for="comp_ins_name">Company/Institute Name *</label>
                                <div>
                                    <input type="text" class="form-control" name="companey_name" id="companey_name" placeholder="Company/Institute Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="close_date">Start Date * </label>
                                <div>
                                    <input type="date" class="form-control" name="starting_date" id="starting_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="close_date">Closing Date * </label>
                                <div>
                                    <input type="date" class="form-control" name="closing_date" id="closing_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <div><input type="email" class="form-control" name="email" id="email" placeholder="Email"></div>
                            </div>
                            <div class="form-group">
                                <label for="fax_lbl">Contact Number *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <div><input type="number" class="form-control" name="tel" id="tel" minlength="10" maxlength="10" placeholder="Tel Number" required></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax_lbl">Fax Number</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <div><input type="number" class="form-control" name="fax" id="fax_num" minlength="10" maxlength="10" placeholder="Fax Number"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="con_person_lbl">Address *</label>
                                <div><input type="text" class="form-control" name="address" id="address" placeholder="Your Address" required></div>
                            </div>
                            <div class="form-group">
                                <label for="con_person_lbl">Contact Person *</label>
                                <div><input type="number" class="form-control" name="contact_person" id="contact_person" minlength="10" maxlength="10" placeholder="Contact Person" required></div>
                            </div>
                            <div class="form-group">
                                <label>Description *</label>
                                <div><textarea class="form-control" id="description" placeholder="description" required></textarea></div>
                            </div>
                            <div class="form-group">
                                <label for="">Vacancy Type *</label>
                                <div><input type="text" class="form-control" name="vacancy_type" id="vacancy_type" placeholder="Vacancy type" required></div>
                            </div>
                            <div class="form-group">
                                <label for="sector">Sector *</label>
                                <select class="custom-select" id="sector" name="sector" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category *</label>
                                <select class="custom-select" id="category" name="catagory" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="notify_which">Notify *</label>
                                <div>
                                    <select class="custom-select" id="notify_which" name="notify_which" required>
                                        <option value="1">To Sectors</option>
                                        <option value="2">To Service Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" class="form-control" id="vacancy_image" name="vacancy_image" onchange="document.getElementById('vac_image').src = window.URL.createObjectURL(this.files[0])">
                                <img id="vac_image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" name="vac_image" alt="Vacancy image" width="100" height="100" />
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="save" type="button" class="btn btn-primary pl-5 pr-5">Save</button>
                                <button id="update" type="button" class="btn btn-success d-none pl-5 pr-5">Update</button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">List Of Vacancies</h3>
                </div>
                <div class="card-body">
                    <table id="vacancyTbl" class="table table-bordered table-hover" style="table-layout: fixed; width:100%">
                        <thead>
                            <tr>
                                <th style="width: 14%">#</th>
                                <th style="width: 20%">Company Name</th>
                                <th style="width: 18%">Tel No</th>
                                <th style="width: 25%">Vacancy Type</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="5"><b>No Data</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
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
<script src="../../js/commenFunctions/file_upload.js"></script>
<script src="../../js/VacanciesJS/vacancies.js"></script>

<!-- AdminLTE App -->
<script>
                                    $(document).ready(function () {
                                        loadSectorsCombo(function () {
                                            let sector_id = $("#sector").val();
                                            loadCategoryCombo(sector_id);
                                        });

                                        loadVacanciesTable();

                                        $('#sector').change(function () {
                                            loadCategoryCombo(this.value);
                                        });

                                        var vacancy_registration;

                                        vacancy_registration = $("#vacancy_registration").validate({
                                            errorClass: "invalid",
                                            rules: {
                                                tel: {
                                                    valid_lk_phone: true,
                                                },
                                                contact_person: {
                                                    valid_lk_phone: true,
                                                },
                                                email: {
                                                    valide_email: true,
                                                }
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
                                    });

                                    $("#save").click(function () {
                                        var is_valid = jQuery("#vacancy_registration").valid();
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
                                                    Swal.fire("Success!", "Successfully saved the Vacancy!", "success");
                                                    save_vacancy_details();
                                                }
                                            });

                                        } else {
                                            Swal.fire("Missing Fields!", "Please fill the required details!", "warning");
                                        }

                                    });

                                    $("#update").click(function () {
                                        var is_valid = jQuery("#vacancy_registration").valid();
                                        let vacancy_id = $('#update').val();
                                        if (is_valid) {
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "Record will be updated",
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes!'
                                            }).then((result) => {
                                                if (result.value) {
                                                    console.log(vacancy_id);
                                                    update_vacancy_details(vacancy_id);
                                                }
                                            });

                                        } else {
                                            Swal.fire("Missing Fields!", "Please fill the required details!", "warning");
                                        }

                                    });

                                    $(document).on('click', '.btn-del', function () {
                                        if (confirm('Are sure to delete the Vacancy!')) {
                                            Swal.fire("Vacancy!", "This vacancy will delete!", "danger");
                                            let vacancy_id = $(this).val();
                                            deleteVacancy(vacancy_id, function () {

                                            });
                                        } else {
                                            Swal.fire("Vacancy!", "Deletion Cancelled!", "warning");
                                        }
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
                                        return this.optional(element) || /^(\+94)?\d{2,3}[-]?\d{7}$/.test(value);
                                    }, "Please enter a valid phone number");

                                    jQuery.validator.addMethod("valid_year", function (value, element) {
                                        return this.optional(element) || /^(19|20)\d{2}$/.test(value);
                                    }, "Please enter a valid year");

                                    // Data Picker Initialization
                                    $('.datepicker').datepicker({
                                        inline: true
                                    });

                                    function formValidation() {
                                        let response = true;
                                        if ($('#Telephone').val().trim().length !== 10) {
                                            alert('Invalid Mobile Number');
                                            var elem = document.getElementById("Telephone");
                                            input.addEventListener("invalid", function (evt) {
                                                //                                                                var elem = evt.srcElement;
                                                //                                                                elem.nextSibling.innerText = elem.validationMessage;
                                            });
                                            return false;
                                        } else if ($('#first_name').val() == '') {
                                            alert('Enter Firstname');
                                            response = false;
                                        }
                                        return response;
                                    }
</script>
@endsection