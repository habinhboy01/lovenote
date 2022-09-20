<?php

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

// Thêm ảnh đại diện
add_theme_support('post-thumbnails');


function my_custom_wc_theme_support()
{

    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-lightbox');

    add_theme_support('wc-product-gallery-slider');
    // add_theme_support('wc-product-gallery-zoom');
}
add_action('after_setup_theme', 'my_custom_wc_theme_support');



function m_register_menu()
{
  register_nav_menus(
    array(
      'menu-1' => __('Primary'),
      'menu-2' => __('Primary2'),
      'menu-3' => __('Primary3'),
      'menu-4' => __('Primary4'),
    )
  );
}
add_action('init', 'm_register_menu');


// add theme option menu bar admin 
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}



//  logo

function m_logo_web($wp_customize)
{
  $wp_customize->add_section(
    'logo',
    array(
      'title' => 'Logo',
      'description' => 'logo',
    )
  );

  $wp_customize->add_setting('Logo', array('default' => ''));
  $wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'Logo', array(
      'label' => 'Logo',
      'section' => 'logo',
      'settings' => 'Logo'
    ))
  );
}
add_action('customize_register', 'm_logo_web');


/**
 Change a currency symbol đ to VND
 */
 add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2); 
 function change_existing_currency_symbol( $currency_symbol, $currency ) {
 switch( $currency ) {
 case 'VND': $currency_symbol = 'VND'; break;
 }
 return $currency_symbol;
 }


// giá liên hệ

function chowordpress_wc_custom_get_price_html( $price, $product ) {
    if ( $product->get_price() == 0 ) {
        if ( $product->is_on_sale() && $product->get_regular_price() ) {
            $regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );
 
            $price = wc_format_price_range( $regular_price, __( 'Liên hệ', 'woocommerce' ) );
        } else {
            $price = '<span class="amount">' . __( 'Liên hệ', 'woocommerce' ) . '</span>';
        }
    }
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'chowordpress_wc_custom_get_price_html', 10, 2 );



/**
* Change several of the breadcrumb defaults
*/
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
return array(
'delimiter' => ' <i class="fas fa-angle-right"></i> ',
'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
'wrap_after' => '</nav>',
'before' => '',
'after' => '',
'home' => _x( 'Home', 'breadcrumb', 'woocommerce' ),
);
}


// Đổi tên một số sorting

//Thay đổi thứ tự sorting
add_filter( 'woocommerce_catalog_orderby', 'misha_change_sorting_options_order', 5 );
 
function misha_change_sorting_options_order( $options ){
 
    $options = array(
 
        //'menu_order' => __( 'Default sorting', 'woocommerce' ), // you can change the order of this element too
        'featured'      => __( 'Sản phẩm nổi bật', 'woocommerce' ),
        'price'      => __( 'Giá tăng dần', 'woocommerce' ), // I need sorting by price to be the first
        'price-desc' => __( 'Giá giảm dần', 'woocommerce' ),
        'oldest_to_recent' => __( 'Cũ nhất', 'woocommerce' ), 
        'date'       => __( 'Mới nhất', 'woocommerce' ), 
 
        // and leave everything else without changes
        'popularity' => __( 'Bán chạy nhất', 'woocommerce' ),
        
        
 
    );
 
    return $options;
 
}


// thêm field trong trang checkout

add_action( 'wp_enqueue_scripts', 'wpshare247_datepicker' );
function wpshare247_datepicker() {
    if( is_admin() || ! is_checkout() ) return;
    wp_enqueue_script( 'jquery-ui-datepicker' );
}

//2. Thêm 1 field vào trang thanh toán
add_filter( 'woocommerce_checkout_fields' , 'wpshare247_add_custom_checkout_field', 9999999 );
function wpshare247_add_custom_checkout_field( $fields ) {
    
    //New field---------
    $fields['billing']['wpshare247_my_date'] = array(
                                        'label'     => __('Ngày tháng năm sinh', 'woocommerce'),
                                        'placeholder'   => date('d/m/Y'),
                                        'required'  => true, // Bắt buộc nhập hay không
                                        'class'     => array('form-row-wide wpshare247-datepicker'),
                                        'clear'     => true,
                                        'priority'  => 20    // Thứ tự field trong cùng 1 nhóm
      );
      
      // Tiếp tục thêm field khác giống như trên nếu muốn
    
    return $fields;
}

add_action( 'wp_head', 'wpshare247_add_this_script_footer' );
function wpshare247_add_this_script_footer(){
?>
    <script>
        //Add new datepicker
        jQuery(document).ready(function(){
            jQuery('.wpshare247-datepicker input').datepicker({ dateFormat: 'dd/mm/yy' });
        });
    </script>
<?php
}

add_action('woocommerce_checkout_process', 'wpshare247_checkout_field_process_save');
function wpshare247_checkout_field_process_save() {
    if ( ! $_POST['wpshare247_my_date'] )
        wc_add_notice( __( 'Please enter something into this new shiny field.' ), 'error' );
}

add_action( 'woocommerce_checkout_update_order_meta', 'wpshare247_custom_checkout_field_update_order_meta' );
function wpshare247_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['wpshare247_my_date'] ) ) {
        update_post_meta( $order_id, 'wpshare247_my_date', sanitize_text_field( $_POST['wpshare247_my_date'] ) );
    }
}


// xóa input trong checkout

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_postcode']);
     return $fields;
}


// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
}


// page đăng nhập

/* Tự động chuyển đến một trang khác sau khi login */

function my_login_redirect( $redirect_to, $request, $user ) {
  //is there a user to check?
  global $user;
  if ( isset( $user->roles ) && is_array( $user->roles ) ) {
    //check for admins
    if ( in_array( 'administrator', $user->roles ) ) {
      // redirect them to the default place
      return admin_url();
    } else {
      return home_url();
    }
  } else {
    return $redirect_to;
  }
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


function redirect_login_page() {
    $login_page  = home_url( '/dang-nhap/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);  
    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','redirect_login_page');



/* Kiểm tra lỗi đăng nhập */
function login_failed() {
    $login_page  = home_url( '/dang-nhap/' );
    wp_redirect( $login_page . '?login=failed' );
    exit;
}
add_action( 'wp_login_failed', 'login_failed' );  
function verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/dang-nhap/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);
