!(function($){
	"use strict";

	/* Block Accordion js */
	function PjBlockAccordion() {
    if($('.pj-accordion-list-js').length > 0) {
      $('.pj-accordion-toggle-js').on('click', function() {
        if($(this).parent().hasClass('pj-is-active')) {
          $(this).parent().removeClass('pj-is-active');
        } else {
          $(this).parents('.pj-accordion-list-js').find('.pj-accordion-item-js').removeClass('pj-is-active');
    			$(this).parent().addClass('pj-is-active');
        }
  		});
    }
	}

	jQuery(document).ready(function($) {
    PjBlockAccordion();

	});

	jQuery(window).on('resize', function() {

	});

	jQuery(window).on('scroll', function() {

	});

})(jQuery);
