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
<link rel="stylesheet" href="./dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">
<!-- sweet alert -->
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="./dist/css/adminlte.min.css">
<link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="./plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="./dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--tosts-->
<!-- Toastr -->
<link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="./plugins/custom-css/graduate_update.css">

@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1> Post Registration</h1>
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
                        <h3 class="card-title">Advertiesment Registration form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form id='post_registration'>
                            <div class="row">
                                <!--<div class="col-md-12">-->
                                <section id="post_section" class="col-md-6">
                                    <input type="text" id="user_id" name="user_id" value="{{Auth::id()}}" hidden> 
                                    <div class="form-group">
                                        <label for="post_type">Post Type</label>                                    
                                        <div>
                                            <select class="custom-select" id="post_type" name="post_type" required>
                                                <option value="">Not Selected</option>
                                                <option value="VEHICLE">Vehicle</option>
                                                <option value="SPARE PART">Spare Part</option>
                                                <option value="WANTED">Wanted</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_title">Post Title</label>
                                        <div>
                                            <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter the post title" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicle_type">Vehicle type</label>
                                        <div>
                                            <select id="vehicle_type" name="vehicle_type" class="form-control">
                                                <option value="All">All</option>
                                                <option value="Car">Car</option>
                                                <option value="Van">Van</option
                                                ><option value="SUV">SUV</option>
                                                <option value="Crew Cab">Crew Cab</option>
                                                <option value="Wagon">Wagon</option>
                                                <option value="Pickup">Pickup</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Lorry">Lorry</option>
                                                <option value="Three Wheel">Three Wheel</option>
                                                <option value="Tractor">Tractor</option>
                                                <option value="Heavy-Duty">Heavy-Duty</option>
                                                <option value="Other">Other</option>
                                                <option value="Motorcycle">Motorcycle</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="condition">Condition</label>                                    
                                        <div>
                                            <select class="custom-select" id="condition" name="condition" required>
                                                <option value="">Not Selected</option>
                                                <option value="Used">Used</option>
                                                <option value="New">Brand New</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="make_id">Make</label>                                    
                                        <div>
                                            <select class="custom-select" id="make_id" name="make_id" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>                                    
                                        <div id="the-basics">
                                            <input type="number" class="form-control" name="price" id="price" placeholder='Enter the price'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Address</label>                                    
                                        <div>
                                            <textarea id="location" name="location" class="form-control" placeholder="Enter the address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="additional_info">Description</label>                                    
                                        <div>
                                            <textarea id="additional_info" name="additional_info" class="form-control" placeholder="Enter the description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="main_image">Main Image</label>                                    
                                        <div>
                                            <input type="file" class="form-control" id="main_image" name="main_image" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_one">Image 1</label>                                    
                                        <div>
                                            <input type="file" class="form-control" id="image_one" name="image_one" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_two">Image 2</label>                                    
                                        <div>
                                            <input type="file" class="form-control" id="image_two" name="image_two" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_three">Image 3</label>                                    
                                        <div>
                                            <input type="file" class="form-control" id="image_three" name="image_three" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_four">Image 4</label>                                    
                                        <div>
                                            <input type="file" class="form-control" id="image_four" name="image_four" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_five">Image 5</label>                                    
                                        <div>
                                            <input type="file" class="form-control" id="image_five" name="image_five" required>
                                        </div>
                                    </div>
                                </section>
                                <section id="vehicle_sec" class="d-none col-md-6">
                                    <div class="form-group">
                                        <label for="model"> Model *</label>
                                        <div><input type="text" class="form-control" name="model" id="model" placeholder="Enter the model name" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_type">Start Type</label>
                                        <div><input type="text" class="form-control" name="start_type" id="start_type" placeholder="Enter the start type" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="manufactured_year">Manufactured Year</label>
                                        <div><input type="text" class="form-control" name="manufactured_year" id="manufactured_year" placeholder="Please enter the manufactured year" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="transmission">Transmission</label>
                                        <div>
                                            <input type="text" class="form-control" name="transmission" id="transmission" placeholder="Enter the transmission type" required>
                                        </div>
                                    </div>
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label for="fuel_type">Fuel Type</label>
                                        <div>
                                            <select name="fuel_type" id="fuel_type" class="custom-select" required>
                                                <option value="">Select Fuel Type</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Petrol">Petrol</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <option value="Gas">Gas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="engine_capacity">Engine Capacity</label>
                                        <div><input type="text" class="form-control" name="engine_capacity" id="engine_capacity" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="millage">Millage</label>
                                        <div>
                                            <input type="text" class="form-control" name="millage" id="millage" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label for="isAc">AC</label>
                                            <div>
                                                <input type="checkbox" name="isAc" id="isAc" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="isPowerSteer">Power Steer</label><br>
                                            <div class="form-check">
                                                <input type="checkbox" name="isPowerSteer" id="isPowerSteer" class ="ml-0 pl-0" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="isPowerMirroring">Power Mirroring</label>
                                            <div>
                                                <input type="checkbox" name="isPowerMirroring" id="isPowerMirroring" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="isPowerWindow">Power Window</label>
                                            <div>
                                                <input type="checkbox" name="isPowerMirroring" id="isPowerWindow" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                        <label for="on_going_lease">On Going Lease</label>
                                        <div>
                                            <input type="checkbox" name="on_going_lease" id="on_going_lease" required>
                                        </div>
                                    </div>
                                    </div>
                                </section>
                                <section id="spare_part_sec" class="d-none col-md-6">
                                    <div class="form-group">
                                        <label for="part_category">Part Category</label>
                                        <div>
                                            <select id="part_category" name="part_category" class="form-control">
                                                <option value="">Select</option>
                                                <option value="Air Conditioning &amp; Heating">Air Conditioning &amp; Heating</option>
                                                <option value="Air Intake &amp; Fuel Delivery">Air Intake &amp; Fuel Delivery</option>
                                                <option value="Axles &amp; Axle Parts">Axles &amp; Axle Parts</option>
                                                <option value="Battery">Battery</option>
                                                <option value="Brakes">Brakes</option>
                                                <option value="Car Audio Systems">Car Audio Systems</option>
                                                <option value="Car DVR">Car DVR</option>
                                                <option value="Car Tuning &amp; Styling">Car Tuning &amp; Styling</option>
                                                <option value="Carburetor">Carburetor</option>
                                                <option value="Chassis">Chassis</option>
                                                <option value="Electrical Components">Electrical Components</option>
                                                <option value="Emission Systems">Emission Systems</option>
                                                <option value="Engine Cooling">Engine Cooling</option>
                                                <option value="Engines &amp; Engine Parts">Engines &amp; Engine Parts</option>
                                                <option value="Exhausts &amp; Exhaust Parts">Exhausts &amp; Exhaust Parts</option>
                                                <option value="External &amp; Body Parts">External &amp; Body Parts</option>
                                                <option value="External Lights &amp; Indicators">External Lights &amp; Indicators</option>
                                                <option value="Footrests, Pedals &amp; Pegs">Footrests, Pedals &amp; Pegs</option>
                                                <option value="Freezer">Freezer</option>
                                                <option value="Gauges, Dials &amp; Instruments">Gauges, Dials &amp; Instruments</option>
                                                <option value="Generator">Generator</option>
                                                <option value="GPS &amp; In-Car Technology">GPS &amp; In-Car Technology</option>
                                                <option value="Handlebars, Grips &amp; Levers">Handlebars, Grips &amp; Levers</option>
                                                <option value="Helmets, Clothing &amp; Protection">Helmets, Clothing &amp; Protection</option>
                                                <option value="Interior Parts &amp; Furnishings">Interior Parts &amp; Furnishings</option>
                                                <option value="Lighting &amp; Indicators">Lighting &amp; Indicators</option>
                                                <option value="Mirrors">Mirrors</option>
                                                <option value="Oils, Lubricants &amp; Fluids">Oils, Lubricants &amp; Fluids</option>
                                                <option value="Other">Other</option>
                                                <option value="Reverse Camera">Reverse Camera</option>
                                                <option value="Seating">Seating</option>
                                                <option value="Service Kits">Service Kits</option>
                                                <option value="Silencer">Silencer</option>
                                                <option value="Starter Motors">Starter Motors</option>
                                                <option value="Stickers">Stickers</option>
                                                <option value="Suspension, Steering &amp; Handling">Suspension, Steering &amp; Handling</option>
                                                <option value="Transmission &amp; Drivetrain">Transmission &amp; Drivetrain</option>
                                                <option value="Turbos &amp; Superchargers">Turbos &amp; Superchargers</option>
                                                <option value="Wheels, Tyres &amp; Rims">Wheels, Tyres &amp; Rims</option>
                                                <option value="Windscreen Wipers &amp; Washers">Windscreen Wipers &amp; Washers</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                                <!--</div>-->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button id="save_post" type="button" class="btn btn-primary pl-5 pr-5">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
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
<script src="./js/commenFunctions/file_upload.js"></script>

