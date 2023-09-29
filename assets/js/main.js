!(function($){
	"use strict";

	/* Toggle menu mobile */
	function PjToggleMenuMobile() {
		$('.pj-menu-mb-toggle--open').on('click', function() {
			$('.pj-site-header').addClass('pj-is-active-mb-menu');
		});

    $('.pj-menu-mb-toggle--close').on('click', function() {
			$('.pj-site-header').removeClass('pj-is-active-mb-menu');
		});
	}

	/* Header Stick */
	function PjHeaderStick() {
		if($( '.pj-site-header' ).hasClass('pj-site-header--sticky')) {
      if ($(window).scrollTop() > 80){
        $( '.pj-site-header' ).addClass('pj-is-sticky');
      } else {
        $( '.pj-site-header' ).removeClass('pj-is-sticky');
      }

			$(window).scroll(function() {
        if ($(window).scrollTop() > 80){
          $( '.pj-site-header' ).addClass('pj-is-sticky');
        } else {
          $( '.pj-site-header' ).removeClass('pj-is-sticky');
        }
			});
		}
	}

	/* Easy Scroll */
	function PjEasingScroll() {
		var $root = $('html, body');
		$('.bt-easing-scroll ul.menu > li > a').on('click', function(e) {
			e.preventDefault();
			var href = $.attr(this, 'href');
			$root.animate({
				scrollTop: $(href).offset().top
			}, 700, function() {
				window.location.hash = href;
			});
			return false;
		});
	}

	jQuery(document).ready(function($) {
		PjHeaderStick();
    PjToggleMenuMobile();

	});

	jQuery(window).on('resize', function() {

	});

	jQuery(window).on('scroll', function() {
		PjHeaderStick();

	});

})(jQuery);
