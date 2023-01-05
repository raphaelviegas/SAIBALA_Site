<?php

require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

/* General functions */
include "functions/general.php";
include "functions/product_sidebar.php";
// include "functions/acf_fields.php";


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Página inicial',
        'menu_title' => 'Página inicial',
        'menu_slug' => 'homepage'
    ));
    
}
function enable_comments_custom_post_type() {
 add_post_type_support( 'projetos', 'comments' );
}
add_action( 'init', 'enable_comments_custom_post_type', 11 );

function custom_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_css() {
    wp_enqueue_style('learndash-css',  get_stylesheet_directory_uri() . '/assets/dist/css/style.css');
}
add_action('wp_enqueue_scripts', 'custom_css');
/* Cria menus */
function registerMenus() {
  register_nav_menu('page-menu',__( 'Page Menu' ));
  register_nav_menu('sobre-menu',__( 'Sobre Menu' ));
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('user-menu',__( 'User Menu' ));
}

add_action( 'init', 'registerMenus' );


function getTplPageURL($TEMPLATE_NAME){
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $TEMPLATE_NAME
    ));
    if(isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}




add_action( 'wp_footer', 'cart_update_qty_script' ); 
function cart_update_qty_script() { 
    if (is_cart()) : 
    ?> 
    <script>
    jQuery( 'div.woocommerce' ).on( 'change', '.qty', function () {
    jQuery( "[name='update_cart']" ).trigger( "click" );
    } );
    </script>
    <?php 
    endif; 
}

remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
//add_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
add_action( 'woocommerce_new_local_pay', 'woocommerce_checkout_payment', 20 );

remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

function my_woocommerce_widget_shopping_cart_button_view_cart() {
    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-neutral">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
}
function my_woocommerce_widget_shopping_cart_proceed_to_checkout() {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-warning">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_button_view_cart', 10 );
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
add_action( 'wp_enqueue_scripts', 'wsis_dequeue_stylesandscripts_select2', 100 );
 
function wsis_dequeue_stylesandscripts_select2() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'selectWoo' );
        wp_deregister_style( 'selectWoo' );
 
        wp_dequeue_script( 'selectWoo');
        wp_deregister_script('selectWoo');
    } 
} 

add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'form-group'; 
            //print_r($field);
            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
            if($field['autocomplete'] != 'address-line1'){
                if($field['type'] == 'textarea'){
                    $field['class'][] = 'col-md-12'; 
                } else {
                    $field['class'][] = 'col-md-6'; 
                }
            } else {
                $field['class'][] = 'col-md-12'; 
            }
        }
    }
    return $fields;
}

function removeParameterFromUrl($url, $key){
    $parsed = parse_url($url);
    $path = $parsed['path'];
    unset($_GET[$key]);
    if(!empty(http_build_query($_GET))){
      return $path .'?'. http_build_query($_GET);
    } else return $path;
}

