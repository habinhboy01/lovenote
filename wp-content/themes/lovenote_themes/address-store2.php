<?php

/*
 *Template Name: address store 2
 * Template Post Type: post
 */

get_header(); ?>

	<div class="bg-main">

		<div class="container">	

			<div class="bg-single">
				<h2 class="text-single"><?php the_category(); ?></h2>

				<?php

				if ( function_exists('yoast_breadcrumb') ) {

				 yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

				}

				?>
			</div>


			<div class="row bg-category2">
				<div class="col-lg-6 col-12">
					<div class="owl-carousel owl-theme carousel_6">
						<?php if( have_rows('list-img') ): ?>
				            <?php while( have_rows('list-img') ): the_row(); 
				                $image = get_sub_field('img');
				                $picture = $image['sizes']['thumbnail']; 
				                ?>

								<div class="item">
									<img class="address-store" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
								</div>

				       	    <?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="col-lg-6 col-12">
					<h2 class="address-store2"><?php echo get_field('title'); ?></h2>

					<?php if( have_rows('list-content') ): ?>
			            <?php while( have_rows('list-content') ): the_row(); ?>

			            	<p class="address-store3"><?php the_sub_field('content'); ?></p>

			      		<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>


		</div>

		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">

	</div>

<?php get_footer(); ?>