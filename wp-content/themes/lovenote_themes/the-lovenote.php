<?php
/*

Template Name: the lovenote page

*/

get_header(); ?>
	<div class="bg-main">

		<div class="welcome">
			<div class="owl-carousel owl-theme carousel_3">
				<?php if( have_rows('img-lovenote') ): ?>
		            <?php while( have_rows('img-lovenote') ): the_row(); 
		                $image = get_sub_field('img');
		                ?>

		                <div class="item">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
						</div>

		       	    <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="bg-store">
			<div class="container">
				<h1 class="title text-store"><?php echo get_field('the-lovenote'); ?></h1>

				<?php if( have_rows('content-lovenote') ): ?>
		            <?php while( have_rows('content-lovenote') ): the_row(); ?>

		                <div class="content-the-lovenote">
							<h2><?php echo get_sub_field('title'); ?></h2>

							<p><?php echo the_sub_field('content'); ?></p>

							<p><?php echo the_sub_field('content2'); ?></p>

							<p><?php echo the_sub_field('content3'); ?></p>

							<p><?php echo the_sub_field('content4'); ?></p>
						</div>

		       	    <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">

	</div>

<?php get_footer(); ?>