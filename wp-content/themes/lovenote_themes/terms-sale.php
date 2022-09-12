<?php
/*

	Template Name: Terms of Sale of Goods

*/

get_header(); ?>

	<div class="bg-main">
		<div class="container bg-category">

			<h1 class="title text-category"><?php echo get_field('title-terms-sale'); ?></h1>

			<!-- Chính sách đổi / Trả hàng hóa -->

			<h2 class="text-terms bg-category2"><?php echo get_field('return_policy'); ?></h2>

			<p class="text-terms2"><?php the_field('description_return_policy'); ?></p>

			<?php if( have_rows('terms_return_policy') ): ?>
		        <?php while( have_rows('terms_return_policy') ): the_row(); ?>

		        	<h3 class="text-terms text-terms4"><?php echo get_sub_field('title'); ?></h3>

		        	<ul class="text-terms3">	        		
						<?php if( have_rows('content') ): ?>
					        <?php while( have_rows('content') ): the_row(); ?>

					        	<li>
					        		<i class="fas fa-circle"></i>

					        		<?php echo get_sub_field('text'); ?>
					        	</li>

					     	<?php endwhile; ?>
						<?php endif; ?>
		        	</ul>

		      	<?php endwhile; ?>
			<?php endif; ?>

			<!-- Quy trình đổi / trả -->

			<h2 class="text-terms text-terms4"><?php echo get_field('return_process'); ?></h2>

			<p class="text-terms2"><?php the_field('description_return_process'); ?></p>

        	<ul class="text-terms3">	        		
				<?php if( have_rows('terms_return_process') ): ?>
			        <?php while( have_rows('terms_return_process') ): the_row(); ?>

			        	<li>
			        		<i class="fas fa-circle"></i>

			        		<?php echo get_sub_field('content'); ?>
			        	</li>

			     	<?php endwhile; ?>
				<?php endif; ?>
        	</ul>

        	<!-- Hoàn tiền -->

        	<h2 class="text-terms text-terms4"><?php echo get_field('refund'); ?></h2>

			<p class="text-terms2"><?php the_field('description_refund'); ?></p>

			<?php if( have_rows('terms_refund') ): ?>
		        <?php while( have_rows('terms_refund') ): the_row(); ?>

		        	<h3 class="text-terms text-terms4"><?php echo get_sub_field('title'); ?></h3>

		        	<ul class="text-terms3">	        		
						<?php if( have_rows('content') ): ?>
					        <?php while( have_rows('content') ): the_row(); ?>

					        	<li>
					        		<i class="fas fa-circle"></i>

					        		<?php echo get_sub_field('text'); ?>
					        	</li>

					     	<?php endwhile; ?>
						<?php endif; ?>
		        	</ul>

		      	<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>