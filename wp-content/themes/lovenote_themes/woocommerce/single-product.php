<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<div class="bg-main">

		<div class="container">
			<div class="bg-detail-product2">
				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>
			</div>

				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
		</div>
		
		<div class="bg-related">
			<div class="container">
				<?php
					global $product; // If not set…

					if( ! is_a( $product, 'WC_Product' ) ){
						$product = wc_get_product(get_the_id());
					}

					$args = array(
						'posts_per_page' => 3,
						'columns'        => 3,
						'orderby'        => 'rand',
						'order'          => 'date',
					);

					$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
					$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

					// Set global loop values.
					wc_set_loop_prop( 'name', 'related' );
					wc_set_loop_prop( 'columns', $args['columns'] );

					wc_get_template( 'single-product/related.php', $args ); 
				?>
			</div>
		</div>

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">
	</div>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
