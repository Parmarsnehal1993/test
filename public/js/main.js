// no-conflict-safe document ready function
jQuery(function ($) {
    $('#sidebar_open').click(function () {
        $('#side_menu').toggleClass('open-menu');
        $("body").toggleClass("sidebar_open");
    });
    $('#sidebar_close').click(function () {
        $('#side_menu').toggleClass('open-menu');
        $("body").toggleClass("sidebar_open");
    });
    $("#sidenav-overlay").click(function () {
        $('#side_menu').removeClass('open-menu');
        $("body").removeClass("sidebar_open");
    })
});
