function create_surveySession(obj, callBack) {
    if (!obj) {
        return false;
    }

    var order = get_title_order();
    var send = {"obj1": obj, "order": order};
    if (confirm('Are you sure you want Start this Survey?\nIf you start this survey it will be appear to the all local authorities!')) {
        ajaxRequest('POST', '/api/survey/session/start', send, function (r) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(r);
            }
        });
    }
}
function add_suvey_names(obj, callBack) {
    if (!obj) {
        return false;
    }
    ajaxRequest("POST", "/api/survey/name", obj, function (parameters) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(parameters);
        }
    });
}
function restart_surv_session(ses_id, callBack) {
    if (!confirm("If You Start This Session Again It Will be Appear To All Local Authorities !\nPLEASE CONFIRM")) {
        return false;
    }
    if (isNaN(ses_id)) {
        msg_error('Please Add Survey Session First!');
        return false;
    }
    var url = "/api/survey/session/restart/id/" + ses_id;
    ajaxRequest("PATCH", url, null, function (parameters) {

        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(parameters);
        }

    });
}
function start_surv_session(ses_id, callBack) {
    if (isNaN(ses_id)) {
        msg_error('Please Add Survey Session First!');
        return false;
    }
    var url = '';
    url = "/api/survey/session/start/id/" + ses_id;
    ajaxRequest("POST", url, null, function (parameters) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(parameters);
        }
    });
}
function send_title_order(surv_sess_id, array, callBack) {
    JSON.stringify(array);
    if (isNaN(surv_sess_id)) {
        alert('Please Enter Survey Sessions First!');
        return false;
    }
    if (array.lengt == 0) {
        alert('Please Enter Survey Titles First!');
        return false;
    }
    var send = {"name_id": surv_sess_id, "order": array};
    if (array.length == 0) {
        return false;
    }
    var url = '';
    url = "/api/survey/name/order";
    ajaxRequest('PUT', url, send, function (parameters) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(parameters);
        }
    });
}
function end_surv_session(ses_id, callBack) {
    if (!confirm('Are you sure you want to End This Survey Session? \nIf you end this survey all institutes can\'t add survey data again')) {
        return false;
    }
    if (isNaN(ses_id)) {
        msg_error('Please Add Survey Session First!');
        return false;
    }
    var url = '';
    url = "/api/survey/session/end/id/" + ses_id;
    ajaxRequest('PATCH', url, null, function (parameters) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(parameters);
        }
    });

}


