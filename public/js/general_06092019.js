$(document).ready(function() {
	$("body").on("click", "a[href='#']", function(e) {
		e.preventDefault();
	});
    //nav toggle
    $("body").on("click", ".nav-toggle,.nav-backdrop>a", function() {
    	$("body,html").toggleClass('nav-open');
    });
});