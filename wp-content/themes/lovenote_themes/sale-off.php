<?php
/*

Template Name: sale off page

*/
get_header(); ?>

	<div class="bg-main">
		<div class="container bg-category">
			<h1 class="title text-category"><?php echo get_cat_name( $category_id = 84 );?></h1>

			<div class="row bg-category2">
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
	                    'post_type' => 'post',
	                    'posts_per_page' => get_option('posts_per_page'),
	                    'paged' => $paged,                       
	                    'post_status' => 'publish',
	                    'cat' => 84,
	                    'orderby' => 'dsc',
	                    'orderby' => 'date' // modified | title | name | ID | rand
	                )
	            );
	            ?>  

		            <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

		                <div class="col-lg-4 col-md-6 col-12 content-category">

		                    <a class="img-category" href="<?php the_permalink(); ?>">
		                    <?php the_post_thumbnail('full'); ?></a>

		                    <div class="content-category2">
		                        <h2 class="text-category2">
		                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                        </h2>

		                        <div class="text-category3"><?php the_excerpt(); ?></div>

		                        <p class="text-category4"><a href="<?php the_permalink(); ?>">Xem Thêm</a></p>
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

		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">
	</div>

<?php get_footer(); ?>