//
function survey_name_combo(callBack) {
    var cbo = '';
    $('.surveyCmb').html(cbo);
    ajaxRequest('GET', '/api/survey/name', null, function (result) {
        $.each(result, function (index, row) {
            cbo += '<option value="' + row.id + '" data-ses_status="' + row.session_status + '">' + row.name + '</option>';
        });
        $('.surveyNameCmb').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function survey_combo(callBack) {
    var cbo = '';
    $('.surveyCmb').html(cbo);
    ajaxRequest('GET', '/api/survey/sessions', null, function (result) {
        $.each(result, function (index, row) {
            cbo += '<option value="' + row.id + '" data-ses_status="' + row.session_status + '">' + row.name + '</option>';
        });
        $('.surveyCmb').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function load_allSurveysTbl(callBack) {
    $('#survey_names_tbl tbody').html('');
    var cbo = '';
    ajaxRequest('GET', "/api/survey/name", null, function (parameters) {
        $.each(parameters, function (index, row) {
            cbo += '<tr>';
            cbo += '<td>' + ++index + '</td><td>' + row.name + '</td>';
            if (parseInt(row.type) === 1) {
                cbo += '<td>Yearly Repeat</td>';
            } else {
                cbo += '<td>One Time</td>';
            }
            cbo += '<td><button type="button" class="btn btn-danger btn-xs del_nameBtn" value="' + row.id + '">Remove</button> <button type="button" class="btn btn-dark btn-xs sel_nameBtn" value="' + row.id + '">Select</button></td>';
            cbo += '</tr>';
        });
        $('#survey_names_tbl tbody').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function load_allSessionsTbl(callBack) {
    $('#sur_sessionTable tbody').html('');
    var cbo = '';
    ajaxRequest("GET", "/api/survey/sessions", null, function (result) {
        $.each(result, function (index, row) {
            var end_btn = '';
            var res_btn = '';
            var del_btn = '<button type="button" class="btn btn-danger del_sessionBtn" value="' + row.id + '">Remove</button></td>';
            cbo += '<tr>';
            cbo += '<td>' + ++index + '</td><td>' + row.survey_name.name + '</td>';
            switch (row.session_status) {
                case 1:
                    end_btn = '<button type="button" class="btn btn-default sess_end" value="' + row.id + '">End Session</button>';
                    cbo += '<td>Survey Started</td>';
                    break;
                case 2:
                    res_btn = '<button type="button" class="btn btn-default sess_rest" value="' + row.id + '">Re-Start Session</button>';
                    del_btn = '';
                    cbo += '<td>Survey Ended</td>';
                    break;
                default:
                    cbo += '<td>N/A</td>';
                    break;
            }
            cbo += '<td>' + end_btn + ' ' + del_btn + ' ' + res_btn;
            cbo += '</tr>';
        });
        $('#sur_sessionTable tbody').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function load_titlesTbl(callBack) {
    $('#sur_titleTable tbody').html('');
    var cbo = '';
    ajaxRequest("GET", "/api/survey/titles", null, function (result) {
        $.each(result, function (index, row) {
            cbo += '<tr><td><input type="checkbox" name="selttl" value="' + row.id + '" class=""/></td><td>' + row.name + '</td></tr>';
        });
        $('#sur_titleTable tbody').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function load_titlesByNameTbl(session_id, callBack) {
    var cbo = '';
    $('#avl_sur_titleTable tbody').html(cbo);
    ajaxRequest('GET', "/api/survey/name/id/" + session_id, null, function (result) {
        $.each(result, function (index, row) {
            cbo += '<tr class="tblrowval" data-ttl_id="' + row.id + '"><td class="ordervalues">' + ++index + '</td><td>' + row.name + '</td><td><button type="button" class="btn btn-sm btn-default up"><i class="fa fa-arrow-up"></i></button> <button type="button" class="btn btn-sm btn-default down"><i class="fa fa-arrow-down"></i></button></td></tr>';
        });
        $('#avl_sur_titleTable tbody').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function Delete_survey_session(del_id, callBack) {
    if (isNaN(del_id)) {
        alert('invalid Selection !');
        return false;
    }
    if (confirm('Are you sure you want to remove this Recod?')) {
        ajaxRequest("DELETE", "/api/survey/session/id/" + del_id, null, function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        });
    }
}
function Delete_survey_name(del_id, callBack) {
    if (isNaN(del_id)) {
        alert('invalid Selection !');
        return false;
    }
    if (confirm('Are you sure you want to remove this Recod?')) {
        ajaxRequest("DELETE", "/api/survey/name/id/" + del_id, null, function (parameters) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(parameters);
            }
        });
    }
}
// const Toast = Swal.mixin({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 4000

// });
function AlertMEssege(type) {
    if (type == 'true') {
        Toast.fire({
            type: 'success',
            title: '<h4>Success</h4>'
        });
    } else {
        Toast.fire({
            type: 'error',
            title: '<h4>Error !</h4>'
        });
    }
}
function msg_error(msg) {
    Toast.fire({
        type: 'error',
        title: '<h4>Error !</h4><p>' + msg + '</p>'
    });
}
//function display_ses_btn(st) {
//    $('#survey_sessTbltitle').html($('#survey_combo :selected').text() + ' Titles');
//    console.log(st);
//    if (st === 0) {
//        $('#sess_strt').prop("disabled", false);
//        $('#sess_end').prop("disabled", true);
//    } else if (st === 1) {
//        $('#sess_strt').prop("disabled", true);
//        $('#sess_end').prop("disabled", false);
//    } else {
////            $('#survey_sessTbltitle').html('Survey Titles');
//        $('#sess_strt').prop("disabled", true);
//        $('#sess_end').prop("disabled", true);
//    }
//}
function get_title_order() {
    var obj = {};
    arr = [];
    $("#avl_sur_titleTable > tbody > tr").each(function (index, element) {
        obj[index] = $(this).data('ttl_id');
        arr.push(obj);
    });
    // console.log(obj);
    if (obj) {
        return obj;
    } else {
        return false;
    }


}

function get_surv_sesion_f_val() {
    var data = {
        'survey_name_id': parseInt($('#survey_combo').val()),
        'start_date': $('#surv_create_dt').val(),
        'end_date': $('#surv_end_dt').val(),
        'year': parseInt($('#surv_year').val())
    };
    if ((data.start_date.length == 0) || (data.end_date.length === 0)) {
        alert('Please Add dates First !');
        return false;
    }
    if (isNaN(data.survey_name_id)) {
        alert('You Must add survey names first!');
        return false;
    }
    if (isNaN(data.year)) {
        alert('Please Add Survey Year!');
        return false;
    }
    return data;
}
function get_surv_name_f_val() {
    var data = {
        'name': $('#surv_name').val().trim(),
        'type': $('#update_type').val()
    };
//    var array = $.map($('input[name="selttl"]:checked'), function (c) {
//        return c.value;
//    });
    if (data.name.length == 0) {
        alert('Please enter survey name!');
        return false;
    }
//    if (array.length == 0) {
//        alert('Please Select Survey Titles !');
//        return false;
//    }
//    data.titles = array;
    return data;
}

function reset_sur_createFrm() {
    load_titlesTbl();
    $('#surv_name').val('');
    $('#surv_create_dt').val('');
    $('#surv_end_dt').val('');
    $('#surv_year').val('');
    $('#update_session_name').addClass('d-none');
}

function Select_survey_name(servay_id, callBack) {
    ajaxRequest('GET', "/api/survey/surveyname/id/" + servay_id, null, function (result) {
        $('#surv_name').val(result.name);
        $('#update_type').val(result.type);
        $('#update_session_name').val(result.id);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function update_suvey_names(id, servey_name, Update_type, callBack) {
    if (!id) {
        return false;
    }
    var data = {
        'name': servey_name,
        'type': Update_type
    };
    ajaxRequest('PUT', "/api/survey/name/id/" + id, data, function (parameters) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(parameters);
        }
    });
}