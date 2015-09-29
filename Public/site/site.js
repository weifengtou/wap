//jquery 监听元素大小改变
(function($,h,c){var a=$([]),e=$.resize=$.extend($.resize,{}),i,k="setTimeout",j="resize",d=j+"-special-event",b="delay",f="throttleWindow";e[b]=250;e[f]=true;$.event.special[j]={setup:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.add(l);$.data(this,d,{w:l.width(),h:l.height()});if(a.length===1){g()}},teardown:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.not(l);l.removeData(d);if(!a.length){clearTimeout(i)}},add:function(l){if(!e[f]&&this[k]){return false}var n;function m(s,o,p){var q=$(this),r=$.data(this,d);r.w=o!==c?o:q.width();r.h=p!==c?p:q.height();n.apply(this,arguments)}if($.isFunction(l)){n=l;return m}else{n=l.handler;l.handler=m}}};function g(){i=h[k](function(){a.each(function(){var n=$(this),m=n.width(),l=n.height(),o=$.data(this,d);if(m!==o.w||l!==o.h){n.trigger(j,[o.w=m,o.h=l])}});g()},e[b])}})(jQuery,this);

//靠底部对齐
jQuery(document).ready(function($) {
	on_bottom();
	$(".on_bottom").resize(function () {
		on_bottom();
	});
	$(".on_bottom").parent().resize(function () {
		on_bottom();
	});
});
function on_bottom () {
	$(".on_bottom").each(function (e) {
		$(this).css({
			"margin-top":0
		});
		//自身高度
		var h1 = $(this).height();
		//父元素高度
		var h2 = $(this).parent().height();
		var _h = h2 - h1;
		$(this).css({
			"margin-top":_h
		});
	})
}

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