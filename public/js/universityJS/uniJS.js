
function loadUniTable(callBack) {
    let tbl = '';
    let url = '/api/get_universities';
    ajaxRequest("GET", url, null, function (resp) {
        if (resp.length == 0) {
            tbl = "<td>No Data Found</td>";
        } else {
            $.each(resp, function (index, row) {
                tbl += "<tr>";
                tbl += "<td>" + ++index + "</td>";
                tbl += "<td>" + row.name + "</td>";
                tbl += "<td><button type='button' value='" + row.id + "' class='btn btn-primary edit mr-2'><i class='fa fa-edit' aria-hidden='true'></i></button><button type='button' value='" + row.id + "' class='btn btn-warning delete'><i class='fa fa-trash-alt' aria-hidden='true'></i></button></td>";
                tbl += "</tr>";
            });
        }
        $('#univerTbl tbody').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function save_uni_details() {
    var data = $("#uni_form").serializeArray();
    url = "/api/save_university";
    ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                'University',
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
        loadUniTable();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function update_uni_details(id) {
    var data = $("#uni_form").serializeArray();
    url = "/api/update_university" + "/" + id;
    ajaxRequest("PUT", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                'University',
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
        loadUniTable();
        //        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function delete_uni_details(id) {
    url = "api/delete_university/" + id;
    ajaxRequest("DELETE", url, false, function (result) {
        console.log(result);
        if (result.status == 1) {
            Swal.fire(
                'University',
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
        loadUniTable();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

$(document).on("click", ".edit", function () {
    $('#update').removeClass('d-none');
    $('#save').addClass('d-none');
    let id = $(this).val();
    let url = '/api/get_university/' + id;
    ajaxRequest("GET", url, null, function (row) {
        fill_uni_form(row[0])
    });
});

function fill_uni_form(data) {
    let row = data;
    $('#comp_ins_name').val(row.name);
    $('#university_id').val(row.id);
    console.log('Successfully populated the form data')
}