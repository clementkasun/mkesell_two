function loadVacanciesTable(callBack) {
    let tbl = '';
    let url = '/api/get_vacancies';
    //    let url2 = 'http://192.168.1.5/api/get_vacancies';
    ajaxRequest("GET", url, null, function (resp) {

        if (resp.length == 0) {
            tbl = "<td class='text-center' colspan='5'>No Data Found</td>";
        } else {
            $.each(resp, function (index, row) {
                tbl += "<tr>";
                tbl += "<td>" + ++index + "</td>";
                tbl += "<td>" + row.companey_name + "</td>";
                tbl += "<td>" + row.tel_no + "</td>";
                tbl += "<td>" + row.vacancy_type + "</td>";
                tbl += "<td><button type='button' value='" + row.id + "' class='btn btn-primary btn-xs edit'><i class='fa fa-edit' aria-hidden='true'></i></button> <a id='profile' href='/vacancy_profile/id/" + row.id + "' type='button' class='btn btn-success btn-xs'><i class='fa fa-address-card' aria-hidden='true'></i></a><button type='button' value='" + row.id + "' class='btn btn-warning btn-del btn-xs ml-1'><i class='fa fa-trash-alt' aria-hidden='true'></i></button> </td>";
                tbl += "</tr>";
            });
        }
        $('#vacancyTbl tbody').html(tbl);
        $('#vacancyTbl').DataTable();
        // $('#vacancyTbl').DataTable({
        //     destroy: true,
        //     searching: false
        // });
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadVacanciesStatusTable(callBack) {
    let tbl = '';
    let url = '/api/get_vacancies';
    //    let url2 = 'http://192.168.1.5/api/get_vacancies';
    ajaxRequest("GET", url, null, function (resp) {
        if (resp.length == 0) {
            tbl = "<td>No Data Found</td>";
        } else {
            $.each(resp, function (index, row) {
                //                row.status = 1; //temp
                tbl += "<tr>";
                tbl += "<td style='width: 10%'>" + row.companey_name + "</td>";
                tbl += "<td>" + row.tel_no + "</td>";
                tbl += "<td>" + row.vacancy_type + "</td>";
                if (row.status == 1) {
                    tbl += "<td><span class='badge bg-success'>Active</span></td>";
                } else {
                    tbl += "<td><span class='badge bg-danger'>Inactive</span></td>";
                }
                if (row.status == 1) {
                    tbl += "<td><button type='button' value='" + row.id + "' data-status-type='deact' class='changevaStatus btn btn-block btn-danger btn-sm'>Deactivate</button></td>";
                } else {
                    tbl += "<td><button type='button' value='" + row.id + "' data-status-type='activate' class='changevaStatus btn btn-block btn-success btn-sm'>Activate</button></td>";
                }
                tbl += "</tr>";
            });
        }
        $('#vacancyTbl tbody').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadVacanciesProfile(id, callBack) {
    let tbl = '';
    let url = '/api/get_vacancy/' + id;
    ajaxRequest("GET", url, null, function (resp) {
        if (resp.length == 0) {
            tbl = "<td>No Data Found</td>";
        } else {
            let service_categories_id;
            $.each(resp, function (index, row) {
                service_categories_id = row.service_categories_id
                tbl += "<tr>";
                tbl += "  <th>Image:</th>";
                tbl += "  <td><img src='/storage/" + row.vacancy_image + "' width='25%' height='150mm'/></td>";
                tbl += " </tr>";
                tbl += "<tr>";
                tbl += " <th>Company Name:</th>";
                tbl += " <td>" + row.companey_name + row.vacancy_type + "</td>";
                tbl += "</tr>";
                tbl += "<tr>";
                tbl += "   <th>Telephone:</th>";
                tbl += "   <td>" + row.tel_no + "</td>";
                tbl += "</tr>";
                tbl += "<tr>";
                tbl += "    <th>Vacancy Type:</th>";
                tbl += "    <td>" + row.vacancy_type + "</td>";
                tbl += "</tr>";
                tbl += "<tr>";
                tbl += "    <th>Contact Person:</th>";
                tbl += "    <td>" + row.contact_person + "</td>";
                tbl += "</tr>";
                tbl += "<tr>";
                tbl += "    <th>Starting Date:</th>";
                tbl += "    <td>" + row.starting_date + "</td>";
                tbl += "</tr>";
                tbl += "<tr>";
                tbl += "  <th>Closing Date:</th>";
                tbl += "  <td>" + row.closing_date + "</td>";
                tbl += "</tr>";
                tbl += "<tr>";
                tbl += " <th>Status:</th>";
                if (row.status == 1) {
                    tbl += "<td><span class='badge bg-success pl-3 pr-3 pt-2 pb-2'>Active</span></td>";
                } else {
                    tbl += "<td><span class='badge bg-danger pl-3 pr-3 pt-2 pb-2'>Inactive</span></td>";
                }
                tbl += "  </tr>";
                tbl += " <tr>";
                tbl += "    <th>Send sms:</th>";
                if (row.is_from_sector == 1) {
                    tbl += "<td><button value='" + row.sector_id + "' class='btn btn-md btn-secondary text-light' id='vacancy_profile_sms' data-status='sec'>Send SMS To Sector</button></td>";
                }
                if (row.is_from_sector == 2) {
                    tbl += "<td><button value='" + row.service_categories_id + "' class='btn btn-md btn-secondary text-light' id='vacancy_profile_sms' data-status='service_cat'>Send SMS To Service Category</button></td>";
                }
                tbl += "</tr>";
            });
        }
        $('#vacancyProfileTbl').html(tbl);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function update_status_vac(id, status) {
    let data = {
        vacancy_status: status
    };

    url = "/api/update_vacancy_status/" + id;
    ajaxRequest("PUT", url, data, function (result) {
        if (result.status == 1) {
            loadVacanciesStatusTable();
            Swal.fire(
                    'Vacancy Status',
                    'Successfully Changed!',
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

function save_vacancy_details() {
//    let is_from_sector = '';
//    if($('#notify_which').val() == 1){
//        is_from_sector = $('#sector').val();
//    }
    let data = {
        companey_name: $('#companey_name').val(),
        address: $('#address').val(),
        tel_no: $('#tel').val(),
        fax: $('#fax_num').val(),
        email: $('#email').val(),
        contact_person: $('#contact_person').val(),
        description: $('#description').val(),
        service_catagories_id: $('#category').val(),
        sector_id: $('#sector').val(),
        vacancy_type: $('#vacancy_type').val(),
        starting_date: $('#starting_date').val(),
        closing_date: $('#closing_date').val(),
        vacancy_image: $('#vacancy_image')[0].files[0],
        is_from_sector: $('#notify_which').val()
    };
    //    var data = $("#vacancy_registration").serializeArray();
    let url = "/api/save_vacancy";

    ulploadFileWithData(url, data, function (result) {
        loadVacanciesTable();
        $('#vacancy_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function update_vacancy_details(id) {
//    let is_from_sector = '';
//    if($('#notify_which').val() == 1){
//        is_from_sector = $('#sector').val();
//    }
    let data = {
        companey_name: $('#companey_name').val(),
        address: $('#address').val(),
        tel_no: $('#tel').val(),
        fax: $('#fax_num').val(),
        email: $('#email').val(),
        contact_person: $('#contact_person').val(),
        description: $('#description').val(),
        service_catagories_id: $('#category').val(),
        vacancy_type: $('#vacancy_type').val(),
        starting_date: $('#starting_date').val(),
        closing_date: $('#closing_date').val(),
        vacancy_image: $('#vacancy_image')[0].files[0],
        is_from_sector: $('#notify_which').val()
    };
    //    var data = $("#vacancy_registration").serializeArray();
    let url = "/api/update_vacancy/" + id;
    ulploadFileWithData(url, data, function (result) {
        if (result.status == 1) {
            loadVacanciesTable();
            Swal.fire(
                    'Vacancy',
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

function deleteVacancy(id, callBack) {
    alert('This record will be deleted!');
    url = "/api/delete_vacancy/" + id;
    ajaxRequest("DELETE", url, false, function (result) {
        console.log(result);
        if (result.status == 1) {
            loadVacanciesTable();
            Swal.fire(
                    'Vacancy',
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

function send_sms(msg, tel_no) {
    ajaxRequest("POST", "/api/notify_single/", {
        sms: msg,
        tel: tel_no
    }, function (resp) { });
}

$(document).on("click", "#vacancy_profile_sms", function () {

    let url = '/api/get_vacancy/' + $('#vacancy_profile_sms').val();
    let companey_name = '';
    let companey_address = '';
    let email = '';
    let contact = '';
    let vacancy_type = '';
    let closing_date = '';

    ajaxRequest("GET", url, null, function (resp) {
        console.log(resp);
        if (resp[0].companey_name != null) {
            companey_name = resp[0].companey_name;
        }
        if (resp[0].companey_name == null) {
            companey_name = "------";
        }
        if (resp[0].address != null) {
            companey_address = resp[0].address;
        }
        if (resp[0].address == null) {
            companey_address = "------";
        }
        if (resp[0].email != null) {
            email = resp[0].email;
        }
        if (resp[0].email == null) {
            email = "------";
        }
        if (resp[0].contact_person != null) {
            contact = resp[0].contact_person;
        }
        if (resp[0].contact_person == null) {
            contact = "------";
        }
        if (resp[0].vacancy_type != null) {
            vacancy_type = resp[0].vacancy_type;
        }
        if (resp[0].vacancy_type == null) {
            vacancy_type = "------";
        }
        if (resp[0].closing_date != null) {
            closing_date = resp[0].closing_date;
        }
        if (resp[0].closing_date == null) {
            closing_date = "------";
        }
        let msg = "You have new vacancy on " + companey_name + "  for  " + vacancy_type + " at " + companey_address + '.Closing date of this vacancy is on ' + closing_date + "." + "Please contact for more further details. \n" + "Tel:" + contact + " \n Email:" + email + "." + "use this link to view the vacancies suited for your skills \n https://gsms.qa.ceytechsystemsolutions.com";

        url = "/api/get_graduate_tel/id/" + $('#vacancy_profile_sms').val() + "/from/" + $('#vacancy_profile_sms').data('status') + "";
        ajaxRequest("GET", url, null, function (resp) {
            $.each(resp, function (index, row) {
                send_sms(msg, row.tel)
                console.log('Message sended to recepient of ' + row.tel);
            });
        });
    });
});

function loadSectorsCombo(callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_sectors/", null, function (resp) {
        if (resp.length == 0) {

        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#sector').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadCategoryCombo(sector_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_service_catagory/" + sector_id, null, function (resp) {

        if (resp.length == 0) {

        } else {
            $.each(resp, function (index, row) {
                option += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $('#category').html(option);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

$(document).on("click", ".edit", function () {
    $('#update').removeClass('d-none');
    $('#save').addClass('d-none');
    let id = $(this).val();
    $('#update').val(id);
    let url = '/api/get_vacancy/' + id;
    ajaxRequest("GET", url, null, function (row) {
        fill_vacancy_form(row[0])
    });
});

function fill_vacancy_form(data) {
    let row = data;
    $('#vacancy_id').val(row.id);
    $('#companey_name').val(row.companey_name);
    $('#address').val(row.address);
    $('#tel').val(row.tel_no);
    $('#fax_num').val(row.fax);
    $('#email').val(row.email);
    $('#contact_person').val(row.contact_person);
    $('#description').val(row.description);
//    $('#sector  option[value="'+row.sector_id+'"]').prop("selected", true);
//    $('#category  option[value="'+row.service_categories_id+'"]').prop("selected", true);
    $('#sector').val(row.sector_id).change();
    $('#category').val(row.service_categories_id).change();
    $('#vacancy_type').val(row.vacancy_type);
    $('#starting_date').val(row.starting_date);
    $('#closing_date').val(row.closing_date);
    $('#notify_which').val(row.is_from_sector);
    // document.getElementById('vacancy_image').src = window.URL.createObjectURL(this.files[0]);
    console.log('Successfully populated the form data')
}

function loadVacancyPage(user_id) {
    let option = '';
    let url = "/api/get_user_vacancies/" + user_id;

    try {
        $.ajax({
            type: "GET",
            url: url,
            success: function (resp) {
                // handle success
                if (resp.length == 0) {
                    Swal.fire(
                            'All Vacancies View',
                            'You have no vacancies!',
                            'warning'
                            );
                } else {
                    option += "<div class='row'>";
                    $.each(resp, function (index, row) {
//                    console.log(row);
//                    if (row.companey_name != undefined) {
                        option += "<div class='col-md-6'>";
                        option += "<div class='card card-widget card-primary' style='boder-radius: 15px;'>";
                        option += " <div class='card-header'>";
                        option += " <div class='user-block'>";
//                    if (row.image != null) {
//                        option += "<img class='img-circle2' src='/storage/" + row.image + "' alt = 'contact_person'>";
//                    }
//                    if (row.image == null) {
//                        option += "<img class='img-circle2' src='data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' alt = 'user_image'>";
//                    }
                        if (row.companey_name == null) {
                            row.company_name = '------------';
                        }
                        if (row.vacancy_type == null) {
                            row.vacancy_type == '------------'
                        }
                        if (row.created_at == null) {
                            row.created_at = '------------';
                        }
                        if (row.tel_no == null) {
                            row.tel_no = '------------';
                        }
                        if (row.starting_date == null) {
                            row.starting_date = '------------';
                        }
                        if (row.closing_date == null) {
                            row.closing_date = '------------';
                        }
                        if (row.description == null) {
                            row.description = '------------';
                        }
                        if (row.contact_person == null) {
                            row.contact_person = '------------';
                        }
                        option += "<span><b class='text-light'>Description: " + row.description + "</b></span>";
                        option += "</br>";
                        option += "<span><b>Closing date: " + row.closing_date + "</b></span>";
                        option += "</div>";
                        option += "<div class='card-tools'>";
                        option += "<button type='button' class='btn btn-tool' title='Mark as read'>";
                        option += "<i class='far fa-circle'></i>";
                        option += "</button>";
                        option += "<button type='button' class='btn btn-tool' data-card-widget='collapse'>";
                        option += "<i class='fas fa-minus'></i>";
                        option += "</button>";
                        option += "<button type='button' class='btn btn-tool' data-card-widget='remove'>";
                        option += "<i class='fas fa-times'></i>";
                        option += "</button>";
                        option += "</div>";
                        option += "</div>";
                        option += "<div class='card-body'>";
                        if (row.vacancy_image != null) {
                            option += "<img class='img-fluid pad' src ='/storage/" + row.vacancy_image + "' alt ='Vacancy Photo' style='width:100%; height: 20em; boder-radius: 15px; object-fit: cover'>";
                        }
                        option += "</div>";
                        option += "<div class='card-footer card-comments bg-dark'>";
                        option += " <div class='card-comment'>";
                        // option += " <img class='img-circle2 img-sm' src='' alt='contact_person'>";
                        option += " <div class='comment-text'>";
                        option += "<b class='text-light'> Companey: " + row.companey_name + "</b></br>";
                        option += "<a href='' class='text-light'><b> Vacancy Type: " + row.vacancy_type + "</b></a></br>";
                        option += "<span class='contact_person text-light'><b>Contact Person: </b><span class='text-light'>" + row.contact_person + "</span>";
                        option += "</br>";
                        if (row.email != null) {
                            option += "<b class='text-light'>Email: </b>" + row.email + "</br>";
                        }
                        if (row.email == null) {
                            option += "<b class='text-light'>Email: </b>-------------</br>";
                        }
                        option += "<b>Office No: </b><span class='text-light'>" + row.tel_no + "</span></br>";
                        option += "</span>";
                        option += "</div>";
                        option += "</div>";
                        option += "</div>";
                        option += "</div>";
                        option += "</div>";
//                    }
                    });
                    option += "</div>";
                }
                $('#vacancy_content').html(option);
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack();
                }
            },
            error: function (resp, status, error) {
                // handle error
                Swal.fire(
                        'All Vacancies View',
                        'Error has occured!',
                        'danger'
                        );
            }
        });
    } catch (err) {
        alert(err);
    }
}