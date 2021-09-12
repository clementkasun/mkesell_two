
function loadDsdivisionCombo(selected, district_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_ds_divisions/" + district_id, null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.name + '</option>';
                }
            });
        }
        $('#ds_division').html(option);
        $('#ds_division').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadGndivisionCombo(selected, ds_division_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_gn_divisions/" + ds_division_id, null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.name + '</option>';
                }
            });
        }
        $('#gn_division').html(option);
        $('#gn_division').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadSectorsCombo(selected, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_sectors/", null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.name + '</option>';
                }
            });
        }
        $('#sector').html(option);
        $('#sector').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadCategoryCombo(selected, sector_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_service_catagory/" + sector_id, null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.name + '</option>';
                }
            });
        }
        $('#category').html(option);
        $('#category').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function loadUniversityCombo(selected, callBack) {

    let option = '';
    ajaxRequest("GET", "/api/get_universities/", null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {

            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.name + '</option>';
                }
            });
        }
        $('#university').html(option);
        $('#university').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function loadelectrorateCombo(selected, district_id, callBack) {
    let option = '';
    ajaxRequest("GET", "/api/get_electorate_division/" + district_id, null, function (resp) {

        if (resp.length == 0) {
            option += '<option value="">No Data</option>';
        } else {
            $.each(resp, function (index, row) {
                if (!isNaN(parseInt(selected)) && selected == row.id) {
                    option += '<option value="' + row.id + '" selected>' + row.name + '</option>';
                } else {
                    option += '<option value="' + row.id + '">' + row.name + '</option>';
                }
            });
        }
        $('#elec_division').html(option);
        $('#elec_division').select2();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}

function get_graduate_values(graduate_id) {
    ajaxRequest("GET", "/api/get_graduate_new/" + graduate_id, null, function (resp) {
        $('#first_name').val(resp.first_name);
        $('#last_name').val(resp.last_name);
        $('#nvq_level').val(resp.nvq_level);
        $('#address').val(resp.address);
        $('#Telephone').val(resp.tel);
        $('#degree_year').val(resp.year);
        $('#email').val(resp.email);
        $("#person_type").val(resp.person_type);
        $('#nic').val(resp.nic);
        $('#dob').val(resp.dob);
        $('#degree').val(resp.degree);
        $('input[name="is_from_sector"]:checked').val(resp.is_from_sector);
        $("#degree_type").val(resp.degree_type);
        $("#degree_class").val(resp.class);
        $('#educational_qualification').val(resp.educational_qualification);
        $('#nvq_level').val(resp.nvq_level);
        console.log(resp);
        var $radio_civil = $('input:radio[name=civil_status]');
        if (resp.civil_status === 'single') {
            $radio_civil.filter('[value=single]').prop('checked', true);
        }
        if (resp.civil_status === 'married') {
            $radio_civil.filter('[value=married]').prop('checked', true);
        }
        var $gender_radio = $('input:radio[name=gender]');
        if (resp.gender === 'male') {
            $gender_radio.filter('[value=male]').prop('checked', true);
        }
        if (resp.gender === 'female') {
            $gender_radio.filter('[value=female]').prop('checked', true);
        }

        if (resp.nic_image != null) {
            let nic_img = resp.nic_image;
            $('#nic_image').attr('src', '/storage/' + nic_img);
            $('#nic_image').removeClass('d-none');
            // $('#btn_id_delete').removeClass('d-none')
        }
        if (resp.nic_image == null) {
            $('#nic_image').attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=");
            $('#nic_image').removeClass('d-none');
            // $('#btn_id_delete').addClass('d-none');
        }

        if (resp.nic_image_two != null) {
            let nic_img_two = resp.nic_image_two;
            $('#nic_image_two').attr('src', '/storage/' + nic_img_two);
            $('#nic_image_two').removeClass('d-none');
            // $('#btn_id_delete').removeClass('d-none')
        }
        if (resp.nic_image_two == null) {
            $('#nic_image_two').attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=");
            $('#nic_image_two').removeClass('d-none');
            // $('#btn_id_delete').addClass('d-none');
        }

        // if (resp.nic_image != null) {
        //     let nic_del_btn_path = resp.nic_image;
        //     $('#btn_id_delete').val(nic_del_btn_path);
        // }

        // if (resp.nic_image == null) {
        //     $('#btn_id_delete').val('');
        // }

        if (resp.image != null) {
            let user = resp.image;
            $('#user_image').attr("src", '/storage/' + user);
            $('#user_image').removeClass('d-none');
            // $('#btn_user_img_delete').removeClass('d-none');
        }
        if (resp.image == null) {
            $('#user_image').attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=");
            $('#user_image').removeClass('d-none');
            // $('#btn_user_img_delete').addClass('d-none');
        }

        // if (resp.image != null) {
        //     let user_del_btn_path = resp.image;
        //     $('#btn_user_img_delete').val(user_del_btn_path);
        // }

        // if (resp.image == null) {
        //     $('#btn_user_img_delete').val('');
        // }

        if (resp.degree_certificate != null) {
            let degree = resp.degree_certificate;
            $('#degree_certificate').attr("src", '/storage/' + degree);
            $('#degree_certificate').removeClass('d-none');
            // $('#btn_degree_cert_delete').removeClass('d-none');
        }
        if (resp.degree_certificate == null) {
            $('#degree_certificate').attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=");
            $('#degree_certificate').removeClass('d-none');
            // $('#btn_degree_cert_delete').addClass('d-none');
        }

        // if (resp.degree_certificate != null) {
        //     let degree_del_btn_path = resp.degree_certificate;
        //     $('#btn_degree_cert_delete').val(degree_del_btn_path);
        // }

        // if (resp.degree_certificate == null) {
        //     $('#btn_degree_cert_delete').val('');
        // }

    });

    if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
        callBack();
    }
}

function save_graduate_details() {
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
        sector_id: $("select[name='sector'] option:selected").val(),
        // is_from_sector: $('input[name="is_from_sector"]:checked').val(),
        degree_type: $("select[name='degree_type'] option:selected").val(),
        degree_class: $("select[name='class'] option:selected").val(),
        gn_division_id: $("select[name='gn_division_id'] option:selected").val(),
        university_id: $("select[name='university_id'] option:selected").val(),
        ds_division_id: $("select[name='ds_division'] option:selected").val(),
        service_category_id: $("select[name='service_category_id'] option:selected").val(),
        electorate_division_id: $("select[name='elec_division'] option:selected").val(),
        educational_qualification: $('#educational_qualification').val(),
        district_id: $("select[name='district'] option:selected").val(),
        civil_status: $('input[name="civil_status"]:checked').val(),
        gender: $('input[name="gender"]:checked').val(),
    };

    object.nic_image = $('#id_image')[0].files[0];
    object.nic_image_two = $('#id_image_two')[0].files[0];
    object.degree_cert = $('#degree_cert')[0].files[0];
    object.user_image = $('#user_img')[0].files[0];

    url = "/api/save_graduate";
    ulploadFileWithData(url, object, function (result) {
        // ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Graduate registration',
                    'Successfully Saved!',
                    'success'
                    );
            location.reload();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Warning!',
                text: result.msg
            })
        }
        $('#degree_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function save_cus_details() {
    url = "./api/save_customer";
    let object = {
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        contactNo: $('#contactNo').val(),
        email: $('#email').val(),
        nic: $('#nic').val(),
        city: $('#location').val(),
        roll: 2,
        password: $('#password_origin').val(),
    };

    ulploadFileWithData(url, object, function (result) {
        // ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Graduate registration',
                    'Successfully Saved!',
                    'success'
                    );
            location.reload();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Warning!',
                text: result.msg,
            })
        }
        $('#degree_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

//function deleteGraduate(id, callBack) {
//    if (confirm('Are sure to delete the Graduate!')) {
//        url = "api/delete_graduate/" + id;
//        ajaxRequest("DELETE", url, false, function (result) {
//            console.log(result);
//            if (result.status == 1) {
//                $('#tbl_registered_graduates').ajax.reload();
//                Swal.fire(
//                        'Graduate registration',
//                        'Successfully Deleted!',
//                        'success'
//                        );
//                location.reload();
//            } else {
//                Swal.fire({
//                    icon: 'error',
//                    title: 'Oops...',
//                    text: 'Something went wrong!',
//                })
//            }
//
//            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
//                callBack(result);
//            }
//        });
//    }
//}

function delete_image(path, type) {

    if (path != '') {
        url = "/api/delete_file/";
        data = {
            "path": path,
            "type": type
        };
        ajaxRequest("POST", url, data, function (result) {
            console.log(result);
            if (result.status == 1) {
                location.reload();
                Swal.fire(
                        'Graduate registration',
                        'Successfully Image is Deleted!',
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
    } else {
        Swal.fire(
                'Image Deletion',
                'Path is not found!',
                'warning'
                );
    }
}

$(document).on("click", ".btn-info", function () {
    var ins_name = $(this).parents('tr:first').find('td:first').text();
    var inst_address = $(this).closest("tr").find('td:eq(1)').text();
    var ins_tel = $(this).closest("tr").find('td:eq(2)').text();
    var data = {
        "inst_name": ins_name,
        "inst_address": inst_address,
        "inst_tel": ins_tel,
        "_token": $('meta[name=csrf-token]').attr("content")
    };
    data['base_reg'] = $(this).val();
    submitByMultipleData('/inspection', data)

});

//function validate_image_size(file_type, img_file) {
//    if (img_file != undefined) {
//        var file = img_file;
//        if (Math.round(file.size / (1024 * 1024)) > 2) { // make it in MB so divide by 1024*1024
//            alert('Please select '+file_type+' size less than 2 MB');
//            return false;
//        }
//    }
//}


// function getJtableBtnHtml(full) {
//     var html = '';
//     html += '<div class="btn-group" role="group"  aria-label="" >';
//     if (full["inspection_status"] != 1) {
//         html += '<a href="/institute_resgistration_edit/' + full["id"] + '" class="btn btn-primary" role="button" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>';
//         html += '<button type="button" class="btn btn-danger btn-del" value="' + full["id"] + '" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>';
//         html += '&nbsp; &nbsp; &nbsp; &nbsp;';
//     }

//     html += '<a href="/institute_instructors/' + full["id"] + '" class="btn btn-warning" role="button data-toggle="tooltip" title="Instructors""><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>';
//     html += '&nbsp; &nbsp;';
//     html += '<a href="/course_fee_handling/' + full["id"] + '" class="btn btn-secondary" role="button" data-toggle="tooltip" title="Course fees"><i class="fa fa-building" aria-hidden="true"></i></a>';
//     html += '&nbsp; &nbsp;';

//     if (full["inspection_status"] == 0) {
//         html += '<button value="' + full["baseid"] + '" class="btn btn-info" role="button" data-toggle="tooltip" title="Inspection form"><i class="fa fa-check-square" aria-hidden="true"></i></a>';
//     }

//     html += '</div>';
//     return html;
// }

