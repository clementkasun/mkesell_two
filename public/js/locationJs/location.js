function load_mobileUsers(callBack) {
    let option = '';
    ajaxRequest("GET", "/api/user/mobile/", null, function (resp) {
        if (resp.length == 0) {
            option = "<option>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#user_combo').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function load_LocationTable(u_id, callBack) {
    let row = '';
    ajaxRequest("GET", "/api/gps/get/user/" + u_id, null, function (resp) {
        if (resp.length == 0) {
            row = "<tr><td>No Data Found</td></tr>";
        } else {
            $.each(resp, function (index, r) {
                row += "<tr>";
                row += "<td>" + ++index + "</td>";
                row += "<td>" + r.Lat + "/" + r.Long + "</td>";
                row += "<td>" + r.assigned_date + "</td>";
                if (r.status == 0) {
                    row += "<td><button value='" + r.id + "' type='button' class='btn btn-success btn-xs selectBtn' data-lat='" + r.Lat + "' data-long='" + r.Long + "'>Select</button>&nbsp;&nbsp;<button value='" + r.id + "' type='button' class='btn btn-dark btn-xs complteBtn'>Complete</button>&nbsp;&nbsp;<button value='" + r.id + "' type='button' class='btn btn-danger btn-xs deleteBtn'>Delete</button></td>";
                } else {
                    row += "<td><button value='" + r.id + "' type='button' class='btn btn-success btn-xs selectBtn' data-lat='" + r.Lat + "' data-long='" + r.Long + "'>Select</button>&nbsp;&nbsp;(Visited)</td>";
                }

                row += "</tr>";
            });
        }
        $('#locationlist_tbl tbody').html(row);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function save_location(data, callBack) {
    ajaxRequest("POST", "/api/gps/add", data, function (resp) {
        show_mesege(resp);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function completeLocation(id, callBack) {
    ajaxRequest("PUT", "/api/gps/mark/" + id, null, function (resp) {
        show_mesege(resp);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function deleteLocation(id, callBack) {
    ajaxRequest("DELETE", "/api/gps/remove/" + id, null, function (resp) {
        show_mesege(resp);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function get_locationByUser(u_id, callBack) {
    ajaxRequest("GET", "/api/gps/get/user/" + u_id, null, function (resp) {
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function get_PointersByUser(u_id, callBack) {
    var location = [];
    ajaxRequest("GET", "/api/gps/points/pending/user/" + u_id, null, function (resp) {
        $.each(resp, function (index, row) {
            let arr = ["<b>Point " + ++index + "<br>" + row.assigned_date + "</b>", row.Lat, row.Long];
            location.push(arr);
        });
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(location);
        }
    });
}

function validateLatLng(lat, lng) {
    let pattern = new RegExp('^-?([1-8]?[1-9]|[1-9]0)\\.{1}\\d{1,6}');

    return pattern.test(lat) && pattern.test(lng);
}
