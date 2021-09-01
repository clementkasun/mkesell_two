function load_attributesTbl(id, callBack) {
    $('#survey_names_tbl tbody').html('');
    var cbo = '';
    ajaxRequest('GET', "/api/survey/attribute_structure/id/" + id, null, function (parameters) {
        $.each(parameters, function (index, row) {
            cbo += '<tr style="background-color: #a5a5a5; text-align: center;"><td colspan="2"><b>' + row.title_no + ' ' + row.name + '</b></td></tr>';
            $.each(row.titles, function (index2, row2) {
                cbo += '<tr style="background-color: #c7c7c7;"><td colspan="2">' + row.title_no + '.' + row2.title_no + '  ' + row2.name + '</td></tr>';
                $.each(row2.attributes, function (index3, row3) {
                    cbo += '<tr><td>' + row.title_no + '.' + row2.title_no + '.' + row3.title_no + '</td><td>' + row3.name + '</td></tr>';
                });
            });
        });
        $('#survey_names_tbl tbody').html(cbo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}