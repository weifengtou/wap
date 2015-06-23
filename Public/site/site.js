//wrap height
function warp_height () {
	var window_height = $(window).height()
	var footer_height = $('footer').outerHeight()
	$("#wrap_con").css('min-height', window_height-footer_height-110);
}

// ready and window resize funs
function wrap_ready_resize () {
	warp_height()
}

//ready
jQuery(document).ready(function($) {
	wrap_ready_resize ()
});

$(window).resize(function(event) {
	wrap_ready_resize ()
});

var img_proLogo_resize_hasfun = '0'