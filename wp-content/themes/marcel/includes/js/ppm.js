jQuery(document).ready(function(){
	    var touch = Modernizr.touch;
	jQuery('.home-image,.single-image').imageScroll({
        imageAttribute: (touch === true) ? 'image-mobile' : 'image',
        touch: touch,
        coverRatio:0.7,
        parallax:true
    });

    jQuery(".video-container").fitVids();

    jQuery('#erfolgeTabs a:first,#clubTabs a:first,#cupTabs a:first').tab('show');

    jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      e.target // activated tab
      console.log(jQuery(e.target.hash).find('.flexslider-caro'));
      jQuery(e.target.hash).find('.flexslider-caro').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 140,
            itemMargin: 50
          });

      
    })


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

    jQuery(window).load(function(){
        jQuery('.flexslider-grid').flexslider({animation: "fade",smoothHeight:true});
        

    });
  
});