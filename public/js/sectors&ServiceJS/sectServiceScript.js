
function loadSectorTable(callBack) {
    let tbl = '';
    let url = '/api/get_sectors';
    ajaxRequest("GET", url, null, function (resp) {

        if (resp.length == 0) {
            tbl = "<td>No Data Found</td>";
        } else {
            $.each(resp, function (index, row) {
                tbl += "<tr>";
                tbl += "<td>" + ++index + "</td>";
                if (row.name != null) {
                    tbl += "<td>" + row.name + "</td>";
                }
                if (row.name == null) {
                    tbl += "<td>------</td>";
                }
                tbl += "<td><button value='" + row.id + "' type='button' class='btn btn-primary sector_edit mr-1'><i class='far fa-edit'></i></button><button value='" + row.id + "' type='button' class='btn btn-warning sector_delete'><i class='fa fa-trash-alt'></i></button></td>";
                tbl += "</tr>";
            });
        }
        $('#sectorsTbl tbody').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadServiceCatTable(callBack) {
    let tbl = '';
    let url = '/api/get_service_catagories';
    ajaxRequest("GET", url, null, function (resp) {

        if (resp.length == 0) {
            tbl = "<td>No Data Found</td>";
        } else {
            $.each(resp, function (index, row) {
                console.log(row);
                tbl += "<tr>";
                tbl += "<td>" + ++index + "</td>";
                if (row.sector_name != null) {
                    tbl += "<td>" + row.sector_name + "</td>";
                }
                if (row.sector_name == null) {
                    tbl += "<td>------</td>";
                }
                if (row.name != null) {
                    tbl += "<td>" + row.name + "</td>";
                }
                if (row.name == null) {
                    tbl += "<td>------</td>";
                }
                tbl += "<td><button value='" + row.id + "' type='button' class='btn btn-primary service_cat_edit mr-1'><i class='far fa-edit'></i></button><button value='" + row.id + "' type='button' class='btn btn-warning service_cat_delete'><i class='fa fa-trash-alt'></i></button></td>";
                tbl += "</tr>";
            });
        }
        $('#serviceTbl tbody').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function save_sector_details() {
    var data = $("#save_sectors").serializeArray();
    url = "/api/save_sector";
    ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                'Sector',
                'Successfully Saved!',
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
            callBack(result);
        }
    });
}

$(document).on("click", ".sector_edit", function () {
    $('#update_sector').removeClass('d-none');
    $('#save_sector').addClass('d-none');
    let id = $(this).val();
    let url = '/api/get_sector/' + id;
    ajaxRequest("GET", url, null, function (row) {
        set_sector_form(row[0])
    });
});

$(document).on("click", ".service_cat_edit", function () {
    $('#update_service_cat').removeClass('d-none');
    $('#save_service_cat').addClass('d-none');
    let id = $(this).val();
    let url = '/api/get_service_category_by_id/' + id;
    console.log(id);
    ajaxRequest("GET", url, null, function (row) {
        set_service_cat(row[0])
    });
});

$(document).on("click", ".sector_delete", function () {
    if (confirm('Are sure to delete the sector!')) {
        alert('This record will be deleted!');
        let id = $(this).val();
        let url = '/api/delete_sector/' + id;
        ajaxRequest("DELETE", url, null, function (result) {
            if (result.status == 1) {
                Swal.fire(
                    'Sector',
                    'Successfully Deleted!',
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
                callBack(result);
            }
        });
        loadSectorTable(function () {

        });
    } else {
        alert('Cancelled the Deleting!');
    }
});

$(document).on("click", ".service_cat_delete", function () {
    if (confirm('Are sure to delete the service category!')) {
        alert('This record will be deleted!');
        let id = $(this).val();
        let url = '/api/delete_service_catagory/' + id;
        ajaxRequest("DELETE", url, null, function (result) {
            if (result.status == 1) {
                Swal.fire(
                    'Service Category',
                    'Successfully Deleted!',
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
                callBack(result);
            }
        });
        loadServiceCatTable(function () {

        });
    } else {
        alert('Cancelled the Deleting!');
    }
});

function set_sector_form(data) {
    let row = data;
    $('#sector_name').val(row.name);
    $('#sector_id').val(row.id);
}

function set_service_cat(data) {
    let row = data;
    $('#comp_service_cat_name').val(row.name);
    $('#service_cat_id').val(row.id);
    $('#comp_sector_id').val(row.sector_id);
}

function update_sector(id) {
    var data = {
        sector_name: $('#sector_name').val(),
    };

    url = "/api/update_sector/" + id;
    ajaxRequest("PUT", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                'Sector',
                'Successfully Updated!',
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
            callBack(result);
        }
    });
}

function save_service_cat_details() {
    var data = $("#service_cat").serializeArray();
    url = "/api/save_service_catagory";
    ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                'Service Category',
                'Successfully Saved!',
                'success'
            );
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        }
        //        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function update_service_cat(id) {
    var data = $("#service_cat").serializeArray();
    url = "/api/update_service_catagory/" + id;
    ajaxRequest("PUT", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                'Service Category',
                'Successfully Updated!',
                'success'
            );
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        }
        //        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function loadSectorCombo(callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_sectors", null, function (resp) {

        if (resp.length == 0) {
            option = "<option value=''>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#comp_sector_id').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}