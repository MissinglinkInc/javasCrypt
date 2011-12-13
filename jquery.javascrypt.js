(function($){
	$.fn.javascrypt=function(){
		var a=JSON.parse($(this).text());
		var s=Math.floor(parseInt(new Date/100000))+a[0];
		var r='';
		for (i in a) {
			if (i==0) continue;
			r += String.fromCharCode(a[i]^s);
		}
		var t=decodeURI(r);
		$(this).text(t);
		return t;
	};
})(jQuery);
