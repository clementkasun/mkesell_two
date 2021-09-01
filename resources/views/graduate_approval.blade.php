@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')
<!-- Select2 -->
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">-->
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Graduate Approval</h3>
                </div>
                <div class="card-body">
                    <table class="table" id="graduate_report_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>University</th>
                                <th>Degree</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="smsSenderUI d-none">
                        <hr>
                        <div class="form-group">
                            <label>SMS Description</label>
                            <div class="input-group">
                                <textarea class="form-control" id="sms" placeholder="Type SMS Here..."></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="send_sms" type="button" class="btn btn-primary ml-2">Send SMS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection



@section('pageScripts')
<!-- Page script -->

<!-- Select2 -->
<!--<script src="../../plugins/select2/js/select2.full.min.js"></script>-->
<!-- Bootstrap4 Duallistbox -->
<!--<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>-->
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!--date-range-picker-->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!--bootstrap color picker-->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!--Tempusdominus Bootstrap 4-->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!--Bootstrap Switch-->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!--AdminLTE App-->
<script src="../../dist/js/adminlte.min.js"></script>
<!--AdminLTE for demo purposes-->
<script src="../../dist/js/demo.js"></script>
<script src="../../js/SmsMngJS/sms_script.js"></script>
<script>
    var published_num = [];
    $(document).ready(function() {
        $("#graduate_report_table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "scrollY": "auto",
            "scrollCollapse": true,
            "paging": false
        });

        loadDistrictCombo();
        loadSectorsCombo();
        loadUniversityCombo();

        $('#district_id').change(function() {
            let district_id = $('#district_id').val();
            loadDsdivisionCombo(district_id);
        });

        $('#ds_id').change(function() {
            let ds_division_id = $('#ds_id').val();
            loadGndivisionCombo(ds_division_id);
        });

        $('#sectors_name').change(function() {
            let sector_id = $('#sectors_name').val();
            loadCategoryCombo(sector_id);
        });

        $('#district_id').change(function() {
            let district_id = $('#district_id').val();
            loadectrorateCombo(district_id);
        });

        $(document).on("click", ".getTelNum", function() {
            $(".getTelNum").change(function() //set selected checkbox array when change
                {
                    var phone_num = new Array();
                    $(".getTelNum").each(function() {
                        if ($(this).is(':checked')) {
                            phone_num.push($(this).val());
                        }
                    });
                    published_num = phone_num; //Set phone array to glob array
                });
        });

        $(document).on("click", "#send_sms", function() {
            let data_set = {
                sms: $('#sms').val(),
                contact_list: published_num
            };
            if ($('#sms').val() != '' && $('.getTelNum').is(':checked')) {
                post_sms_func(data_set, function() {
                    $('#sms').val('');
                    console.log(published_num);
                });
            } else {
                alert('Please Select Phone Numbers And Enter A Message...');
            }

        });

    });

    $('#report_gen').click(function() {
        loadGraduatesReportTable();
        $('.smsSenderUI').removeClass('d-none');
    });
</script>
@endsection