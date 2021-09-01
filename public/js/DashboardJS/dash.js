function load_dash() {
    let option = '';
    ajaxRequest("GET", "/api/all_count_load", null, function (resp) {
        $('#approved_graduate').text(resp.approved_graduate);
        $('#university').text(resp.university);
        $('#pending_graduate').text(resp.pending_graduate);
        $('#graduate').text(resp.approved_graduate + resp.pending_graduate);
        $('#vc_count').text(resp.vacancy_count);
        $('#sec_count').text(resp.sector);
        $('#service_cat_count').text(resp.serve_cat);
        $('#ds_count').text(resp.ds_count);
    });
}