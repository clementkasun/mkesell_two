function load_allSurveysTbl(callBack) {
    $('#survey_names_tbl tbody').html('');
    var cbo = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/name",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<tr>';
                cbo += '<td>' + ++index + '</td><td>' + row.name + '</td>';
                if (parseInt(row.type) === 1) {
                    cbo += '<td>Yearly Repeat</td>';
                } else {
                    cbo += '<td>One Time</td>';
                }
                cbo += '<td><a type="button" class="btn btn-dark btn-xs" href="/api/survey/view_structure/id/' + row.id + '" >View Structure</a> <a type="button" class="btn btn-dark btn-xs" href="/attributes_tbl/id/' + row.id + '" >Attribute List</a> <a type="button" class="btn btn-dark btn-xs" href="/api/result/export/' + row.id + '" >View Result</a></td>';
                cbo += '</tr>';
            });
            $('#survey_names_tbl tbody').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}