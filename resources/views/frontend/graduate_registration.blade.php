<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Registration</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!--tosts-->
        <!-- Toastr -->
        <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <style>
            .error {
                color: red;
            }

            .has-error {
                color: red;
            }

            .success {
                color: green;
            }

            .has-success {
                color: green;
            }

            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input { 
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            .typeahead,
            .tt-query,
            .tt-hint {
                height: 30px;
                padding: 8px 12px;
                font-size: 24px;
                line-height: 30px;
                border: 2px solid #ccc;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                outline: none;
            }

            .typeahead {
                background-color: #fff;
            }

            .typeahead:focus {
                border: 2px solid #0097cf;
            }

            .tt-query {
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
                color: #999
            }

            .tt-dropdown-menu {
                width: 422px;
                margin-top: 3px;
                padding: 8px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {
                padding: 3px 20px;
                font-size: 18px;
                line-height: 24px;
                color: black;
                background-color: white;
            }

            .tt-suggestion.tt-cursor {
                color: #fff;
                background-color: #0097cf;
            }

            .tt-suggestion p {
                margin: 0;
                font-size: 18px;
                text-align: left;
            }

            .twitter-typeahead {
                width: 100%;
            }
        </style>
    </head>

    <body class="hold-transition layout-top-nav">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container">
                    <a href="/new_registration" class="navbar-brand">
                        <span class="brand-text font-weight-light"><img style="max-height: 50px;" alt="HRDA - NW" src="dist/img/HRDA-NEWLOGO.png"></span>
                    </a>
                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!--                        <ul class="navbar-nav">
                                                        <li class="nav-item">
                                                            <a href="/dashboard" class="nav-link">Home</a>
                                                        </li>
                                                    </ul>-->
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0"><small>Customer Registration</small></h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        <div class="card card-primary verRegister">
                            <div class="card-header">
                                <h3 class="card-title">Registration Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <form id='graduate_registration'>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <div><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <div><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <div><input type="text" class="form-control" name="address" id="address" placeholder="Address" required></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone">Mobile No</label>
                                                <div><input type="text" class="form-control" name="tel" id="Telephone" minlength="10" maxlength="10" placeholder="0712233456" required></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <div><input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" required></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender*</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="male" name="gender" checked="true">
                                                            <label class="form-check-label">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="female" name="gender">
                                                            <label class="form-check-label">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="civil_status">Civil Status*</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="single" type="radio" name="civil_status" required checked="true">
                                                            <label class="form-check-label">Single</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="married" type="radio" name="civil_status" required>
                                                            <label class="form-check-label">Married</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="person_type">Person Type *<small>(පුද්ගල වර්ගය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="person_type" name="person_type" required>
                                                        <option value="">Not Selected</option>
                                                        <option value="skill">Skill Worker</option>
                                                        <option value="graduate">Graduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nic">NIC*<small>(ජාතික හැඳුනුම්පත)</small></label>
                                                <div><input type="text" class="form-control" name="nic" id="nic" minlength="10" maxlength="12" placeholder="670022331V" required></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Date of Birth*<small>(උපන්දිනය)</small></label>
                                                <div><input type="date" class="form-control" name="dob" id="dob" maxlength="10" placeholder="DOB" required></div>
                                            </div>
                                            <!-- radio -->
                                            <div class="form-group">
                                                <label for="district">District*<small>(දිස්ත්‍රික්කය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="district" name="district" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="elec_division">Electrorate Division*<small>(ඡන්ද කොට්ටාශය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="elec_division" name="elec_division" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ds_division">DS Division*<small>(ප්‍රාදේශීය ලේකම් කාර්යාලය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="ds_division" name="ds_division" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="gn_division">GN Division*<small>(ග්‍රාම සේවා නිලධාරී කාර්යාලය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="gn_division" name="gn_division_id" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="university">University<small>(විශ්වවිද්‍යාලය)</small></label>
                                                <select class="custom-select" id="university" name="university_id">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="degree_type">Degree Type<small>(උපාධි වර්ගය)</small></label>
                                                <select class="custom-select" id="degree_type" name="degree_type">
                                                    <option value="N/A">N/A</option>
                                                    <option value="general">General Degree</option>
                                                    <option value="special">Special Degree</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="degree">Degree<small>(උපාධිය)</small></label>
                                                <div id="the-basics">
                                                    <input type="text" class="form-control typeahead" name="degree" id="degree" placeholder="Degree Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="degree_class">Degree Class<small>(උපාධි පන්තිය)</small></label>
                                                <select class="custom-select" id="degree_class" name="class">
                                                    <option value="N/A">N/A</option>
                                                    <option value="first_class">First-Class Honours</option>
                                                    <option value="upper_second_class">Upper Second-Class Honours</option>
                                                    <option value="lower_second_class">Lower Second-Class Honours</option>
                                                    <option value="third_class">Third-Class Honours</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="degree_year">Degree Year<small>(උපාධි වර්ෂය)</small></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="text" class="form-control yearpicker" name="month" id="degree_year" placeholder="2021" maxlength="4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nvq_level">NVQ Level<small>(NVQ මට්ටම)</small></label>
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
                                                <label for="sector">Sector*<small>(අංශය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="sector" name="sector" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category*<small>(අංශය යටතේ වර්ගය)</small></label>
                                                <div>
                                                    <select class="custom-select" id="category" name="service_category_id" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Educational Qualifications<small>(අධ්‍යාපනික සුදුසුකම්)</small></label>
                                                <textarea class="form-control" rows="1" id="educational_qualification" name="educational_qualification" placeholder="Enter the Qualification"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>NIC Image Side 1* <small> (ජාතික හැදුනුම්පත පළමු පැති පෙනුම )</small></label>
                                                <div>
                                                    <input type="file" class="form-control" id="id_image" name="nic_img" onchange="document.getElementById('nic_img').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg" required>
                                                </div>
                                                <img id="nic_img" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" name="nic_image" alt="NIC image" width="100" height="100" />
                                                <br><label class="text-danger">please select the images less than 2MB</label>
                                            </div>
                                            <div class="form-group">
                                                <label>NIC Image Side 2* <small> (ජාතික හැදුනුම්පත දෙවන පැති පෙනුම)</small></label>
                                                <div>
                                                    <input type="file" class="form-control" id="id_image_two" name="nic_img_two" onchange="document.getElementById('nic_image_two').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg" required>
                                                </div>
                                                <img id="nic_image_two" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" name="nic_image_two" alt="NIC image side two" width="100" height="100" />
                                                <br><label class="text-danger">please select the images less than 2MB</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Degree Certificate <small>(උපාධි සහතිකය)</small></label>
                                                <input type="file" class="form-control" id="degree_cert" name="degree_cert" onchange="document.getElementById('dgr_crt').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg">
                                                <img id="dgr_crt" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="Degree certificate" width="100" height="100" />
                                                <br><label class="text-danger">please select the images less than 2MB</label>
                                            </div>
                                            <div class="form-group">
                                                <label>User Image <small>(පරිශීලක ජායාරූපය)</small></label>
                                                <input type="file" class="form-control" id="user_image" name="user_image" onchange="document.getElementById('usr_img').src = window.URL.createObjectURL(this.files[0])" accept=".png, .jpg, .jpeg">
                                                <img id="usr_img" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="User image" width="100" height="100" />
                                                <br><label class="text-danger">please select the images less than 2MB</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button id="verificationProc" type="button" class="btn btn-success pl-5 pr-5">Next</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                            <!-- /.card -->

                        </div>
                        <div class="card card-success verMobile d-none">
                            <div class="card-header">
                                <h3 class="card-title">Mobile Verification In Progress</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body text-center" style="display: block;">
                                <div class="done_text">
                                    <a href="#" class="don_icon"><i class=" ion-android-done"></i></a>
                                    <h6>A secret code is sent to your phone. <br>Please enter it here.</h6>
                                </div>
                                <h4><span id="countdown">0:00</span></h4>
                                <div class="input-group mb-3">
                                    <input style="font-size: 18px;" id="getOtpCode" maxlength="6" type="text" class="form-control text-center">
                                </div>
                                <button type="button" id="otpVerify" class="btn btn-block bg-gradient-success btn-flat">Verify</button>
                                <button type="button" id="otpResend" class="btn btn-block bg-gradient-primary btn-flat d-none">Resend Verification Code</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-primary verThanks d-none">
                            <div class="card-header">
                                <h3 class="card-title">Verified</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body text-center" style="display: block;">
                                <h2><span class="">Thank you!</span></h2>
                                <button type="button" id="login" class="btn btn-block bg-gradient-primary btn-flat">Login</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Design and Developed by Ceytech System Solutions PVT LTD
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2020-2021 <a href="#">Human Resources Development Authority</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <script src="../../js/userjs/submit.js"></script>
        <script src="../../js/registrationJs/registration.js"></script>
        <script src="../../js/registrationJs/FrontGraduateJS.js"></script>
        <script src="../../js/commenFunctions/file_upload.js"></script>
        <!--Component Js -->
        <script src="/js/combo.js"></script>
        <!--Data Tables -->
        <script src="/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <!--Tosts-->
        <script src="/plugins/toastr/toastr.min.js"></script>
        <!-- Toastr -->
        <!-- SweetAlert2 -->
        <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="/dist/js/demo.js"></script>

        <!--commen functions-->
        <script src="/js/commenFunctions\functions.js" type="text/javascript"></script>
        <!-- validation -->
        <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
        <!-- Select2 -->
        <script src="../../plugins/select2/js/select2.full.min.js"></script>
        <script src="../../plugins/typeahead/typeahead.js"></script>
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
                                                    var degrees = degree_data.split(",");
//                                               
//                                              console.log(universities);
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
                                                    var sender_ID = '';
                                                    $(window).on('load', function () {
                                                        loadDistrictCombo('DISTRICT_ID', function () {
                                                            loadelectrorateCombo('ElECTDIVISIONID', $('#district').val(), function () {

                                                            });
                                                            loadDsdivisionCombo('DSDIVISIONID', $('#district').val(), function () {
                                                                loadGndivisionCombo('GNDIVISIONID', $('#ds_division').val(), function () {

                                                                });
                                                            });
                                                        });
                                                        loadUniversityCombo('UNIVERSITY_ID');
                                                        loadSectorsCombo('SECTORID', function () {
                                                            loadCategoryCombo('SERVICECATID', $('#sector').val(), function () {

                                                            });
                                                        });
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
                                                        var graduate_registration;
                                                        graduate_registration = $("#graduate_registration").validate({
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
                                                    });
                                                    //CountDown For Verification
                                                    function setupTimer(timeX) {
                                                        var timer2 = timeX;
                                                        var interval = setInterval(function () {
                                                            var timer = timer2.split(':');
                                                            //by parsing integer, I avoid all extra string processing
                                                            minutes = parseInt(timer[0], 10);
                                                            seconds = parseInt(timer[1], 10);
                                                            --seconds;
                                                            minutes = (seconds < 0) ? --minutes : minutes;
                                                            seconds = (seconds < 0) ? 59 : seconds;
                                                            seconds = (seconds < 10) ? '0' + seconds : seconds;
                                                            // $('.countdown').html();
                                                            $('#countdown').html(minutes + ':' + seconds);
                                                            if (minutes < 0)
                                                                clearInterval(interval);
                                                            //check if both minutes and seconds are 0
                                                            if ((seconds <= 0) && (minutes <= 0))
                                                                clearInterval(interval);
                                                            if ((seconds <= 0) && (minutes <= 0)) { //Run Any Code Line When TimesUp
                                                                $('#otpResend').removeClass('d-none');
                                                            }
                                                            timer2 = minutes + ':' + seconds;
                                                        }, 1000);
                                                    }

                                                    $("#verificationProc").click(function () { //Funtions For Verify (1st Form)
                                                        let nic_image = $('#id_image')[0].files[0];
                                                        let nic_image_two = $('#id_image_two')[0].files[0];
                                                        let degree_cert = $('#degree_cert')[0].files[0];
                                                        let user_image = $('#user_image')[0].files[0];

                                                        let nic_img_status = validate_image_size('nic_image', nic_image);
                                                        let nic_img_two_status = validate_image_size('nic_image_two', nic_image_two);
                                                        let degree_img_status = validate_image_size('degree_image', degree_cert);
                                                        let user_img_status = validate_image_size('user_image', user_image);

                                                        if (nic_img_status == false || nic_img_two_status == false || degree_img_status == false || user_img_status == false) {
                                                            return false;
                                                        }

                                                        var is_valid = jQuery("#graduate_registration").valid();
                                                        if ($('#email').val() != '') {
                                                            if ($('#nic').val() != '') {
                                                                var data = {
                                                                    email: $('#email').val(),
                                                                    nic: $('#nic').val()
                                                                };
                                                                ajaxRequest("GET", "/api/cheack_email", data, function (resp) {
                                                                    if (resp == 0) {
                                                                        Swal.fire({
                                                                            icon: 'error',
                                                                            title: 'Oops...',
                                                                            text: 'Email Already Exist'
                                                                        })
                                                                    } else {
                                                                        ajaxRequest("GET", "/api/cheack_nic", data, function (resp) {
                                                                            if (resp == 0) {
                                                                                $('#nic').addClass('has-error');
                                                                                Swal.fire({
                                                                                    icon: 'error',
                                                                                    title: 'Oops...',
                                                                                    text: 'NIC is Already Exist'
                                                                                })
                                                                            } else {
                                                                                $('#nic').removeClass('has-error');
                                                                                $('#otpResend').addClass('d-none');
                                                                                $('#getOtpCode').val(null);
                                                                                let data = {
                                                                                    tel_no: $('#Telephone').val()
                                                                                };
                                                                                if (is_valid) {
                                                                                    Swal.fire({
                                                                                        title: 'Are you sure?',
                                                                                        text: "Sending OTP To Your Mobile: " + $('#Telephone').val(),
                                                                                        showCancelButton: true,
                                                                                        confirmButtonColor: '#3085d6',
                                                                                        cancelButtonColor: '#d33',
                                                                                        confirmButtonText: 'Yes!'
                                                                                    }).then((result) => {
                                                                                        if (result.value) {
                                                                                            if (formValidation() == true) {
                                                                                                send_otp(data, function (xh) {
                                                                                                    if (xh.status == 1) {
                                                                                                        setupTimer('3:00');
                                                                                                        sender_ID = xh.send_id;
                                                                                                        $('.verMobile').removeClass('d-none');
                                                                                                        $('.verRegister').addClass('d-none');
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                } else {
                                                                                    Swal.fire("Missing Fields!", "Please complete the required details!", "warning");
                                                                                }
                                                                            }
                                                                        });
                                                                    }
                                                                });
                                                            }
                                                        }
                                                    });
                                                    $('#login').click(function () {
                                                        window.location.href = "/login";
                                                    });
                                                    $("#otpVerify").click(function () { //Verify Btn (2nd Form)

                                                        if ($('#getOtpCode').val().trim().length !== 6) {
                                                            Swal.fire("OTP verification Failed!", "Cheack your otp is correct!", "warning");
                                                            return false;
                                                        }
                                                        verify_otp(sender_ID, $('#getOtpCode').val().trim(), function (xh) {
                                                            if (xh.status == 1) {
                                                                Swal.fire("OTP verification Success!", "Your will be Registered!", "success");
                                                                save_comForm();
                                                            } else {
                                                                Swal.fire("OTP verification Failed!", xh.msg, "danger");
                                                            }
                                                        });
                                                    });
                                                    $("#otpResend").click(function () {
                                                        let data = {
                                                            tel_no: $('#Telephone').val()
                                                        };
                                                        var is_valid = jQuery("#graduate_registration").valid();
                                                        if (is_valid) {
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: "Resend OTP To Your Mobile: " + $('#Telephone').val(),
                                                                showCancelButton: false,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Yes!'
                                                            }).then((result) => {
                                                                if (result.value) {
                                                                    if (formValidation() == true) {
                                                                        send_otp(data, function (xh) {
                                                                            if (xh.status == 1) {
                                                                                $('#otpResend').addClass('d-none');
                                                                                setupTimer('3:00');
                                                                                sender_ID = xh.send_id;
                                                                            }
                                                                        });
                                                                    }
                                                                }
                                                            });
                                                        } else {
                                                            Swal.fire("Failed!", "Invalid data found!", "warning");
                                                        }
                                                    });
                                                    function save_comForm() {
                                                        var is_valid = jQuery("#graduate_registration").valid();
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
                                                                    save_front_graduate_details();
                                                                }
                                                            });
                                                        } else {
                                                            Swal.fire("Failed!", "Invalid data found!", "warning");
                                                        }
                                                    }

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
                                                        return this.optional(element) || /^[a-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value);
                                                    }, "Please enter a valid email addresss");
                                                    jQuery.validator.addMethod("valid_lk_phone", function (value, element) {
                                                        return this.optional(element) || /^0[7][0-9]{8}$/.test(value);
                                                    }, "Please enter a valid phone number");
                                                    function formValidation() {
                                                        let response = true;
                                                        if ($('#Telephone').val().trim().length !== 10) {
                                                            alert('Invalid Mobile Number');
                                                            var elem = document.getElementById("Telephone");
                                                            input.addEventListener("invalid", function (evt) {

                                                            });
                                                            return false;
                                                        } else if ($('#first_name').val() == '') {
                                                            alert('Enter Firstname');
                                                            response = false;
                                                        }
                                                        return response;
                                                    }
        </script>
    </body>

</html>