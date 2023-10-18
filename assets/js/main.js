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
		$('.__btn-find-store, .pj-primary-menu ul.pj-menu-wrapper > li:not(.pj-open-popup-link) > a').on('click', function(e) {
			e.preventDefault();
			var href = $.attr(this, 'href');
			$root.animate({
				scrollTop: $(href).offset().top
			});
			return false;
		});
	}

	/* Quick Popup */
	function PjQuickPopup() {
		$('.pj-open-popup-link, .pj-open-popup-link > a').on('click', function(e) {
			e.preventDefault();

			var href = $.attr(this, 'href');
			if($(href).length > 0) {
				$('body').addClass('pj-hidden-scroll');
				$(href).addClass('pj-is-show');
			}
		});

		$('.pj-popup-wrapper .pj-btn-close').on('click', function(e) {
			e.preventDefault();

			$('body').removeClass('pj-hidden-scroll');
			$(this).parent().removeClass('pj-is-show');
		});
	}

	jQuery(document).ready(function($) {
		PjHeaderStick();
    PjToggleMenuMobile();
    PjEasingScroll();
		PjQuickPopup();

	});

	jQuery(window).on('resize', function() {

	});

	jQuery(window).on('scroll', function() {
		PjHeaderStick();

	});

})(jQuery);
