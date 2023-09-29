<?php
 /**
  * Load scripts
  *
  */
function pj_enqueue_scripts() {

  // css
  wp_enqueue_style( 'magnific-popup', PJ_URI . '/assets/lib/magnific-popup.css', false, PJ_VERSION );
  wp_enqueue_style( 'select2', PJ_URI . '/assets/lib/select2.min.css', false, PJ_VERSION );
  wp_enqueue_style( 'main-css', PJ_URI . '/assets/css/main.css', false, PJ_VERSION );

  // js
  wp_enqueue_script( 'magnific-popup', PJ_URI . '/assets/lib/jquery.magnific-popup.min.js', ['jquery'], PJ_VERSION, false );
  wp_enqueue_script( 'select2', PJ_URI . '/assets/lib/select2.min.js', ['jquery'], PJ_VERSION, false );
  wp_enqueue_script( 'block-js', PJ_URI . '/assets/js/block.js', ['jquery'], PJ_VERSION, true );
  wp_enqueue_script( 'main-js', PJ_URI . '/assets/js/main.js', ['jquery'], PJ_VERSION, true );

  wp_localize_script( 'main-js', 'PJ_Global', apply_filters( 'pj/wp_localize_script/PJ_Global', [
     'ajax_url' => admin_url( 'admin-ajax.php' ),
     'user_info' => wp_get_current_user(),
  ] ) );

}
add_action( 'wp_enqueue_scripts', 'pj_enqueue_scripts', 100 );

function pj_admin_enqueue_scripts() {
  wp_enqueue_style( 'admin-style-css', PJ_URI . '/assets/css/admin-style.css', false, PJ_VERSION );
  wp_enqueue_script( 'block-js', PJ_URI . '/assets/js/block.js', ['jquery'], PJ_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'pj_admin_enqueue_scripts', 100 );

{
  /**
   * Compiler Scss
   *
   */
  add_action( 'init', function() {
      if( true != PJ_DEV_MODE ) return;
      pj_scss_compiler(
          file_get_contents( PJ_DIR . '/assets/scss/main.scss' ),
          PJ_DIR . '/assets/css/main.css',
          PJ_DIR . '/assets/scss',
          'ScssPhp\ScssPhp\Formatter\Compressed',
          false
      );

      pj_scss_compiler(
          file_get_contents( PJ_DIR . '/assets/scss/admin-style.scss' ),
          PJ_DIR . '/assets/css/admin-style.css',
          PJ_DIR . '/assets/scss',
          'ScssPhp\ScssPhp\Formatter\Compressed',
          false
      );
  } );
}
