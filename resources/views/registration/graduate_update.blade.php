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
<link rel="stylesheet" href="/plugins/custom-css/graduate_update.css">

@endsection
@section('content')



<!-- Content Header (Page header) -->
<section class=" content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1> Graduate Update</h1>

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
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Graduate form for graduates and skill workers</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form id='graduate_registration'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name (මුල් නම)*</label>
                                        <div><input type="text" class="form-control" name="first_name" id="first_name" value="" placeholder="First Name" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name (අවසන් නම)*</label>
                                        <div><input type="text" class="form-control" name="last_name" id="last_name" value="" placeholder="Last Name" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address (ලිපිනය)*</label>
                                        <div><input type="text" class="form-control" name="address" id="address" value="" placeholder="Address" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Mobile No (ජංගම දූරකථන අංකය)*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <div><input type="text" class="form-control" name="tel" id="Telephone" value="" minlength="10" maxlength="10" placeholder="telephone" required></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email (විද්‍යුත් තැපෑල)*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label for="gender">Gender (ස්ත්‍රී පුරුෂ භාවය)*</label>
                                        <div class="form-check" required>
                                            <input class="form-check-input" type="radio" value="male" name="gender">
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check" required>
                                            <input class="form-check-input" type="radio" value="female" name="gender">
                                            <label class="form-check-label">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nic">NIC (ජාතික හැඳුනුම්පත)*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <div><input type="text" class="form-control" value="" name="nic" id="nic" minlength="10" maxlength="12" placeholder="NIC" required></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="person_type">Person Type (පුද්ගල වර්ගය)*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <div>
                                                    <select class="custom-select" id="person_type" name="person_type" required>
                                                        <option value="skill">Skill Worker</option>
                                                        <option value="graduate">Graduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth (උපන්දිනය)*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="dob" id="dob" maxlength="10" placeholder="DOB" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label for="civil_status">Civil Status (සිවිල් තත්වය)*</label>
                                        <div class="form-check" required>
                                            <input class="form-check-input" value="single" type="radio" name="civil_status">
                                            <label class="form-check-label">Single</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="married" type="radio" name="civil_status">
                                            <label class="form-check-label">Married</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="district">District (දිස්ත්‍රික්කය)*</label>
                                        <select class="custom-select" id="district" name="district" required>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="elec_division">Electrorate Division (ඡන්ද කොට්ටාශය)*</label>
                                        <select class="custom-select" id="elec_division" name="elec_division" required>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ds_division">DS Division (ප්‍රාදේශීය ලේකම් කාර්යාලය)*</label>
                                        <select class="custom-select" id="ds_division" name="ds_division" required>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gn_division">GN Division (ග්‍රාම සේවා නිලධාරී කාර්යාලය)*</label>
                                        <select class="custom-select" id="gn_division" name="gn_division_id" required>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nvq_level">NVQ Level (NVQ මට්ටම)</label>
                                        <select class="custom-select" id="nvq_level" name="nvq_level">
                                            <option value="0">N/A</option>
                                            <option value="1">NVQ Level 01</option>
                                            <option value="2">NVQ Level 02</option>
                                            <option value="3">NVQ Level 03</option>
                                            <option value="4">NVQ Level 04</option>
                                            <option value="5">NVQ Level 05</option>
                                            <option value="6">NVQ Level 06</option>
                                            <option value="7">NVQ Level 07</option>
                                            <option value="8">NVQ Level 08</option>
                                            <option value="9">NVQ Level 09</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sector">Sector (අංශය)*</label>
                                        <select class="custom-select" id="sector" name="sector" required>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category (අංශය යටතේ වර්ගය)*</label>
                                        <select class="custom-select" id="category" name="service_category_id" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="university">University (විශ්වවිද්‍යාලය)</label>
                                        <select class="custom-select" id="university" name="university_id">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="degree_type">Degree Type (උපාධි වර්ගය)</label>
                                        <select class="custom-select" id="degree_type" name="degree_type">
                                            <option value="general">General Degree</option>
                                            <option value="special">Special Degree</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="degree">Degree (උපාධිය)</label>
                                        <div id="the-basics">
                                            <input type="text" class="form-control typeahead" value="" name="degree" id="degree" placeholder="Degree Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="degree_class">Degree Class (උපාධි පන්තිය)</label>
                                        <select class="custom-select" id="degree_class" name="class">
                                            <option value="N/A">N/A</option>
                                            <option value="first_class">First-Class Honours</option>
                                            <option value="upper_second_class">Upper Second-Class Honours</option>
                                            <option value="lower_second_class">Lower Second-Class Honours</option>
                                            <option value="third_class">Third-Class Honours</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="degree_year">Degree Year (උපාධි වර්ෂය)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="number" class="form-control" value="" name="year" id="degree_year" maxlength="10" placeholder="DOB">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Educational Qualifications (අධ්‍යාපනික සුදුසුකම්)</label>
                                        <textarea class="form-control" rows="3" id="educational_qualification" name="educational_qualification" placeholder="Enter the Qualification"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>NIC Image 1 (ජාතික හැදුනුම්පත පළමු පැති පෙනුම)*</label>
                                        <div><input type="file" class="form-control mb-2" id="id_image" name="id_image" onchange="document.getElementById('nic_image').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg" required></div>
                                        <div>
                                            <div class="text-center"><img id="nic_image" class="d-none" src="" alt="NIC image one" width="100" height="100" /></div>
                                            <!-- <div class="text-center"><button type="button" id="btn_id_delete" class="btn btn-primary d-none" value=""><i class="fa fa-trash-alt" style="width: 10px" aria-hidden="true"></i></button></div> -->
                                        </div>
                                        <br><label class="text-danger">please select the images less than 2MB</label>
                                        <!-- <div class="text-center"><img id="nic_image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" NIC image" width="100" height="100" /></div> -->
                                    </div>
                                    <div class="form-group">
                                        <label>NIC Image 2 (ජාතික හැදුනුම්පත දෙවන පැති පෙනුම)*</label>
                                        <div><input type="file" class="form-control mb-2" id="id_image_two" name="id_image_two" onchange="document.getElementById('nic_image_two').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg" required></div>
                                        <div>
                                            <div class="text-center"><img id="nic_image_two" class="d-none" src="" alt="NIC image side two" width="100" height="100" /></div>
                                            <!-- <div class="text-center"><button type="button" id="btn_id_delete" class="btn btn-primary d-none" value=""><i class="fa fa-trash-alt" style="width: 10px" aria-hidden="true"></i></button></div> -->
                                        </div>
                                        <br><label class="text-danger">please select the images less than 2MB</label>
                                        <!-- <div class="text-center"><img id="nic_image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" NIC image" width="100" height="100" /></div> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Degree Certificate (උපාධි සහතිකය)</label>
                                        <div><input type="file" class="form-control mb-2" id="degree_cert" name="degree_cert" onchange="document.getElementById('degree_certificate').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg"></div>
                                        <div>
                                            <div class="text-center"><img id="degree_certificate" class="d-none" src="" alt=" Degree certificate" width="100" height="100" /></div>
                                            <!-- <div class="text-center"><button type="button" id="btn_degree_cert_delete" class="btn btn-primary d-none" value=""><i class="fa fa-trash-alt" style="width: 10px" aria-hidden="true"></i></button></div> -->
                                        </div>
                                        <br><label class="text-danger">please select the images less than 2MB</label>
                                        <!-- <div class="text-center"><img id="degree_certificate" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" Degree certificate" width="100" height="100" /></div> -->
                                    </div>
                                    <div class="form-group">
                                        <label>User Image (පරිශීලක ජායාරූපය)</label>
                                        <div><input type="file" class="form-control mb-2" id="user_img" name="user_img" onchange="document.getElementById('user_image').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg"></div>
                                        <div class="text-center"><img id="user_image" class="d-none" src="" alt="user image" width="100" height="100" /></div>
                                        <br><label class="text-danger">please select the images less than 2MB</label>
                                        <!-- <div class="text-center"><button type="button" id="btn_user_img_delete" class="btn btn-primary d-none" value=""><i class="fa fa-trash-alt" style="width: 10px" aria-hidden="true"></i></button></div> -->
                                        <!-- <div class="text-center"><img id="user_image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="user image" width="100" height="100" /></div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="update" type="button" value="{{ $id }}" class=" btn btn-warning pl-5 pr-5">Update</button>
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
            <script src="../../js/registrationJs/registration.js"></script>
            <script src="../../js/commenFunctions/file_upload.js"></script>
            <script src="../../plugins/typeahead/typeahead.js"></script>

            <!-- AdminLTE App -->
            <script>

                                            function validate_image_size(file_type, img_file) {
                                                if (img_file != undefined) {
                                                    var file = img_file;
                                                    if (Math.round(file.size / (1024 * 1024)) > 2) { // make it in MB so divide by 1024*1024
                                                        alert('Please select ' + file_type + ' size less than 2 MB');
                                                        return false;
                                                    }
                                                }
                                            }

                                            var degree_data = function () {
                                                var tmp = '';
                                                $.ajax({
                                                    'async': false,
                                                    'type': "GET",
                                                    'global': false,
                                                    'dataType': 'html',
                                                    'url': "/api/get_degrees",
                                                    'data': {'request': "", 'target': 'arrange_url', 'method': 'method_target'},
                                                    'success': function (data) {
                                                        tmp = data;
                                                    }
                                                });
                                                var tmp_two = '';
                                                $.each(JSON.parse(tmp), function (index, row) {
                                                    if (row.degree != null) {
                                                        if (index = 0) {
                                                            tmp_two += row.degree;
                                                        } else {
                                                            tmp_two += ',' + row.degree;
                                                        }
                                                    }
                                                });
                                                return tmp_two;
                                            }();

                                            console.log(degree_data);
                                            var degrees = degree_data.split(",");

                                            var substringMatcher = function (strs) {
                                                return function findMatches(q, cb) {
                                                    var matches, substringRegex;
                                                    // an array that will be populated with substring matches
                                                    matches = [];
                                                    // regex used to determine if a string contains the substring `q`
                                                    substrRegex = new RegExp(q, 'i');
                                                    // iterate through the pool of strings and for any string that
                                                    // contains the substring `q`, add it to the `matches` array
                                                    $.each(strs, function (i, str) {
                                                        if (substrRegex.test(str)) {
                                                            matches.push(str);
                                                        }
                                                    });
                                                    cb(matches);
                                                };
                                            };
                                            $('#the-basics .typeahead').typeahead({
                                                hint: true,
                                                highlight: true,
                                                minLength: 1
                                            },
                                                    {
                                                        name: 'degrees',
                                                        source: substringMatcher(degrees)
                                                    });


                                            $(window).on('load', function () {
                                                var UNIVERSITY_ID = "{{$data->university_name}}";
                                                var DISTRICT_ID = "{{$data->district_name}}";
                                                var DSDIVISIONID = "{{$data->ds_division_name}}";
                                                var GNDIVISIONID = "{{$data->gn_division_name}}";
                                                var ELECTDIVISIONID = "{{$data->electorate_division_name}}";
                                                var SECTORID = "{{$data->sector_name}}";
                                                var SERVICECATID = "{{$data->service_category_name}}";
                                                var GRADUATE_ID = "{{$data->graduate_id}}";

                                                // $.when(
                                                loadDistrictCombo(DISTRICT_ID, function () {
                                                    loadDsdivisionCombo(DSDIVISIONID, DISTRICT_ID, function () {
                                                        loadGndivisionCombo(GNDIVISIONID, DSDIVISIONID, function () {

                                                        });
                                                    });
                                                    loadelectrorateCombo(ELECTDIVISIONID, DISTRICT_ID, function () {

                                                    });
                                                });
                                                loadSectorsCombo(SECTORID, function () {
                                                    loadCategoryCombo(SERVICECATID, SECTORID, function () {

                                                    });
                                                });
                                                loadUniversityCombo(UNIVERSITY_ID);
                                                // ).then(function() {

                                                get_graduate_values(GRADUATE_ID);
                                                // });

                                                $('#district').change(function () {
                                                    loadDsdivisionCombo('', $('#district').val(), function () {
                                                        loadGndivisionCombo('', $('#ds_division').val(), function () {

                                                        });
                                                    });
                                                });
                                                $('#district').change(function () {
                                                    loadelectrorateCombo('', $('#district').val());
                                                });
                                                $('#ds_division').change(function () {
                                                    loadGndivisionCombo('', $('#ds_division').val());
                                                });
                                                $('#sector').change(function () {
                                                    loadCategoryCombo('', $('#sector').val());
                                                });
                                            });

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

                                            // $('#btn_id_delete').click(function() {
                                            //     delete_image($(this).val(), 'nic');
                                            // });

                                            // $('#btn_degree_cert_delete').click(function() {
                                            //     delete_image($(this).val(), 'degree');
                                            // });

                                            // $('#btn_user_img_delete').click(function() {
                                            //     delete_image($(this).val(), 'user');
                                            // });

                                            $("#update").click(function () {
                                                let nic_image = $('#id_image')[0].files[0];
                                                let nic_image_two = $('#id_image_two')[0].files[0];
                                                let degree_cert = $('#degree_cert')[0].files[0];
                                                let user_image = $('#user_img')[0].files[0];

                                                let nic_img_status = validate_image_size('nic_image', nic_image);
                                                let nic_img_two_status = validate_image_size('nic_image_two', nic_image_two);
                                                let degree_img_status = validate_image_size('degree_image', degree_cert);
                                                let user_img_status = validate_image_size('user_image', user_image);

                                                if (nic_img_status == false || nic_img_two_status == false || degree_img_status == false || user_img_status == false) {
                                                    return false;
                                                }

                                                var is_valid = jQuery("#graduate_registration").valid();
                                                if (is_valid) {
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: "Record will be Updated",
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Yes!'
                                                    }).then((result) => {
                                                        if (result.value) {
                                                            update_graduate_details($('#update').val());
                                                        }
                                                    });

                                                } else {
                                                    Swal.fire("Failed!", "Invalid data found!", "warning");
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
                                                return this.optional(element) || /^0[7][0-9]{8}$/.test(value);
                                            }, "Please enter a valid phone number");

                                            jQuery.validator.addMethod("valid_year", function (value, element) {
                                                return this.optional(element) || /^(19|20)\d{2}$/.test(value);
                                            }, "Please enter a valid year");
            </script>
            @endsection