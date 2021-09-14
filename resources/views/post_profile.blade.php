@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.footer')
@section('pageStyles')

<!-- Select2 -->
<link rel="stylesheet" href="../../../plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="../../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="../../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">
<!-- sweet alert -->

<style>
    .invalid {
        color: #FF0000;
    }
</style>
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class=" content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-secondary">Graduate Profile</h1>
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
                            <div class="col-md-12">
                                <div class="text-center">
                                    @if($post_data->main_image != null)
                                    <img class="profile-user-img circle-img img-fluid img-circle" src="{{'./storage/'.$post_data->main_image}}" alt="post main picture" style="width:10em; height:10em; max-width: 100%; max-height: 100%;" />
                                    @endif

                                    @if($post_data->main_image == null)
                                    <img class="profile-user-img circle-img img-fluid img-circle" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="post main picture" />
                                    @endif
                                </div>

                                <h3 class=" profile-username text-center"><b>{{ $post_data->post_title}}</b></h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row bg-dark" style="border-radius: 15px">
                            <div class="col-md-6">
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
                                <div class="form-group">
                                    <label for="ongoing_lease">Ongoing Lease: </label><br>
                                    @if($post_data->on_going_lease != null)
                                    <label class="bg-warning p-1 m-1" style="border-radius: 5px;">ON LEASE</label><br>
                                    @endif
                                    @if($post_data->on_going_lease == null)
                                    <label class="bg-success p-1 m-1" style="border-radius: 5px;">NOT ON LEASE</label><br>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="isAc">AC: </label><br>
                                    @if($post_data->isAc != null)
                                    <label class="bg-warning p-1 m-1" style="border-radius: 5px;">AC IS AVAILABLE</label><br>
                                    @endif
                                    @if($post_data->isAc == null)
                                    <label class="bg-success p-1 m-1" style="border-radius: 5px;">--------------</label><br>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="isPowerSteer">Power Steering: </label><br>
                                    @if($post_data->isPowerSteer != null)
                                    <label class="bg-warning p-1 m-1" style="border-radius: 5px;">PS IS AVAILABLE</label><br>
                                    @endif
                                    @if($post_data->isPowerSteer == null)
                                    <label class="bg-success p-1 m-1" style="border-radius: 5px;">--------------</label><br>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="isPowerMirroring">Power Mirroring: </label><br>
                                    @if($post_data->isPowerMirroring != null)
                                    <label class="bg-warning p-1 m-1" style="border-radius: 5px;">PM IS AVAILABLE</label><br>
                                    @endif
                                    @if($post_data->isPowerMirroring == null)
                                    <label class="bg-success p-1 m-1" style="border-radius: 5px;">--------------</label><br>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="isPowerWindow">Power Window: </label><br>
                                    @if($post_data->isPowerWindow != null)
                                    <label class="bg-warning p-1 m-1" style="border-radius: 5px;">PW IS AVAILABLE</label><br>
                                    @endif
                                    @if($post_data->isPowerWindow == null)
                                    <label class="bg-success p-1 m-1" style="border-radius: 5px;">--------------</label><br>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 pt-2">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Image One</label></br>
                                            @if($post_data->image_1 != null)
                                            <img id="image_one" name="image_one" src="{{'/storage/'.$post_data->image_1}}" alt="image one" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                            @if($post_data->image_1 == null)
                                            <img id="image_one" name="image_one" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="Image One" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label>Image Two</label></br>
                                            @if($post_data->image_2 != null)
                                            <img id="image_two" name="image_two" src="{{'/storage/'.$post_data->image_2}}" alt="image two" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                            @if($post_data->image_2 == null)
                                            <img id="image_two" name="image_two" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" NIC image" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-1">
                                            <label>Image Three</label></br>
                                            @if($post_data->image_3 != null)
                                            <img id="image_three" name="image_three" src="{{'/storage/'.$post_data->image_3}}" alt="image_three" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                            @if($post_data->image_3 == null)
                                            <img id="image_three" name="image_three" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" Degree certificate" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <label>Image Four</label></br>
                                            @if($post_data->image_4 != null)
                                            <img id="image_three" name="image_three" src="{{'/storage/'.$post_data->image_4}}" alt="image_four" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                            @if($post_data->image_4 == null)
                                            <img id="image_three" name="image_three" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" Degree certificate" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-1">
                                            <label>Image Five</label></br>
                                            @if($post_data->image_5 != null)
                                            <img id="image_five" name="image_five" src="{{'/storage/'.$post_data->image_5}}" alt="image_five" width="100%" height="90%" style="border-radius: 15px" />
                                            @endif
                                            @if($post_data->image_5 == null)
                                            <img id="image_five" name="image_five" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" Degree certificate" width="100%" height="90%" style="border-radius: 15px" />
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

</script>
@endsection