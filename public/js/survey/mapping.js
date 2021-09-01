function survey_nameComb(callBack) {
    var cbo = '';
    ajaxRequest("GET", "/api/survey/name", null, function (result) {
        $.each(result, function (index, row) {
            cbo += '<option value="' + row.id + '" data-ses_status="' + row.session_status + '">' + row.name + '</option>';
        });
        $('.surveyNameCmb').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}