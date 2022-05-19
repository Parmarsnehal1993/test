$(document).ready(function () {
    // $(function () {
    //     var dt = $('#user_list').DataTable({
    //         order: [ [6, 'desc'] ],
    //         processing: true,
    //         serverSide: true,
    //         ordering:   false,
            
    //     });
    // });
    $(".dataTables_filter .form-control").addClass('search-form').css({"margin": '10px 0px', "font-size": '14px'}).attr("placeholder", "Search");
    $(".dataTables_filter").css({
        "float": "left", 
        "display": "block", 
        "width": "100%"}
    );
    $(".dataTables_length select").addClass("btn btn-tertiary-outlined text-uppercase");
    $(".dataTables_filter label").css("width", "100%");
    $(".dataTables_filter label input").addClass("form-control").removeClass("search-form").attr('placeholder','search').css({
        "display": "block",
        "margin": "10px 0px",
        "font-size": "14px",
        "width":"100%"
    });
    $(".case-btn + form button").addClass("btn btn-default-outlined case-btn text-uppercase");
    $("#user_list a").remove();
    $(".dataTables_info").parent(".col-sm-5").remove();
    // $(".paginate_button.previous a").text("&laquo;");
    // $(".paginate_button.next a").text("&raquo;");
    $(".dt-bootstrap .col-sm-6").addClass("col-xs-6 col-md-6 col-lg-6");
    // show hide menu  mobile
    
});
