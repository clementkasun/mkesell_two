function send_otp(data, callBack) {
    url = "/api/make_send_otp";
//    url = "/api/make_send_otp";
    ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Institute registration',
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

function getGraducateProfileData(id, callBack) {
    let url = '/api/get_graduate/' + id;
    ajaxRequest("GET", url, null, function (resp) {
        if (resp.length == 0) {
            return 'No Data';
        } else {
            $.each(resp, function (index, row) {
                $('.profile-username').html(row.first_name + ' ' + row.last_name);
                $('.postiData').val(row.degree);
                $('#first_name').val(row.first_name);
                $('#last_name').val(row.last_name);
                $('#nvq_level').val(row.nvq_level);
                $('#address').val(row.address);
                $('#Telephone').val(row.tel);
                $('#degree_year').val(row.year);
                $('#email').val(row.email);
                $('#nic').val(row.nic);
                $('#dob').val(row.dob);
                $('#degree').val(row.degree);
                $("select[name='sector'] option:selected").val();
                $("select[name='degree_type'] option:selected").val(row.degree_type);
                $("select[name='class'] option:selected").val();
                $("select[name='service_category_id'] option:selected").val();
                $("select[name='elec_division'] option:selected").val();
                $("select[name='gn_division_id'] option:selected").val();
                $("select[name='university_id'] option:selected").val();
                $("select[name='ds_division'] option:selected").val();
                $('#educational_qualification').val();
                $("select[name='district'] option:selected").val();
                $('input[name="civil_status"]:checked').val();
                $('input[name="gender"]:checked').val();
            });
        }
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}
function graduate_profileUpdate(id, callBack) {
    let object = {
        first_name: $('#first_name').val(),
        last_name: $('#last_name').val(),
        nvq_level: $('#nvq_level').val(),
        address: $('#address').val(),
        tel: $('#Telephone').val(),
        year: $('#degree_year').val(),
        email: $('#email').val(),
        nic: $('#nic').val(),
        person_type: 'Graduate',
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
    };

    object.nic_image = $('#id_image')[0].files[0];
    object.degree_cert = $('#degree_cert')[0].files[0];
    object.user_image = $('#user_image')[0].files[0];
    console.log(object);
    url = "/api/update_graduate/" + id;
    ulploadFileWithData(url, object, function (result) {
        // ajaxRequest("POST", url, data, function (result) {
        if (result.status == 1) {
            Swal.fire(
                    'Institute registration',
                    'Successfully Updated!',
                    'success'
                    );
            $('.verThanks').removeClass('d-none');
            $('.verMobile').addClass('d-none');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
            $('.verMobile').addClass('d-none');
            $('.verRegister').removeClass('d-none');
        }
        $('#degree_registration').trigger("reset");
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    },"POST");
}

//CountDown For Verification
function setupTimer(timeX) {
    var timer2 = timeX;
    var interval = setInterval(function () {
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        $('.countdown').html(minutes + ':' + seconds);
        if (minutes < 0)
            clearInterval(interval);
        //check if both minutes and seconds are 0
        if ((seconds <= 0) && (minutes <= 0))
            clearInterval(interval);
        if (seconds <= 0) { //Run Any Code Line When TimesUp
            $('#otpResend').removeClass('d-none');
        }
        timer2 = minutes + ':' + seconds;
    }, 1000);
}


        