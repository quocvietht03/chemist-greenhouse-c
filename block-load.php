<?php
function pj_register_layout_category( $categories ) {

	$categories[] = array(
		'slug'  => 'pj-custom-block',
		'title' => 'Custom Block'
	);

	return $categories;
}
add_filter( 'block_categories_all', 'pj_register_layout_category' );

function pj_acf_init() {

    // check function exists
    if( function_exists('acf_register_block') ) {
        acf_register_block(array(
            'name'              => 'hero-section',
            'title'             => __('Hero Section'),
            'description'       => __('Hero Section block.'),
            'render_callback'   => 'pj_acf_block_render_callback',
            // 'enqueue_assets' => 'pj_acf_block_assets_callback',
            'category'          => 'pj-custom-block',
            'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path d="M19 13H5v-2h14v2z" /></svg>',
            'keywords'          => array( 'Hero Section', 'Hero' ),
        ));

				acf_register_block(array(
            'name'              => 'introduce-section',
            'title'             => __('Introduce Section'),
            'description'       => __('Introduce Section block.'),
            'render_callback'   => 'pj_acf_block_render_callback',
            // 'enqueue_assets' => 'pj_acf_block_assets_callback',
            'category'          => 'pj-custom-block',
            'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path d="M19 13H5v-2h14v2z" /></svg>',
            'keywords'          => array( 'Introduce Section', 'Introduce' ),
        ));

				acf_register_block(array(
            'name'              => 'our-service-section',
            'title'             => __('Our Service Section'),
            'description'       => __('Our Service Section block.'),
            'render_callback'   => 'pj_acf_block_render_callback',
            // 'enqueue_assets' => 'pj_acf_block_assets_callback',
            'category'          => 'pj-custom-block',
            'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path d="M19 13H5v-2h14v2z" /></svg>',
            'keywords'          => array( 'Our Service Section', 'Our Service' ),
        ));
    }
}
add_action('acf/init', 'pj_acf_init');

function pj_acf_block_render_callback( $block ) {
  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "block-parts/block" folder
  if( file_exists( PJ_DIR . "/block-parts/{$slug}.php" ) ) {
      include PJ_DIR . "/block-parts/{$slug}.php" ;
  }
}

function pj_acf_block_assets_callback($block) {

  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "block-parts/block" folder
  if( file_exists( PJ_DIR . "/block-parts/{$slug}.css" ) ) {
      wp_enqueue_style( "block-{$slug}", PJ_URI . "/block-parts/{$slug}.css" );
  }
  if( file_exists( PJ_DIR . "/block-parts/{$slug}.js" ) ) {
      wp_enqueue_script( "block-{$slug}", PJ_URI . "/block-parts/{$slug}.js", array('jquery'), '', true );
  }
}
