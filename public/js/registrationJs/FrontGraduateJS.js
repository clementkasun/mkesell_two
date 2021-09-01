function send_otp(data, callBack) {
    url = "/api/make_send_otp";
    //    url = "/api/make_send_otp";
    ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Online Graduate Registration',
                    'OTP has sended to your contact number!',
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

function verify_otp(send_id, otp, callBack) {
    url = "/api/auth_otp/" + send_id + "/" + otp;
    //    url = "/api/make_send_otp";
    ajaxRequest("GET", url, null, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Online Graduate Registration',
                    'Successfully Verified Your Contact Number!',
                    'success'
                    );
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! Cheack weather your contact number is valid!',
            })
        }
        //        $('#institute_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

//function update_vacancy_details(id) {
//    var data = $("#vacancy_registration").serializeArray();
//    // console.log(data);
//    url = "/api/update_vacancy/" + id;
//    ajaxRequest("PUT", url, data, function (result) {
//        if (result.status == 1) {
//            Swal.fire(
//                    'Online Graduate Registration',
//                    'Successfully Updated!',
//                    'success'
//                    );
//        } else {
//            Swal.fire({
//                icon: 'error',
//                title: 'Oops...',
//                text: 'Something went wrong!',
//            })
//        }
//        //        $('#institute_registration').trigger("reset");
//        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
//            callBack(result);
//        }
//    });
//}
//
//function deleteVacancy(id, callBack) {
//    if (confirm('Are sure to delete the Vacancy!')) {
//        url = "api/delete_vacancy/" + id;
//        ajaxRequest("DELETE", url, false, function (result) {
//            console.log(result);
//            if (result.status == 1) {
//                institute_list.ajax.reload();
//                Swal.fire(
//                        'Online Graduate Registration',
//                        'Successfully Deleted!',
//                        'success'
//                        );
//            } else {
//                Swal.fire({
//                    icon: 'error',
//                    title: 'Oops...',
//                    text: 'Something went wrong!',
//                })
//            }
//
//            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
//
//                callBack(result);
//            }
//        });
//    }
//}

function save_front_graduate_details(callBack) {
    let object = {
        first_name: $('#first_name').val(),
        last_name: $('#last_name').val(),
        nvq_level: $('#nvq_level').val(),
        address: $('#address').val(),
        tel: $('#Telephone').val(),
        year: $('#degree_year').val(),
        email: $('#email').val(),
        nic: $('#nic').val(),
        person_type: $('#person_type').val(),
        dob: $('#dob').val(),
        degree: $('#degree').val(),
        sector: $("select[name='sector'] option:selected").val(),
        degree_type: $("select[name='degree_type'] option:selected").val(),
        degree_class: $("select[name='class'] option:selected").val(),
        service_category_id: $("select[name='service_category_id'] option:selected").val(),
        electorate_division_id: $("select[name='elec_division'] option:selected").val(),
        gn_division_id: $("select[name='gn_division_id'] option:selected").val(),
        university_id: $("select[name='university_id'] option:selected").val(),
        ds_division_id: $("select[name='ds_division'] option:selected").val(),
        educational_qualification: $('#educational_qualification').val(),
        district_id: $("select[name='district'] option:selected").val(),
        civil_status: $('input[name="civil_status"]:checked').val(),
        gender: $('input[name="gender"]:checked').val(),
        is_online: 1,
    };

    object.nic_image = $('#id_image')[0].files[0];
    object.nic_image_two = $('#id_image_two')[0].files[0];
    object.degree_cert = $('#degree_cert')[0].files[0];
    object.user_image = $('#user_image')[0].files[0];

    url = "/api/save_online_graduate";
    ulploadFileWithData(url, object, function (result) {
        // ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Online Graduate Registration',
                    'Successfully Saved!',
                    'success'
                    );
            $('.verMobile').addClass('d-none');
            $('.verThanks').removeClass('d-none');
            location.reload();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: result.msg
            })
            $('.verMobile').addClass('d-none');
            $('.verRegister').removeClass('d-none');
        }
        $('#degree_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}