function custom_my_account_menu_items( $items ) {
    unset($items['downloads']);
    unset($items['edit-address']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );

add_filter( 'woocommerce_dropdown_variation_attribute_options_args', static function( $args ) {
    $args['class'] = 'form-control';
    return $args;
}, 2 );


add_action('init', 'create_post_type');
function create_post_type() {


  register_post_type( 'professores',
    array(
      'labels' => array(
        'name' => __( 'Professores' ),
        'singular_name' => __( 'Professores' )
      ),
      'has_archive' => false,
      'public' => false,
      'show_ui' => true,
      'supports' => array('title', 'editor', 'thumbnail','excerpt')
    )
  );
  register_post_type( 'projetos',
    array(
      'labels' => array(
        'name' => __( 'Projetos' ),
        'singular_name' => __( 'Projetos' )
      ),
      'has_archive' => true,
      'public' => true,
      'show_ui' => true,
      'supports' => array('title', 'editor', 'thumbnail','excerpt')
    )
  );

  register_post_type( 'headers',
  array(
    'labels' => array(
      'name' => __( 'Headers' ),
      'singular_name' => __( 'Headers' )
    ),
    'has_archive' => false,
    'public' => false,
    'show_ui' => true,
    'supports' => array('title')
    )
  );

  flush_rewrite_rules();
}


function shortcodeComment($atts){
  $productId = $atts['product'];
  set_query_var( 'productId', $productId);
  return get_template_part( 'woocommerce/single', 'product-reviews-form' );
}

add_shortcode('reviewProduct', 'shortcodeComment'); 


function shortcodeProjetos($atts){
  $productId = $atts['product'];
  set_query_var( 'productId', $productId);
  ob_start();
  get_template_part( 'woocommerce/single', 'project-form' );
  return ob_get_clean();
}

add_shortcode('addProject', 'shortcodeProjetos'); 


function save_image( $base64_img, $title ) {

  // Upload dir.
  $upload_dir  = wp_upload_dir();
  $upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

  $img             = str_replace( 'data:image/jpeg;base64,', '', $base64_img );
  $img             = str_replace( ' ', '+', $img );
  $decoded         = base64_decode( $img );
  $filename        = $title . '.jpeg';
  $file_type       = 'image/jpeg';
  $hashed_filename = md5( $filename . microtime() ).'.jpg';

  // Save the image in the uploads directory.
  $upload_file = file_put_contents( $upload_path . $hashed_filename, $decoded );

  $attachment = array(
    'post_mime_type' => $file_type,
    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $hashed_filename ) ),
    'post_content'   => '',
    'post_status'    => 'inherit',
    'guid'           => $upload_dir['url'] . '/' . basename( $hashed_filename )
  );

  $attach_id = wp_insert_attachment( $attachment, $upload_dir['path'] . '/' . $hashed_filename );

  return $attach_id;
}


/**
 * @ajax( action: "sendGift" , only_logged: false )
 */
function sendGift() {
   global $woocommerce;
   $woocommerce->cart->empty_cart(); 
   $woocommerce->cart->add_to_cart( $_POST['pid'] );

   $response = array( 'success' => true, 'data' => wc_get_checkout_url()."?presente=true" );
   wp_send_json_success( $response );

}

add_action( 'wp_ajax_sendGift', 'sendGift' );
add_action( 'wp_ajax_nopriv_sendGift', 'sendGift' );


/**
 * @ajax( action: "sendContact" , only_logged: false )
 */
function sendContact() {
  $textmessage = '';
  foreach ($_POST as $key => $value) {
    $textmessage .= '<tr><td style="border:1px solid #f1f1f1; padding:5px; font-family:Arial;">'.$key.' </td><td  style="border:1px solid #f1f1f1; padding:5px; font-family:Arial;"> '.$value."</td></tr>";
    
  }
  $message = '<table id="cam" width="520" border="0" cellpadding="0" cellspacing="0">';
  $message .= $textmessage;
  $message .= '</table>';

  $to = 'contato@saibala.com.br';
  $headers = array( 'Content-Type: text/html; charset=UTF-8' );
  $subject = "E-mail site Saibala";
  wp_mail( $to, $subject, $message,$headers);

  die();
}

add_action( 'wp_ajax_sendContact', 'sendContact' );
add_action( 'wp_ajax_nopriv_sendContact', 'sendContact' );


/**
 * @ajax( action: "addProject" , only_logged: false )
 */
function addProject() {
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $descricao = $_POST['descricao']; 
  $arquivoId = '';
  $imagemId = '';
  $arquivoUrl = '';
  $imagemUrl = '';
  $cursoId = $_POST['curso'];
  $userId = $_POST['user'];
  foreach ($_FILES as $key => $file) {
    if($key == "imagem") {
      $attachment_id = media_handle_upload($key, 0);
      $imagemId = $attachment_id;
      $imagemUrl = wp_get_attachment_url($attachment_id);
    }
    if($key == "arquivo") {
      $attachment_id = media_handle_upload($key, 0);
      $arquivoId = $attachment_id;
      $arquivoUrl = wp_get_attachment_url($attachment_id);
    }
  }
  
  $my_post = array(
    'post_title' =>  $_POST['title'],
    'post_content' => $_POST['desc'],
    'post_status' => 'publish',
    'post_type' => 'projetos',
    'meta_input' => array(
      'arquivo_id' => $arquivoId,
      'imagem_id' => $imagemId,
      'imagem_url' => $imagemUrl,
      'arquivo_url' => $arquivoUrl,
      'curso' => $cursoId,
      'usuario_id' => $userId,
    )
  );
  
  return wp_insert_post( $my_post );
  die();
}

