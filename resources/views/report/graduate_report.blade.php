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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Graduate Report</h3>
                </div>
                <div class="card-body">
                    <form id="graduate_report_form">
                        <div class="form-row">
                            <div class="col-md-2">
                                <label>District
                                    <input type="checkbox" id="district_check" name="district_check" class="ml-2"/>
                                    <select id="district_id" name="district_id" class="form-control" style="width: 10em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Electorate Division
                                    <input type="checkbox" id="electorate_check" name="electorate_check" class="ml-2" />
                                    <select id="electorate_id" name="electorate_id" class="form-control" style="width: 10em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Ds Division
                                    <input type="checkbox" id="ds_check" name="ds_check" class="ml-2" />
                                    <select id="ds_id" name="ds_id" class="form-control" style="width: 10em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Gn Division
                                    <input type="checkbox" id="gn_check" name="gn_check" class="ml-2" />
                                    <select id="gn_id" name="gn_id" class="form-control" style="width: 10em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Sector
                                    <input type="checkbox" id="sectors_name_check" name="sectors_name_check" class="ml-2" />
                                    <select id="sectors_name" name="sectors_name" class="form-control" style="width: 10em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Service Category
                                    <input type="checkbox" id="service_cat_check" name="service_cat_check" class="ml-2" />
                                    <select id="service_cat_id" name="service_cat_id" class="form-control" style="width: 10em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label>Gender
                                    <input type="checkbox" id="gender_check" name="gender_check" class="ml-2" />
                                    <select id="gender" name="gender" class="form-control" style="width: 10em">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Status
                                    <input type="checkbox" id="status_check" name="status_check" class="ml-2" />
                                    <select id="status" name="status" class="form-control" style="width: 10em">
                                        <option value="1">Approved</option>
                                        <option value="0">Pending</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Civil status
                                    <input type="checkbox" id="civil_status_check" name="civil_status_check" class="ml-2" />
                                    <select id="civil_status" name="civil_status" class="form-control" style="width: 10em">
                                        <option value="1">Married</option>
                                        <option value="0">Single</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Degree Type
                                    <input type="checkbox" id="degree_type_check" name="degree_type_check" class="ml-2" />
                                    <select id="degree_type" name="degree_type" class="form-control" style="width: 10em">
                                        <option value="1">General Degree</option>
                                        <option value="2">Special Degree</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Degree
                                    <input type="checkbox" id="degree_check" name="degree_check" class="ml-2" />
                                    <div id="the-basics">
                                        <input type="text" id="degree" name="degree" class="form-control typeahead" placeholder="BIT" style="width: 5em" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label>Class
                                    <input type="checkbox" id="class_check" name="class_check" class="ml-2" />
                                    <select id="class" name="class" class="form-control" style="width: 10em">
                                        <option value="1">First-Class Honours</option>
                                        <option value="2">Upper Second-Class Honours</option>
                                        <option value="3">Lower Second-Class Honours</option>
                                        <option value="4">Third-Class Honours</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>NVQ Level
                                    <input type="checkbox" id="nvq_level_check" name="nvq_level_check" class="ml-2" />
                                    <select id="nvq_level" name="nvq_level" class="form-control" style="width: 10em">
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
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Year
                                    <input type="checkbox" id="year_check" name="year_check" class="ml-2" />
                                    <input type="text" id="year" name="year" class="form-control" placeholder="graduate year" style="width: 10em">
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Person Type
                                    <input type="checkbox" id="graduates_person_type_check" name="graduates_person_type_check" class="ml-2" />
                                    <select id="graduates_person_type" name="graduates_person_type" class="form-control" style="width: 10em">
                                        <option value="Graduate">Graduate</option>
                                        <option value="Skill">Skill Worker</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>University
                                    <input type="checkbox" id="uni_check" name="uni_check" class="ml-2" />
                                    <select id="uni_id" name="uni_id" class="form-control" style="width: 12em">
                                        <option>No data Found</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <button id="report_gen" type="button" class="btn btn-primary">Generate</button>
                        <div class="form-row mt-2">
                            <table class="table table-bordered table-hover table-stripped col-12" style="width: 100%" id="graduate_report_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>University</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Degree</th>
                                        <th>Class</th>
                                        <th>Year</th>
                                        <th>NVQ LVL</th>
                                        <th>Person Type</th>
                                        <th>Sector</th>
                                        <th>Service Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="13" class="text-center"><b>No Data</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
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
<script src="../../js/report/graduate_report.js"></script>
<script src="../../plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables/buttons.print.min.js"></script>
<script src="../../plugins/typeahead/typeahead.js"></script>

<script>

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

    $(document).ready(function () {
//         $("#graduate_report_table").DataTable({
//             "destroy": true,
//             "responsive": true,
//             "lengthChange": false,
//             "autoWidth": false,
//             "ordering": true,
//             "scrollY": "auto",
//             "scrollCollapse": true,
//             "paging": false
//         });

        loadDistrictCombo(function () {
            loadectrorateCombo($('#district_id').val());
            loadDsdivisionCombo($('#district_id').val(), function () {
                loadGndivisionCombo($('#ds_id').val());
            });
        });

        loadSectorsCombo(function () {
            loadCategoryCombo($('#sectors_name').val());
        });

        loadUniversityCombo();

        $('#district_id').change(function () {
            let district_id = $('#district_id').val();
            loadDsdivisionCombo(district_id, function () {
                ds_division_id = $('#ds_id').val();
                loadGndivisionCombo(ds_division_id);
            });
        });

        $('#ds_id').change(function () {
            ds_division_id = $('#ds_id').val();
            loadGndivisionCombo(ds_division_id);
        });

        $('#sectors_name').change(function () {
            let sector_id = $('#sectors_name').val();
            loadCategoryCombo(sector_id);
        });

        $('#district_id').change(function () {
            let district_id = $('#district_id').val();
            loadectrorateCombo(district_id);
        });
    });

    $('#report_gen').click(function () {
        loadGraduatesReportTable();
    });
</script>
@endsection