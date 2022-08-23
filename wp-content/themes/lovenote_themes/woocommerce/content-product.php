<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="col-lg-4 col-md-6 col-12 box-product">

    <a class="img-woo" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
    </a>

    <div class="woo-product">
        <p class="text-woo2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

        <div class="woo-product2">
            <p><?php echo $product->get_price_html(); ?></p>   

            <?php $product = get_product(get_the_ID());
			echo "<a class='buy-product' href='".$product->add_to_cart_url()."'><i class='fas fa-plus'></i></a>"; ?>
		</div>

    </div>
</div>
