(function($){
	$.fn.Tabbings=function(options){
		var defaults={
			'heads'		:	'> ul:eq(0) li',
			'datas'		:	'> ul:eq(1) > li',
			'open'		:	0
		}
		
		var options=$.extend({},defaults, options)
		var heads=$(options.heads,$(this));
		var datas=$(options.datas,$(this));
		var open=options.open;
		
		heads.eq(open).addClass('show')
		datas.eq(open).show()
		
		return this.each(function(){
			heads.each(function(i){
				$(this).click(function(e){
					e.preventDefault();
					heads.removeClass('show');
					heads.eq(i).addClass('show');
					
					datas.hide();
					datas.eq(i).show();
				})
			})
		})
	}
})(jQuery)