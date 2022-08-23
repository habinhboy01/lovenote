<?php
/*

Template Name: contact page

*/

get_header(); ?>

	<div class="bg-main">
		<div class="container bg-woo">
			<?php

				if ( function_exists('yoast_breadcrumb') ) {

				 yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

				}

			?>
		</div>
		
		<div class="bg-store">
			<h1 class="title text-store"><?php echo get_field('title-address'); ?></h1>

			<div class="address">
				<?php echo get_field('address'); ?>
			</div>
			
			<div class="container">
				<div class="row">

					<!-- form thông tin -->

					<div class="col-lg-8 col-md-8 col-12">

						<div class="form-contact">
							<h2 class="text-contact"><?php echo get_field('contact'); ?></h2>

							<?php echo do_shortcode( '[contact-form-7 id="227" title="Contact form 1"]' ); ?>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-12">					

						<div class="content-store">
							<h2 class="text-contact"><?php echo get_field('title-contact'); ?></h2>
							
							<?php if( have_rows('info-contact') ): ?>
					            <?php while( have_rows('info-contact') ): the_row(); 
					                $image = get_sub_field('img');
					                ?>

				                	<div class="content-address">
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">

										<div class="content-address2">
											<h2><?php echo get_sub_field('title'); ?></h2>

											<p><?php echo get_sub_field('text'); ?></p>
											<p><?php echo get_sub_field('text2'); ?></p>
										</div>
									</div>

					       	    <?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">

	</div>

<?php get_footer(); ?>