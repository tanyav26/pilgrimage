(function($) {
    $.fn.dref = function(options) {

        options = $.extend({}, $.fn.dref.defaults, options);
        
        return this.each(function() {
            
            //var opts = $.fn.tipsy.elementOptions(this, options),
            
            var opts = $(this).attr('href');
            
            console.log(opts);
            //console.log(opts);
            $(this).toggle(function(){
                if( $(opts).hasClass('lesser') ){
                    $(opts).removeClass('lesser');
                }
            },function(){
                $(opts).addClass('lesser');
            });
            
        });
    };
    
    $.fn.dref.defaults = {};
    
})(jQuery);