;(function ( $, window, document, undefined ) {

    var pluginId = 'widgetize',
        defaults = {
        	columns : '.moduleColumn',
	        widgetSelector: '.module',
	        handleSelector: '.moduleGrabber',
	        contentSelector: '.moduleContent',
	        widgetDefault : {
	            movable: true,
	            removable: true,
	            collapsible: true,
	            editable: true
	        },
	        widgetIndividual : {}
        };

    function Plugin( element, options ) {
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;

        this._defaults = defaults;
        this._name     = pluginId;
        this.init();
    }

    Plugin.prototype.init = function () {		
		this.draw();  
    };


	Plugin.prototype.draw = function(){
		//get params
		//this.getParams(){}
		//this.addControls(){}
		
	   var widgetBox = this.element,
            settings = this.options,

       $sortableItems = (function () {
          var notSortable = '';
            $(settings.widgetSelector,$(settings.columns)).each(function (i) {
                // if (!widgetBox.getWidgetSettings(this.id).movable) {
                // 			                        if(!this.id) {
                // 			                            this.id = 'widget-no-id-' + i;
                // 			                        }
                // 			                        notSortable += '#' + this.id + ',';
                // 			                    }
            });
            return $('> '+settings.widgetSelector, settings.columns);
        })();

        $sortableItems.find(settings.handleSelector).css({
            cursor: 'move'
        }).mousedown(function (e) {
            $sortableItems.css({width:''});
            $(this).parent().css({
                width: $(this).parent().width() + 'px'
            });
        }).mouseup(function () {
            if(!$(this).parent().hasClass('dragging')) {
                $(this).parent().css({width:''});
            } else {
                $(settings.columns).sortable('disable');
            }
        });

        $(settings.columns).sortable({
            items: $sortableItems,
            connectWith: $(settings.columns),
            handle: settings.handleSelector,
            placeholder: 'modulePlaceholder',
            forcePlaceholderSize: true,
            revert: 300,
            delay: 100,
            opacity: 0.8,
            containment: 'document',
            start: function (e,ui) {
                $(ui.helper).addClass('dragging');
            },
            stop: function (e,ui) {
                $(ui.item).css({width:''}).removeClass('dragging');
                $(settings.columns).sortable('enable');
            }
        });
			
	};
	
	Plugin.prototype.getParams = function(){};
	
	Plugin.prototype.addControls = function(){};

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginId] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginId)) {
                $.data(this, 'plugin_' + pluginId,
                new Plugin( this, options ));
            }
        });
    }

})( jQuery, window, document );


