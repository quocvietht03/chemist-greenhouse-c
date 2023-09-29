!(function($){
	"use strict";

	/* Toggle menu mobile */
	function PjToggleMenuMobile() {
		$('.bt-header .bt-header-mobile .bt-menu-toggle').on('click', function() {
			$(this).toggleClass('active');
			$('.bt-header .bt-menu-mobile').toggle('slow');
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

	});

	jQuery(window).on('resize', function() {

	});

	jQuery(window).on('scroll', function() {
		PjHeaderStick();

	});

})(jQuery);
