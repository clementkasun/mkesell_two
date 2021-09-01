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
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
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

function loadSMSGradReportTable(callBack) {
    let tbl = '';
    $('#sms_graduate_report_table tbody').html('');
    let data = $("#sms_graduate_report_form").serializeArray();
    ajaxRequest("post", "/api/search_graduate_by_critiria", data, function (resp) {
        if (resp.length == 0) {
            tbl = "<tr><td colspan='7' class='text-center'><b>No Data</b></td></tr>";
        } else {
            $.each(resp, function (index, row) {
                tbl += "<tr>";
                tbl += "<td>" + ++index + "</td>";
                tbl += (row.graduates_fname == null) ? '<td> ---- </td>' : '<td>' + row.graduates_fname + '</td>';
                tbl += (row.graduates_lname == null) ? '<td> ---- </td>' : '<td>' + row.graduates_lname + '</td>';
                tbl += (row.university_name == null) ? '<td> ---- </td>' : '<td>' + row.university_name + '</td>';
                tbl += (row.graduates_degree == null) ? '<td> ---- </td>' : '<td>' + row.graduates_degree + '</td>';
                tbl += (row.graduate_tel == null) ? '<td> ---- </td>' : '<td>' + row.graduate_tel + '</td>'
                // tbl += "<td>" + row.graduates_fname + "</td>";
                // tbl += "<td>" + row.graduates_lname + "</td>";
                // tbl += "<td>" + row.university_name + "</td>";
                // tbl += "<td>" + row.graduates_degree + "</td>";
                // tbl += "<td>" + row.graduate_tel + "</td>";
                tbl += "<td><input type='checkbox' class='getTelNum' name='tel' value='" + row.graduate_tel + "'></td>";
                tbl += "</tr>";
            });
        }
        $('#sms_graduate_report_table tbody').html(tbl);
        $("#sms_graduate_report_table").DataTable( {
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

// function getJtableBtnHtml(full) {
//     var html = '';
//     html += '<div class="btn-group" role="group"  aria-label="" >';
//     html += "<input type='checkbox' class='getTelNum' name='tel' value='" + full["graduate_tel"] + "'></input>";
//     html += '</div>';
//     return html;
// }


function post_sms_func(data, callBack) {
    ajaxRequest("POST", "/api/notify_manually", data, function (resp) {
        if (resp) {
            Swal.fire(
                'SMS Gateway',
                'Successfully Sent!',
                'success'
            );
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        }
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
