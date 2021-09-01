function loadDistrictCombo(callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_districts/", null, function (resp) {
        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.district_name + "</option>";
            });
        }
        $('#district_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadDsdivisionCombo(district_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_ds_divisions/" + district_id, null, function (resp) {

        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#ds_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadGndivisionCombo(ds_division_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_gn_divisions/" + ds_division_id, null, function (resp) {

        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#gn_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadSectorsCombo(callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_sectors/", null, function (resp) {

        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#sectors_name').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadCategoryCombo(sector_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_service_catagory/" + sector_id, null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                option += '<option value="' + row.id + '">' + row.name + '</option>';
            });
        }
        $('#service_cat_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadUniversityCombo(callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_universities/", null, function (resp) {

        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#uni_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadectrorateCombo(district_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_electorate_division/" + district_id, null, function (resp) {

        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#electorate_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadGraduatesReportTable(callBack) {
    let tbl = '';
    $('#graduate_report_table tbody').html('');
    let data = $("#graduate_report_form").serializeArray();
    ajaxRequest("post", "/api/search_graduate_by_critiria", data, function (resp) {
        if (resp.length == 0) {
            tbl = "<tr><td colspan='13' class='text-center'><b>No Data</b></td></tr>";
        } else {
            // $("#graduate_report_table").DataTable({
            //     "destroy": true,
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'print'
            //     ]
            // });
            $.each(resp, function (index, row) {
                tbl += "<tr>";
                tbl += "<td>" + ++index + "</td>";
                tbl += (row.graduates_fname == null) ? '<td> ---- </td>' : "<td>" + row.graduates_fname + "</td>";
                tbl += (row.graduates_lname == null) ? '<td> ---- </td>' : "<td>" + row.graduates_lname + "</td>";
                tbl += (row.university_name == null) ? '<td> ---- </td>' : "<td>" + row.university_name + "</td>";
                // tbl += "<td>" + row.graduates_gender + "</td>";
                // tbl += "<td>" + row.graduates_civil_status + "</td>";
                if (row.graduates_status != null) {
                    if (row.graduates_status == 0) {
                        tbl += "<td> Pending </td>";
                    }
                    if (row.graduates_status == 1) {
                        tbl += "<td> Approved </td>";
                    }
                }
                if (row.graduates_status == null) {
                    tbl += "<td> - </td>";
                }
                tbl += "<td>" + row.graduates_degree_type + "</td>";

                // if (row.graduates_degree != null) {
                //     tbl += "<td>" + row.graduates_degree + "</td>";
                // }

                // if (row.graduates_degree == null) {
                //     tbl += "<td> - </td>";
                // }
                tbl += (row.graduates_degree == null) ? '<td> ---- </td>' : '<td style="width: 150px">' + row.graduates_degree + '</td>';
                tbl += "<td>" + row.graduates_class + "</td>";
                tbl += (row.graduates_year == null) ? '<td> ---- </td>' : "<td>" + row.graduates_year + "</td>";
                tbl += "<td>" + row.grad_nvq_level + "</td>";
                tbl += "<td>" + row.graduates_person_type + "</td>";
                tbl += "<td>" + row.sectors_name + "</td>";
                tbl += "<td>" + row.service_categories_name + "</td>";
                // tbl += "<td>" + row.districts_name + "</td>";
                // tbl += "<td>" + row.ds_division_name + "</td>";
                // tbl += "<td>" + row.gn_divisions_name + "</td>";
                // tbl += "<td>" + row.id + "</td>";
                tbl += "</tr>";
            });
        }
        $('#graduate_report_table tbody').html(tbl);
        $('#graduate_report_table').DataTable({
            "destroy": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "scrollY": "auto",
            "scrollCollapse": true,
            "paging": false,
            "dom": 'Bfrtip',
            "buttons": [
                'print'
            ]
        });
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

// function loadGraduatesReportTable2() {
//     graduate_list = $('#graduate_report_table').DataTable({
//         "destroy": true,
//         "processing": true,
//         "colReorder": true,
//         "serverSide": false,
//         "pageLength": 10,
//         language: {
//             searchPlaceholder: "Search..."
//         },
//         "ajax": {
//             "url": "/api/search_graduate_by_critiria",
//             "type": "POST",
//             "dataSrc": ""
//         },
//         "columns": [{
//             "data": ""
//         },
//         {
//             "data": "graduates_fname",
//             "defaultContent": "-"
//         },
//         {
//             "data": "graduates_lname",
//             "defaultContent": "-"
//         },
//         {
//             "data": "university_name",
//             "defaultContent": "-"
//         },
//         {
//             "data": "graduates_status",
//             "defaultContent": "-"

//         },
//         {
//             "data": "graduates_degree_type",
//             "defaultContent": "-"
//         },
//         {
//             "data": "graduates_degree",
//             "defaultContent": "-"
//         },
//         {
//             "data": "graduates_class",
//             "defaultContent": "-"
//         },
//         {
//             "data": "graduates_year",
//             "defaultContent": "-"
//         },
//         {
//             "data": "grad_nvq_level",
//             "defaultContent": "-"
//         },
//         {
//             "data": "graduates_person_type",
//             "defaultContent": "-"
//         },
//         {
//             "data": "sectors_name",
//             "defaultContent": "-"
//         },
//         {
//             "data": "service_categories_name",
//             "defaultContent": "-"
//         }
//         ],
//         "order": [
//             [1, "asc"]
//         ],
//     });

//     $(function () {
//         var t = $("#tbl_registered_graduates").DataTable();
//         t.on('order.dt search.dt', function () {
//             t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
//                 cell.innerHTML = i + 1;
//             });
//         }).draw();
//     });

//     //data table error handling
//     $.fn.dataTable.ext.errMode = 'none';
//     $('#tbl_registered_graduates').on('error.dt', function (e, settings, techNote, message) {
//         console.log('DataTables error: ', message);
//     });
// }
