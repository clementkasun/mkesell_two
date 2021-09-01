@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')
<!-- Select2 -->
<!--<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">-->
<!--<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">-->
<!-- Bootstrap4 Duallistbox -->
<!--<link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">-->
<!-- Theme style -->
<!--<link rel="stylesheet" href="/dist/css/adminlte.min.css">-->
<!-- Google Font: Source Sans Pro -->
@endsection

@section('content')
<section class="content-header">
    <button onclick="window.print()">Print this page</button>
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$surveyName->name}}</h3>
                </div>
                <div class="card-body" style="">
                    <table class="table" id="survey_names_tbl">
                        <tbody></tbody>
                    </table>

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

<!--added by viraj-->
<script src="/js/survey/attribute_jsx.js" type="text/javascript"></script>
<script>
    // $(function() {
    //     load_attributesTbl({
    //         {
    //             $id
    //         }
    //     });
    // });
</script>
@endsectionF