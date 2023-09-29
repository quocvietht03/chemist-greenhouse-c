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
