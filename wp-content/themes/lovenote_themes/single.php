<?php get_header(); ?>

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

			<div class="bg-single2">
				<h1 class="text-single2"><?php the_title(); ?></h1>

				<p class="date-publish">Ngày đăng: <?php echo get_the_date(); ?></p>

				<div class="content-single"><?php the_content(); ?></div>
			</div>
		</div>

		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">

	</div>

<?php get_footer(); ?>