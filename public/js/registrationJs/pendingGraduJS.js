
function loadPendingGraduatesTable(callBack) {
    // let tbl = '';
    // ajaxRequest("GET", "/api/pending_graduates", null, function (resp) {

    //     if (resp.length == 0) {
    //         tbl = "<td>No Data Found</td>";
    //     } else {
    //         $.each(resp, function (index, row) {
    //             tbl += "<tr>";
    //             tbl += "<td>" + row.first_name + " " + row.last_name + "</td>";
    //             tbl += "<td>" + row.address + "</td>";
    //             tbl += "<td>" + row.tel + "</td>";
    //             tbl += "<td>" + row.email + "</td>";
    //             tbl += "<td>" + row.nic + "</td>";
    //             tbl += "<td>" + row.educational_qualification + "</td>";
    //             tbl += "<td>" + row.degree + "</td>";
    //             tbl += "<td>" + row.year + "</td>";
    //             tbl += "<td>" + row.university_name + "</td>";
    //             tbl += "<td>";
    //             tbl += "<button id='approveGraduate' value='" + row.id + "' type='button' class='btn btn-success'>Approve</button>	&nbsp;	&nbsp;";
    //             tbl += "</td>";
    //             tbl += "</tr>";
    //         });
    //     }
    //     $('#pendingGraduates tbody').html(tbl);
    //     if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
    //         callBack();
    //     }
    // });

    graduate_list = $('#pendingGraduates').DataTable({
        "destroy": true,
        "processing": true,
        "colReorder": true,
        "serverSide": false,
        "pageLength": 10,
        language: {
            searchPlaceholder: "Search..."
        },

        "ajax": {
            "url": "/api/pending_graduates",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [{
                "data": ""
            },
            {
                "data": "first_name",
                "defaultContent": "-"
            },
            {
                "data": "last_name",
                "defaultContent": "-"
            },
            {
                "data": "tel",
                "defaultContent": "-"
            },
            {
                "data": "educational_qualification",
                "defaultContent": "-"
            },
            {
                "data": "nvq_level",
                "defaultContent": "-"

            },
            {
                "data": "degree_type",
                "defaultContent": "-"
            },
            {
                "data": "degree",
                "defaultContent": "-"
            },
            // {
            //     "data": "class",
            //     "defaultContent": "-"
            // },
            {
                "data": "year",
                "defaultContent": "-"
            },
            {
                "data": "sectors_name",
                "defaultContent": "-"
            },
            {
                "data": "service_categories_name",
                "defaultContent": "-"
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
        var t = $("#pendingGraduates").DataTable({
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
    $('#pendingGraduates').on('error.dt', function (e, settings, techNote, message) {
        console.log('DataTables error: ', message);
    });
}

function getJtableBtnHtml(full) {
    var html = '';
    html += '<div class="btn-group" role="group"  aria-label="" >';
    html += '<button id="approveGraduate" value="' + full["id"] + '" type="button" class="btn btn-primary"><i class="fa fa-user-check" aria-hidden="true" alt="approve"></i></button>';
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
                text: 'Something went wrong!',
            })
        }
        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function update_institute_details(id) {
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
function approve_graduate(id, callBack) {
    url = "/api/approve_graduate/" + id;
    ajaxRequest("PUT", url, null, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Institute registration',
                    'Successfully Approved!',
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

function deleteInstitute(id, callBack) {

    url = "api/delete_institute/" + id;
    ajaxRequest("DELETE", url, false, function (result) {

        console.log(result);
        if (result.status == 1) {
            institute_list.ajax.reload();
            Swal.fire(
                    'Institute registration',
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
}
