
function loadGraduatesTable(callBack) {

    graduate_list = $('#tbl_registered_graduates').DataTable({
        "destroy": true,
        "processing": true,
        "colReorder": true,
        "serverSide": false,
        "pageLength": 10,
        language: {
            searchPlaceholder: "Search..."
        },
        "ajax": {
            "url": "/api/approved_graduates",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [{
                "data": ""
            },
            {
                "data": "first_name",
                "defaultContent": "-----"
            },
            {
                "data": "last_name",
                "defaultContent": "-----"
            },
            {
                "data": "tel",
                "defaultContent": "-----"
            },
            {
                "data": "educational_qualification",
                "defaultContent": "-----"
            },
            {
                "data": "nvq_level",
                "defaultContent": "-----"

            },
            {
                "data": "degree_type",
                "defaultContent": "-----"
            },
            {
                "data": "degree",
                "defaultContent": "-----"
            },
            {
                "data": "year",
                "defaultContent": "-----"
            },
            {
                "data": "sectors_name",
                "defaultContent": "-----"
            },
            {
                "data": "service_categories_name",
                "defaultContent": "-----"
            },
            {
                "data": "id"
            }
        ],
        "columnDefs": [{
                "targets": -1,
                "data": "0",
                "render": function (data, type, full, meta) {
                    return getJtableBtnHtml(full);
                }
            }],
        "order": [
            [1, "asc"]
        ],
    });

    $(function () {
        var t = $("#tbl_registered_graduates").DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
        t.on('order.dt search.dt', function () {
            t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

    //data table error handling
    $.fn.dataTable.ext.errMode = 'none';
    $('#tbl_registered_graduates').on('error.dt', function (e, settings, techNote, message) {
        console.log('DataTables error: ', message);
    });
}

function getJtableBtnHtml(full) {
    var html = '';
    html += '<div class="btn-group" role="group"  aria-label="" >';
    html += '<a href="/graduate_edit/' + full['id'] + '" class="btn btn-primary" role="button" data-toggle="tooltip" title="edit"><i class="fa fa-edit" style="width: 10px" aria-hidden="true" alt="update"></i></a>';
    html += '<button type="button" class="btn btn-warning btn-del" value="' + full["id"] + '" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-alt" style="width: 10px" aria-hidden="true"  alt="delete"></i></button>';
    html += '<a href="/graduate_profile/' + full['id'] + '" class="btn btn-success" role="button" data-toggle="tooltip" title="profile"><i class="fa fa-address-card" style="width: 10px" aria-hidden="true"  alt="profile"></i></a>';
    html += '</div>';
    return html;
}

function save_graduate_details() {
    var data = $("#degree_registration").serializeArray();
    url = "/api/save_graduate";
    ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Institute registration',
                    'Successfully Saved!',
                    'success'
                    );
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: result.msg,
            })
        }
        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function updateGraduate(id) {
    var data = $("#institute_registration").serializeArray();
    // console.log(data);
    url = "/api/update_institute/" + id;
    ajaxRequest("PUT", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Institute registration',
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
        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function deleteGraduate(id, callBack) {
    if (confirm('Are sure to delete the Graduate!')) {
        url = "api/delete_graduate/" + id;
        ajaxRequest("DELETE", url, false, function (result) {
            console.log(result);
            if (result.status == 1) {
                $('#tbl_registered_graduates').DataTable().ajax.reload();
                Swal.fire(
                        'Graduate registration',
                        'Successfully Deleted!',
                        'success'
                        );
                location.reload();
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
}
