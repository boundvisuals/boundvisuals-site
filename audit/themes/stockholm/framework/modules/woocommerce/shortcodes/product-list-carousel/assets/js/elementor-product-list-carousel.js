(function($) {
    'use strict';

    var elementorProductListCarousel = {};
    qode.modules.elementorProductListCarousel = elementorProductListCarousel;

    elementorProductListCarousel.qodeInitElementorProductListCarousel = qodeInitElementorProductListCarousel;


    elementorProductListCarousel.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad() );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorProductListCarousel();
    }

    function qodeInitElementorProductListCarousel(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qode_product_list_carousel.default', function() {
	            qodeOwlSlider();
            } );
        });
    }

})(jQuery);