// +------------------------------------------------------------------------+
// | Artlantis CMS Solutions                                                |
// +------------------------------------------------------------------------+
// | Caledonian PHP Calendar & Event System                                 |
// | Copyright (c) Artlantis Design Studio 2013. All rights reserved.       |
// | Version       2.1                                                      |
// | Last modified 31.10.13                                                 |
// | Email         developer@artlantis.net                                  |
// | Web           http://www.artlantis.net                                 |
// +------------------------------------------------------------------------+
var $j = jQuery.noConflict();
$j(document).ready(function(){
	$j(".calendar-day").mouseover(function () {
		$j(this).find(".calendar-add").addClass( "glyphicon glyphicon-plus-sign" );
	});
	$j(".calendar-day").mouseleave(function () {
		$j(this).find(".calendar-add").removeClass("glyphicon glyphicon-plus-sign" );
	});
		
});

$j(window).load(function(){
	
	// Run Tooltip
	$j('[data-toggle="tooltip"]').tooltip();
		
});


// Button Href
$j(document).ready(function(){
    $j("button[data-href]").click( function() {
        location.href = $(this).attr("data-href");
    });
});

// Fancybox

$j(document).ready(function() {
	
    $j(".fancybox").fancybox({
		autoSize : false,
        beforeLoad : function() {
			this.content   = $('#'+this.element.data('fancybox-cnt'));         
            this.width  = parseInt(this.element.data('fancybox-width'));  
            this.height = parseInt(this.element.data('fancybox-height'));
        }
    });
	
    $j(".fancybox2").fancybox({
		autoSize : false,
        beforeLoad : function() {
            this.width  = parseInt(this.element.data('fancybox-width'));  
            this.height = parseInt(this.element.data('fancybox-height'));
        }
    });	
	
});

// Mini Calendar Popup

$j(document).ready(function() {
	
        $j('.calendar-mini-pop').bind('click', function() {
			
			var data_href = $(this).attr('data-fancy-href');

			$j(this).fancybox({
				autoSize : false,
				beforeLoad : function() {
					this.type     = 'iframe';
					this.href     = data_href;
					this.width  = 600;  
					this.height = 500;
				}
			});	

        });
	
});

// Toggle Language Box
	$j(document).ready(function(e) {
        $j('.lang-toggle').click(function(e) {
            $j('#lang-box').toggle('fast');
        });
    });
