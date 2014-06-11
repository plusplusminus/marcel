jQuery(document).ready(function(){
	    var touch = Modernizr.touch;
	jQuery('.home-image,.single-image').imageScroll({
        imageAttribute: (touch === true) ? 'image-mobile' : 'image',
        touch: touch,
        coverRatio:0.7,
        parallax:true
    });

	jQuery('body').scrollspy({ target: '.navbar-collapse' })

    jQuery('.menu-item-type-custom a,.scrollit').bind('click',function(event){
        var jQueryanchor = jQuery(this);
       /* $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500,'easeInOutExpo');*/
        
        
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top-125
        }, 1500);
        
        event.preventDefault();
    });

    jQuery(window).scroll(function() {    
	    var scroll = jQuery(window).scrollTop();
	     //>=, not <=
	    if (scroll >= 300) {
	        //clearHeader, not clearheader - caps H
	        jQuery("body").addClass("stuck");
	    }
	    if (scroll <= 0) {
	        //clearHeader, not clearheader - caps H
	        jQuery("body").removeClass("stuck");
	    }
	});


});