@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.footer')
@section('pageStyles')

<link rel="stylesheet" href="../../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<!--<link rel="stylesheet" href="../../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">-->
<!-- Theme style -->
<!--<link rel="stylesheet" href="../../../dist/css/adminlte.min.css">-->
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="../../../plugins/w3/w3.css">
<!-- sweet alert -->

<style>
    .invalid {
        color: #FF0000;
    }

    .mySlides {
        display:none;
    }

</style>
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class=" content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1 class="text-secondary"><b>Post Profile</b></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile" style="border-radius: 15px">
                        <div class="row bg-light">
                            <div class="col-md-6">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @if($post_data->main_image != null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        @endif
                                        @if($post_data->image_1 != null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        @endif
                                        @if($post_data->image_2 != null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        @endif
                                        @if($post_data->image_3 != null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                        @endif
                                        @if($post_data->image_4 != null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                                        @endif
                                        @if($post_data->image_5 != null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                                        @endif
                                    </ol>
                                    <div class="carousel-inner">
                                        @if($post_data->main_image != null)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset("/storage/".$post_data->main_image)}}" alt="First slide">
                                        </div>
                                        @endif
                                        @if($post_data->image_1 != null)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset("/storage/".$post_data->image_1)}}" alt="Second slide">
                                        </div>
                                        @endif
                                        @if($post_data->image_2 != null)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset("/storage/".$post_data->image_2)}}" alt="Third slide">
                                        </div>
                                        @endif
                                        @if($post_data->image_3 != null)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset("/storage/".$post_data->image_3)}}" alt="Fourth slide">
                                        </div>
                                        @endif
                                        @if($post_data->image_4 != null)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset("/storage/".$post_data->image_4)}}" alt="Fifth slide">
                                        </div>
                                        @endif
                                        @if($post_data->image_5 != null)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset("/storage/".$post_data->image_5)}}" alt="Sixth slide">
                                        </div>
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="row bg-dark" style="border-radius: 15px">
                                    <div class="col-md-6">
                                        <h3 class=" profile-username text-center"><b>{{ $post_data->post_title}}</b></h3>
                                        <div class="form-group">
                                            @if($post_data->title != null)
                                            <span class="ml-2">{{$post_data->title}}</span>
                                            @endif
                                            @if($post_data->title == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="model">Model: </label>
                                            @if($post_data->model != null)
                                            <span>{{$post_data->model}}</span>
                                            @endif
                                            @if($post_data->model == null)
                                            <span>-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price: </label>
                                            @if($post_data->price != null)
                                            <span>{{$post_data->price}}</span>
                                            @endif
                                            @if($post_data->price == null)
                                            <span>-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="manufactured_year">Manufactured Year: </label>
                                            @if($post_data->manufactured_year != null)
                                            <span>{{$post_data->manufactured_year}}</span>
                                            @endif
                                            @if($post_data->manufactured_year == null)
                                            <span>-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="condition">Condition : </label>
                                            @if($post_data->condition != null)
                                            <span>{{$post_data->condition}}</span>
                                            @endif
                                            @if($post_data->condition == null)
                                            <span>-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="engine_capacity">Engine Capacity: </label>
                                            @if($post_data->engine_capacity != null)
                                            <span>{{$post_data->engine_capacity}}</span>
                                            @endif
                                            @if($post_data->engine_capacity == null)
                                            <span>-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="millage">Millage: </label>
                                            @if($post_data->millage != null)
                                            <span>{{$post_data->millage}}</span>
                                            @endif
                                            @if($post_data->millage == null)
                                            <span>-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="part_used_in">Parts Used Brand: </label>
                                            @if($post_data->part_used_in != null)
                                            <span class="ml-2">{{$data->part_used_in}}</span>
                                            @endif
                                            @if($post_data->part_used_in == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="part_category">Part Category: </label>
                                            @if($post_data->part_category != null)
                                            <span class="ml-2">{{$post_data->part_category}}</span>
                                            @endif
                                            @if($post_data->part_category == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="transmission">Transmission: </label>
                                            @if($post_data->transmission != null)
                                            <span class="ml-2">{{$post_data->transmission}}</span>
                                            @endif
                                            @if($post_data->transmission == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="start_type">Start Type: </label>
                                            @if($post_data->start_type != null)
                                            <span class="ml-2">{{$post_data->start_type}}</span>
                                            @endif
                                            @if($post_data->start_type == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fuel_type">Fuel Type: </label>
                                            @if($post_data->fuel_type != null)
                                            <span class="ml-2">{{$post_data->fuel_type}}</span>
                                            @endif
                                            @if($post_data->fuel_type == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="additional_info">Description: </label>
                                            @if($post_data->additional_info != null)
                                            <span class="ml-2">{{$post_data->additional_info}}</span>
                                            @endif
                                            @if($post_data->additional_info == null)
                                            <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-group">
                                            <label for="ongoing_lease">Ongoing Lease: </label><br>
                                            @if($post_data->on_going_lease != null)
                                            <label class="bg-warning p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                            @if($post_data->on_going_lease == null)
                                            <label class="bg-success p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="isAc">AC: </label><br>
                                            @if($post_data->isAc != null)
                                            <label class="bg-warning p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                            @if($post_data->isAc == null)
                                            <label class="bg-success p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="isPowerSteer">Power Steering: </label><br>
                                            @if($post_data->isPowerSteer != null)
                                            <label class="bg-warning p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                            @if($post_data->isPowerSteer == null)
                                            <label class="bg-success p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="isPowerMirroring">Power Mirroring: </label><br>
                                            @if($post_data->isPowerMirroring != null)
                                            <label class="bg-warning p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                            @if($post_data->isPowerMirroring == null)
                                            <label class="bg-success p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="isPowerWindow">Power Window: </label><br>
                                            @if($post_data->isPowerWindow != null)
                                            <label class="bg-warning p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                            @if($post_data->isPowerWindow == null)
                                            <label class="bg-success p-1 m-1" style="border-radius: 5px;"></label><br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('pageScripts')
<!-- Page script -->

<!-- Select2 -->
<script src="../../../plugins/select2/js/select2.full.min.js"></script>
<!-- sweetalert -->
<script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- validation -->
<script src="../../../plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./../../../dist/js/demo.js"></script>
<script src="../../../js/userjs/submit.js"></script>
<script src="../../../js/registrationJs/registration.js"></script>
<script src="../../../js/registrationJs/GraducateProfileJS.js"></script>
<script src="../../../js/commenFunctions/file_upload.js"></script>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}
</script>
@endsection