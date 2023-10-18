<?php
//add SVG to allowed file uploads
function pj_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'pj_types_to_uploads');

function pj_admin_classes( $classes ) {
  $template = get_post_meta(get_the_ID(), '_wp_page_template', true);

	if ( in_array( $template, array( 'page-acf-builder.php' ), true ) ) {
		$classes .= ' pj-acf-page-builder';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'pj_admin_classes' );

function pj_acf_options_init() {
  // Check function exists.
  if( function_exists('acf_add_options_page') ) {
    // Register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('CGH Settings'),
        'menu_title'    => __('CGH Settings'),
        'menu_slug'     => 'cgh-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
  }
}
add_action('acf/init', 'pj_acf_options_init');

function pj_add_booking_form_popup() {
  $bk_form_if = get_field('booking_form_iframe', 'options');
  $ct_form_sc = get_field('contact_form_shortcode', 'options');

  ?>
    <div id="pj_contact_form_popup" class="pj-contact-form-popup pj-popup-wrapper">
      <a class="pj-btn-close" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" class="icon icon-close" fill="none" viewBox="0 0 18 17">
          <path d="M.865 15.978a.5.5 0 00.707.707l7.433-7.431 7.579 7.282a.501.501 0 00.846-.37.5.5 0 00-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 10-.707-.708L8.991 7.853 1.413.573a.5.5 0 10-.693.72l7.563 7.268-7.418 7.417z" fill="currentColor">
        </path></svg>
      </a>
      <div class="pj-popup-content">
        <?php
          if(!empty($ct_form_sc)) {
            echo do_shortcode($ct_form_sc);
          }else {
            echo "Enter contact form shortcode on CGH Settings.";
          }
        ?>
      </div>

    </div>

    <div id="pj_booking_form_popup" class="pj-booking-form-popup pj-popup-wrapper">
      <a class="pj-btn-close" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" class="icon icon-close" fill="none" viewBox="0 0 18 17">
          <path d="M.865 15.978a.5.5 0 00.707.707l7.433-7.431 7.579 7.282a.501.501 0 00.846-.37.5.5 0 00-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 10-.707-.708L8.991 7.853 1.413.573a.5.5 0 10-.693.72l7.563 7.268-7.418 7.417z" fill="currentColor">
        </path></svg>
      </a>
      <div class="pj-popup-content">
        <?php
          if(!empty($bk_form_if)) {
            echo $bk_form_if;
          }else {
            echo "Enter booking form iframe on CGH Settings.";
          }
        ?>
      </div>
    </div>
  <?php
}
add_action( 'wp_footer', 'pj_add_booking_form_popup' );