<!-- AdminLTE App -->
<script>


$('#post_type').change(function () {
    if ($(this).val() == 'VEHICLE' || $(this).val() == 'WANTED') {
        $('#spare_part_sec').addClass('d-none');
        $('#vehicle_sec').removeClass('d-none');
    }
    if ($(this).val() == 'SPARE PART') {
        $('#vehicle_sec').addClass('d-none');
        $('#spare_part_sec').removeClass('d-none');
    }
    if ($(this).val() == '') {
        $('#vehicle_sec').addClass('d-none');
        $('#spare_part_sec').addClass('d-none');
    }
});

$(window).on('load', function () {
    loadMakesCombo();

    $('#post_type').select2();
    $('#vehicle_type').select2();
    $('#condition').select2();
    $('#fuel_type').select2();
    $('#part_category').select2();
});

function loadMakesCombo(selected, callBack) {
    let option = '';
    ajaxRequest("GET", "./api/get_makes/", null, function (resp) {
        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.make_name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.make_name + '</option>';
                }
            });
        }
        $('#make_id').html(option);
        $('#make_id').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

$("#save_post").click(function () {

    let object = {
        user_id: $('#user_id').val(),
        post_type: $('#post_type').val(),
        post_title: $('#post_title').val(),
        vehicle_type: $('#vehicle_type').val(),
        condition: $('#condition').val(),
        make_id: $('#make_id').val(),
        price: $('#price').val(),
        location: $('#location').val(),
        additional_info: $('#additional_info').val(),
        model: $('#model').val(),
        start_type: $('#start_type').val(),
        manufactured_year: $('#manufactured_year').val(),
        on_going_lease: $('input[name="on_going_lease"]:checked').val(),
        transmission: $("#transmission").val(),
        fuel_type: $("#fuel_type").val(),
        engine_capacity: $("#engine_capacity").val(),
        millage: $("#millage").val(),
        isAc: $('input[name="isAc"]:checked').val(),
        isPowerSteer: $('input[name="isPowerSteer"]:checked').val(),
        isPowerMirroring: $('input[name="isPowerMirroring"]:checked').val(),
        isPowerWindow: $('input[name="isPowerWindow"]:checked').val(),
        part_category: $('#part_category').val(),
    };

    object.main_image = $('#main_image')[0].files[0];
    object.image_one = $('#image_one')[0].files[0];
    object.image_two = $('#image_two')[0].files[0];
    object.image_three = $('#image_three')[0].files[0];
    object.image_four = $('#image_four')[0].files[0];
    object.image_five = $('#image_five')[0].files[0];

    let url = "./api/save_post";
    ulploadFileWithData(url, object, function (result) {
        // ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Post Registration',
                    'Successfully Posted!',
                    'success'
                    );
//            location.reload();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: result.msg
            })
        }
//        $('#degree_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
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