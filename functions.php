<?php
/**
 * Defined
 */
define( 'PJ_DIR', get_stylesheet_directory() );
define( 'PJ_URI', get_stylesheet_directory_uri() );
define( 'PJ_VERSION', '1.0.0' );
define( 'PJ_DEV_MODE', true );

/**
 * Includes
 */
require( PJ_DIR . '/vendor/autoload.php' );
require( PJ_DIR . '/hooks.php' );
require( PJ_DIR . '/helper.php' );
require( PJ_DIR . '/static.php' );
require( PJ_DIR . '/block-load.php' );


function pj_register_nav_menu(){
  register_nav_menus( array(
      'privacy' => __( 'Tertiary Menu', 'text_domain' ),
  ) );
}
add_action( 'after_setup_theme', 'pj_register_nav_menu', 999 );
