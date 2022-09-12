<?php
/*

	Template Name: security

*/

get_header(); ?>

	<div class="bg-main">
		<div class="container bg-category">

			<h1 class="title text-category"><?php echo get_field('title-security'); ?></h1>

			<div class="bg-category2">
				<?php if( have_rows('content-security') ): ?>
			        <?php while( have_rows('content-security') ): the_row(); ?>

			        	<p class="text-terms2"><?php the_sub_field('content'); ?></p>

			     	<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<?php if( have_rows('list-security') ): ?>
		        <?php while( have_rows('list-security') ): the_row(); ?>

		        	<h3 class="text-terms text-terms4"><?php echo get_sub_field('title'); ?></h3>

		        	<ul class="text-terms3">	    
						<?php if( have_rows('text') ): ?>
					        <?php while( have_rows('text') ): the_row(); ?>

					        	<li><?php echo get_sub_field('content'); ?></li>

					     	<?php endwhile; ?>
						<?php endif; ?>
		        	</ul>

		      	<?php endwhile; ?>
			<?php endif; ?>


		</div>
	</div>

<?php get_footer(); ?>