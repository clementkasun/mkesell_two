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
                    <div class="card-body box-profile bg-dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    @if($data->user_image != null)
                                    <img class="profile-user-img circle-img img-fluid img-circle" src="{{'/storage/'.$data->user_image}}" alt="User profile picture" style="width:10em; height:10em; max-width: 100%; max-height: 100%;" />
                                    @endif

                                    @if($data->user_image == null)
                                    <img class="profile-user-img circle-img img-fluid img-circle" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="User profile picture" />
                                    @endif
                                </div>

                                <h3 class=" profile-username text-center"><b>{{ $data->first_name.'  '.$data->last_name}}</b></h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <strong><i class="fas fa-book mr-1"></i> University</strong>
                                @if($data->university_name != null)
                                <p class="text-muted university">{{$data->university_name}}</p>
                                @endif
                                @if($data->university_name == null)
                                <p class="text-muted university">-</p>
                                @endif -->
                                <!-- storage_path('app/'.$data->image) -->
                                <!-- <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                                <p class="text-muted address">{{$data->address}}</p> -->
                                <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
                                <!-- <div class="form-group">
                                    <label for="first_name">Name : </label>
                                    @if($data->first_name != null && $data->last_name != null)
                                    <span class="text-muted">{{$data->first_name.' '.$data->last_name}}</span>
                                    @endif
                                    @if($data->first_name == null && $data->last_name == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="last_name">Last Name :</label>
                                    @if($data->last_name != null)
                                    <span class="text-muted">{{$data->last_name}}</span>
                                    @endif
                                    @if($data->last_name == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div> -->
                                <div class="form-group">
                                    <label for="address">Address: </label>
                                    @if($data->address != null)
                                    <span>{{$data->address}}</span>
                                    @endif
                                    @if($data->address == null)
                                    <span>-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Mobile Number: </label>
                                    @if($data->tel != null)
                                    <span>{{$data->tel}}</span>
                                    @endif
                                    @if($data->tel == null)
                                    <span>-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    @if($data->email != null)
                                    <span>{{$data->email}}</span>
                                    @endif
                                    @if($data->email == null)
                                    <span>-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender: </label>
                                    @if($data->gender != null)
                                    <span>{{$data->gender}}</span>
                                    @endif
                                    @if($data->gender == null)
                                    <span>-</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="civil_status">Civil Status: </label>
                                    @if($data->civil_status != null)
                                    <span>{{$data->civil_status}}</span>
                                    @endif
                                    @if($data->civil_status == null)
                                    <span>-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nic">NIC: </label>
                                    @if($data->nic != null)
                                    <span>{{$data->nic}}</span>
                                    @endif
                                    @if($data->nic == null)
                                    <span>-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth: </label>
                                    @if($data->dob != null)
                                    <span class="ml-2">{{$data->dob}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                    @endif
                                    @if($data->dob == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="district">District: </label><span class="ml-2">{{$data->district_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="ds_division">DS Division: </label><span class="ml-2">{{$data->ds_division_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="gn_division">GN Division: </label><span class="ml-2">{{$data->gn_division_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="elec_division">Electrorate Division: </label><span class="ml-2">{{$data->electorate_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="university">University: </label>
                                    @if($data->university_name != null)
                                    <span class="ml-2">{{$data->university_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                    @endif
                                    @if($data->university_name == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="degree_type">Degree Type: </label><span class="ml-2">{{$data->degree_type}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="degree">Degree: </label>
                                    @if($data->degree != null)
                                    <span class="ml-2">{{$data->degree}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                    @endif
                                    @if($data->degree == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="degree_class">Degree Class: </label><span class="ml-2">{{$data->class}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="degree_year">Degree Year: </label>
                                    @if($data->year != null)
                                    <span class="ml-2">{{$data->year}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                    @endif
                                    @if($data->year == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nvq_level">NVQ Level: </label><span class="ml-2">{{$data->nvq_level}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="sector">Sector: </label><span class="ml-2">{{$data->sector_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label for="category">Category: </label><span class="ml-2">{{$data->service_category_name}}</span>
                                    <!-- <p class="text-muted"></p> -->
                                </div>
                                <div class="form-group">
                                    <label>Educational Qualifications: </label>
                                    @if($data->educational_qualification != null)
                                    <span class="ml-2">{{$data->educational_qualification}}</span>
                                    <!-- <span class="text-muted"></p> -->
                                    @endif
                                    @if($data->educational_qualification == null)
                                    <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>NIC Image Side One </label></br>
                                            @if($data->nic_image != null)
                                            <img id="nic_image" name="nic_image" src="{{'/storage/'.$data->nic_image}}" alt=" NIC image one" width="100" height="100" />
                                            @endif
                                            @if($data->nic_image == null)
                                            <img id="nic_image" name="nic_image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" NIC image" width="100" height="100" />
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label>NIC Image Side Two </label></br>
                                            @if($data->nic_image_two != null)
                                            <img id="nic_image_two" name="nic_image_two" src="{{'/storage/'.$data->nic_image_two}}" alt=" NIC image side two" width="100" height="100" />
                                            @endif
                                            @if($data->nic_image_two == null)
                                            <img id="nic_image_two" name="nic_image_two" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" NIC image" width="100" height="100" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <label>Degree Certificate</label></br>
                                            @if($data->degree_certificate != null)
                                            <img id="degree_certificate" name="degree_certificate" src="{{'/storage/'.$data->degree_certificate}}" alt=" Degree certificate" width="100" height="100" />
                                            @endif
                                            @if($data->degree_certificate == null)
                                            <img id="degree_certificate" name="degree_certificate" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt=" Degree certificate" width="100" height="100" />
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
<script src="../../js/registrationJs/GraducateProfileJS.js"></script>
<script src="../../js/commenFunctions/file_upload.js"></script>

<script>

</script>
@endsection