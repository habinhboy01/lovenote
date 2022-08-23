<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="row bg-detail-product">
		<div class="col-lg-7 col-12">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>


		<div class="col-lg-5 col-12 text3">
			<div class="text2">
				<h1 class="text1"><?php the_title() ;?></h1>

				<h2 class="text1"><?php echo get_field('text-title'); ?></h2>

				<ul class="custom-price">
					<li class="text-custom-price">Giá:</li>

					<li class="text-custom-price2"><?php echo number_format($product->get_regular_price());?> VND</li>
				</ul>

				<div class="custom-quantity">
					<span class="text-custom-quantity">Số lượng:</span>

					<form enctype="multipart/form-data" method="post" class="cart custom-quantity2">
						<div class="quantity"><input type="number" size="4" class="input-text qty text" title="SL" value="1" name="quantity" min="1" step="1"></div>
						<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
						<button class="add-cart single_add_to_cart_button alt buynow btn-buy" type="submit">Mua Ngay</button>
					</form>
				</div>
			</div>

			<div class="content-product"><?php the_content();?></div>
		</div>
	</div>


</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
