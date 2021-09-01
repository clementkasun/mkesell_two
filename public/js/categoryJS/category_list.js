function save_category(obj, callBack) {
    if (!obj) {
        return false;
    }
    var url = '';
    url = "/api/survey/category/add";
    //JAKE STR
    ajaxRequest("POST", url, obj, function (result) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
    //JAKE END 
}
function delete_category(id, callBack) {
    if (!id) {
        return false;
    }
    var url = '';
    url = "/api/survey/category/remove/id/" + id;
    //JAKE STR
    ajaxRequest("DELETE", url, null, function (result) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
    //JAKE END 
}
function get_category(callBack) {
    var url = '';
    url = "/api/survey/category/all";
    //JAKE STR
    ajaxRequest("GET", url, null, function (result) {
        var tbl = '';
        $.each(result, function (index, value) {
            tbl += '<tr>';
            tbl += '<td>' + ++index + '</td>';
            tbl += '<td>' + value.cat_key + '</td>';
            tbl += '<td>' + value.name + '</td>';
            tbl += '<td><button type="button" class="btn btn-dark btn-xs sel-catBtn" data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + value.id + '">Select</button></td>';
            tbl += '</tr>';
        });
        $('#category_tbl tbody').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
    //JAKE END 
}
function get_category_byId(id, sur_id, callBack) {
    var url = '';
    if (!id) {
        id = 0;
    }
    url = "/api/survey/category/by_parent/id/" + id + "/survey/id/" + sur_id;
    //JAKE STR
    ajaxRequest("GET", url, null, function (result) {
        var tbl = '';
        $.each(result, function (index, value) {
            tbl += '<tr>';
            tbl += '<td>' + ++index + '</td>';
            tbl += '<td>' + value.name + '</td>';
            tbl += '<td>' + value.cat_key + '</td>';
            tbl += '<td><button type="button" class="btn btn-dark btn-xs sel-catBtn" data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + value.id + '">Select</button></td>';
            tbl += '</tr>';
        });
        $('#category_tbl tbody').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
    //JAKE END 
}


function set_selected_data(row) {
    $('#cat_name_fr').val(row.name);
    $('#cat_key_fr').val(row.cat_key);
    if (row.parent_id == null) {
        $('#patent_combo').val(0);
    } else {
        $('#patent_combo').val(row.parent_id);
    }
}

$(function () {
    $('#cat_key_fr').keypress(function (e) {
        var key = e.which;
        return ((key >= 65 && key <= 90) || (key >= 95 && key <= 122));
    });

//    $('#cat_key_fr').keydown(function (e) {
//        if (e.shiftKey || e.ctrlKey || e.altKey) {
//            e.preventDefault();
//        } else {
//            var key = e.keyCode;
//            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
//                e.preventDefault();
//            }
//        }
//    });
});


//#Get all cat combo
function get_cat_combo(id, sur_id, callBack) {
    var url = '';
    if (!id) {
        id = 0;
    }
    url = "/api/survey/category/by_parent/id/" + id + "/survey/id/" + sur_id;
    //JAKE STR
    ajaxRequest("GET", url, null, function (result) {
        var tbl = '';
        if (id == 0) {
            tbl += '<option data-goback="0" value="">N/A</option>';
        } else {
            tbl += '<option data-goback="1" value="' + id + '">No Categories</option>';
        }
        $.each(result, function (index, value) {
            tbl += '<option data-goback="0" value="' + value.id + '">' + value.name + '</option>';
        });
        $('#patent_combo').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
    //JAKE END 
}

//#Full form Rest
function restUi() {
//    get_category();
    get_cat_combo($('#patent_combo').val(), $('#survey_combo').val(), function () {
        get_category_byId($('#patent_combo').val(), $('#survey_combo').val());
    });
    var row = {
        'name': '',
        'cat_key': '',
        'parent_id': ''
    }
    set_selected_data(row);
    $('#delete_catx').val('');
    $('#delete_catx').addClass('d-none');
    $('#add_catsx').removeClass('d-none');
    disableForm($('#patent_combo').find(':selected').data('goback'));
}

function survey_name_combo(callBack) {
    var cbo = '';

    //JAKE STR
    ajaxRequest("GET", "/api/survey/name", null, function (result) {
        $.each(result, function (index, row) {
            cbo += '<option value="' + row.id + '" data-ses_status="' + row.session_status + '">' + row.name + '</option>';
        });
        $('.surveyNameCmb').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
    //JAKE END
}

function disableForm(status) {
    if (status == 0) {
        $('#cat_name_fr').prop("disabled", false);
        $('#cat_key_fr').prop("disabled", false);
        $('#add_catsx').prop("disabled", false);
    } else if (status == 1) {
        $('#cat_name_fr').prop("disabled", true);
        $('#cat_key_fr').prop("disabled", true);
        $('#add_catsx').prop("disabled", true);
        $('.sel-backBtn').removeClass('d-none');
    }
}

//Back Btn Funtions
function addPrevData(prev_val) {
    recentVals.push(prev_val);
    console.log(recentVals);
    displayPrevData();
}
function displayPrevData() {
    $(document).ready(function () {
        var previous_val = '';
        $.each(recentVals, function (key, value) {
            previous_val += value + ', ';
        });
        $(".showPrevVal").html(previous_val);
    });
}