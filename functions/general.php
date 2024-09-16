<?php 

/*Remove guttenberg editor*/
add_filter('use_block_editor_for_post', '__return_false');

/* Add support do Woo */
add_theme_support( 'woocommerce' );
add_theme_support( 'post-thumbnails' );

/* Produtos por página */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  $cols = 15;
  return $cols;
}


/* Remove Woocommerce Default CSS */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/* Remove admin bar on logged */
add_filter('show_admin_bar', '__return_false');

/* Upload de CSV */

function csv_open($mimes = array()) {
  $mimes['csv'] = "text/csv";
  return $mimes;
}
add_filter('upload_mimes', 'csv_open');

/* Temporary ACF active 
class AutoActivator {		
  const ACTIVATION_KEY = 'youractivationkeyhere';
  public function __construct() {
    if (
      function_exists( 'acf' ) &&
        is_admin() &&
      !acf_pro_get_license_key()
    ) {
      acf_pro_update_license(self::ACTIVATION_KEY);
    }
  }  
}     
new AutoActivator();*/

function dd() {
  foreach(func_get_args() as $data) {
    echo '<pre>'. print_r($data, true) .'</pre>';
  }
}
