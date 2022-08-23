<?php
/*

Template Name: Product page

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

		<div class="welcome">
			<div class="owl-carousel owl-theme carousel_4">
				<?php if( have_rows('slideshow') ): ?>
		            <?php while( have_rows('slideshow') ): the_row(); 
		                $image = get_sub_field('img');
		                ?>

		                <div class="item">
							<img class="img-lovenote" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
						</div>

		       	    <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="container">
			<div class="row bg-woo2">
				<div class="col-lg-3 col-12">
					<?php get_sidebar(); ?>
				</div>

				<div class="col-lg-9 col-12 bg-woo3">	
					<h1 class="text-woo4">Tất cả sản phẩm</h1>

					<div class="row">	
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			            <?php
			            if (get_query_var('paged')) {
			                $paged = get_query_var('paged');
			            } elseif (get_query_var('page')) { // 'page' is used instead of 'paged' on Static Front Page
			                $paged = get_query_var('page');
			            } else {
			                $paged = 1;
			            }
			            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			            $loop = new WP_Query(
			                array(
			                    'post_type'=>'product',
			                    'posts_per_page' => get_option('posts_per_page'),
			                    'paged' => $paged,                       
			                    'post_status' => 'publish',
				                'orderby' => 'post_date',
				                'order' => 'date', // modified | title | name | ID | rand
			                )
			            );
			            ?>  

				            <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

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

				            <?php endwhile; ?>               			   		             

			                <?php if ($loop->max_num_pages > 1) : // custom pagination  ?>
				                <div class="pagination">
				                    <?php
				                        $orig_query = $wp_query; // fix for pagination to work
				                        $wp_query = $loop;
				                        $big = 999999999;
				                        echo paginate_links(array(
				                            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				                            'format' => '?paged=%#%',
				                            'prev_text'    => __('<i class="fas fa-angle-left"></i>'),
				                            'next_text'    => __('<i class="fas fa-angle-right"></i>'),
				                            'current' => max(1, get_query_var('paged')),
				                            'total' => $wp_query->max_num_pages
				                        ));
				                    $wp_query = $orig_query; // fix for pagination to work ?>
				                </div>
			            	<?php endif; ?>
			            	<?php wp_reset_postdata();
			                else : echo '<p>' . __('Sorry, no posts matched your criteria.') . '</p>';
			                endif; ?>
			  
					    <?php endwhile; ?>
					    <?php endif; ?>
					</div>
				</div>
			</div>
		</div>	


		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">
	</div>


<?php get_footer(); ?>