add_action( 'wp_ajax_addProject', 'addProject' );
add_action( 'wp_ajax_nopriv_addProject', 'addProject' );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
  'key' => 'group_61360f84c8f5d',
  'title' => 'Home',
  'fields' => array(
    array(
      'key' => 'field_61360f9e92dd7',
      'label' => 'Cursos em destaque',
      'name' => 'cursos_em_destaque',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'table',
      'button_label' => '',
      'sub_fields' => array(
        array(
          'key' => 'field_61360fa592dd8',
          'label' => 'Embed',
          'name' => 'embed',
          'type' => 'textarea',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'maxlength' => '',
          'rows' => '',
          'new_lines' => '',
        ),
        array(
          'key' => 'field_61360fb092dd9',
          'label' => 'Curso',
          'name' => 'curso',
          'type' => 'relationship',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'post_type' => array(
            0 => 'sfwd-courses',
          ),
          'taxonomy' => '',
          'filters' => array(
            0 => 'search',
            1 => 'post_type',
            2 => 'taxonomy',
          ),
          'elements' => '',
          'min' => 1,
          'max' => 1,
          'return_format' => 'id',
        ),
      ),
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'post_template',
        'operator' => '==',
        'value' => 'home.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
));

endif;



add_filter( 'woocommerce_checkout_get_value' , 'custom_checkout_get_value', 20, 2 );
function custom_checkout_get_value( $value, $input ) {
    // Billing first name
    if(isset($_GET['presente'])){
      if($input == 'gift_purchase'){
        return true;
      }
    }
}


/* Function Headers */
function headers($id) {

  $type = '';
  $header = get_post($id);
  if ($header) $type = $header->post_type;
  if ('headers' === $type) {
    include_once(get_template_directory().'/inc/header.php');
  }

}

/* Style Headers */
function enqueue_header_style() {
  wp_enqueue_style('headers', get_template_directory_uri() . '/assets/dist/css/headers.css', array(), '0.1.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'enqueue_header_style');

/* ID Header Colluns */
add_filter('manage_headers_posts_columns', function($columns) {
	return array_merge($columns, ['url' => __('URL', 'textdomain')]);
});
 
add_action('manage_headers_posts_custom_column', function($column_key, $post_id) {
	echo '<div class="header__id" style="padding:10px 20px; font-weight:bold; border:1px dotted #000; display:table; border-radius:5px;" >?header='.$post_id.'</div>';
}, 10, 2);


/* 
  Header Status
  Return style on header
*/
function header_status() {
    $hideHeader = get_field('hide_header', $post->ID);
    $hideHeaderUrl = $_GET['hideHeader'];

    if (true === $hideHeader || 'true' === $hideHeaderUrl) {
      add_filter( 'body_class', function( $classes ) { 
        return array_merge( $classes, array( 'hide_header' ) );  
      });
    }
}
add_action('wp_head', 'header_status', 10);

/* 
  Header Status - enqueue csss
*/
function enqueue_style_header() {
  wp_enqueue_style('hide_header', get_template_directory_uri(). '/assets/dist/css/hide_header.css');
}
add_action('wp_enqueue_scripts', 'enqueue_style_header', PHP_INT_MAX);



/* Page b2b */
function enqueue_b2b() {
  wp_enqueue_style('page-b2b', get_template_directory_uri() . '/assets/dist/css/page-b2b.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_b2b');

?>