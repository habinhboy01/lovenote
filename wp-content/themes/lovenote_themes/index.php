<?php
/*

Template Name: Home page

*/

get_header(); ?>

	<div class="bg-main">
		<!-- welcome -->

		<div class="welcome">
			<div class="owl-carousel owl-theme carousel_1">
				<?php if( have_rows('img-intro') ): ?>
		            <?php while( have_rows('img-intro') ): the_row(); 
		                $image = get_sub_field('img');
		                ?>

		                <div class="item">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
						</div>

		       	    <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<!-- THE LOVENOTE - REFILL YOUR LIFE -->

		<div class="container bg-lovenote">
			<h2 class="title"><?php echo get_field('the-lovenote'); ?></h2>
		
			<div class="text-lovenote">
				<span class="icon-lovenote"><i class="fas fa-quote-left"></i></span>

				<p><?php echo the_field('content-lovenote'); ?></p>

				<span class="icon-lovenote2"><i class="fas fa-quote-right"></i></span>
			</div>		

			<?php if( have_rows('seen-lovenote') ): ?>
	            <?php while( have_rows('seen-lovenote') ): the_row(); 
	                $link = get_sub_field('link');
	                $social_icon = get_sub_field('text');
	                ?>

		            <a class="seen-lovenote" href="<?php echo $link;?>">
						<?php echo $social_icon ?>
					</a>

	       	    <?php endwhile; ?>
			<?php endif; ?>
		</div>

		<!-- SẢN PHẨM BÁN CHẠY -->

		<div class="bg-product">
			<div class="bg-product2">
				<div class="container">
					<h2 class="title title2" data-aos="fade-down" data-aos-duration="500"><?php echo get_field('product'); ?></h2>

	                <div class="owl-carousel owl-theme carousel_2" data-aos="fade-up" data-aos-duration="500">
	                    <?php
	                    $vnkings = new WP_Query(array(
	                    'post_type'=>'product',
	                    'post_status'=>'publish',			
	                    'orderby' => 'post_date',
	                    'order' => 'ASC',
	                    'posts_per_page'=> '12'));
	                    ?>
	                    <?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
	                    	
                    		<div class="item">
	                        
	                            <a class="img-product" href="<?php the_permalink(); ?>">
	                                    <?php the_post_thumbnail(); ?>
	                            </a>

	                            <p class="text-product"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

	                            <p class="text-price"><?php echo $product->get_price_html(); ?></p>           
	                        </div>
		                   
	                    <?php endwhile ; wp_reset_query() ;?>
	                </div>
		        
				</div>
			</div>
		</div>

		<!-- BỘ SƯU TẬP QUÀ TẶNG -->

		<div class="collection">
			<div class="container">
				
				<h2 class="title"><?php echo get_field('collection'); ?></h2>

				<div class="owl-carousel owl-theme carousel_5 collection2">
					<?php
						$cat = 'set-qua-tang';
						$args = array( 
							'post_type' => 'product',
							'posts_per_page' => 5,
							'order' => 'date',
							'product_cat' => $cat
						); 
					?>
					<?php $getposts = new WP_query( $args);?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<?php global $product; ?>
						<div class="item">
							<div class="row">
								<div class="col-lg-6 col-12">

									<?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'id' =>'img-collection3') ); ?>
									
								</div>

								<div class="col-lg-6 col-12">
									<div class="collection3">
										<h4 class="text-collection">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>

										<ul class="list-collection">
											<li class="price-product">
												Giá: <span class="price-product2"><?php echo $product->get_price_html(); ?></span>
											</li>

											<li><a class="cart-collection" href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>"><i class="fas fa-plus"></i></a>
											</li>
										</ul>

										<div class="content-product"><?php the_excerpt(); ?></div>

									</div>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata();?>
				</div>
				
			</div>
		</div>

		<!-- QÙA TẶNG DOANH NGHIỆP -->

		<div class="container bg-gift">
			<div class="bg-gift2">
				<div class="bg-product2">
					<h2 class="title-gift"><?php echo get_field('business-gifts'); ?></h2>

					<p class="text-gift"><?php echo get_field('description-gift'); ?></p>

					<p class="text-gift2"><?php echo get_field('description-gift2'); ?></p>
				</div>
			</div>

			<p class="text-gift3">
				<a href="tel:+0705 168 568">
					<i class="fas fa-phone-alt"></i> 

					<?php echo get_field('phone-book'); ?>
				</a>
			</p>

			<?php 
            $image = get_field('img-book');
            if( !empty( $image ) ): ?>
                <img class="img-book" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>

			<?php if( have_rows('description-gift3') ): ?>
	            <?php while( have_rows('description-gift3') ): the_row(); 
	                $link = get_sub_field('link'); ?>

					<a class="text-gift4" href="<?php echo $link;?>">

						<?php echo get_sub_field('text'); ?>

						<i class="fas fa-long-arrow-alt-right"></i>
					</a>

	       	    <?php endwhile; ?>
			<?php endif; ?>

			<p class="text-gift5">*Xem dịch vụ <span><?php echo get_field('description-gift4'); ?></span></p>
		</div>


		<!-- BÀI VIẾT MỚI -->

		<div class="container news-home">

				<div class="row news-home4">
					<div class="col-lg-4 col-12">
						<div class="news-home3">
							<div class="content-news-home">
								<h2 class="text-news-home"><?php echo get_field('news'); ?></h2>

								<p class="text-news-home2"><?php echo get_field('promotion'); ?></p>

								<?php if( have_rows('detail-news') ): ?>
						            <?php while( have_rows('detail-news') ): the_row(); 
						                $link = get_sub_field('link');
						                $social_icon = get_sub_field('text');
						                ?>

							            <a class="text-news-home3" href="<?php echo $link;?>">
											<?php echo $social_icon ?>
										</a>

						       	    <?php endwhile; ?>
								<?php endif; ?>
							</div>

							<div class="all-dot-news">
								<span class="dot-news" onclick="currentSlide(1)"></span>
								<span class="dot-news" onclick="currentSlide(2)"></span>
								<span class="dot-news" onclick="currentSlide(3)"></span>
							</div>
						</div>
					</div>

					<!-- tab 1 -->

					<div class="col-lg-8 col-12 tab-pane">
						<div class="row">
							<?php
					            $args = array(
					                'post_status' => 'publish',
					                'post_type' => 'post',
					                'posts_per_page' => 2,
					                'cat' => 1,
					                'orderby' => 'post_date',
					                'order' => 'date',
					            ); 
					        ?>
					            <?php $getposts = new WP_query($args); ?>
					            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
					            <?php if (have_posts()) : ?>
					            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

								<div class="col-lg-4 col-12 news-home2">
									<a class="img-news" href="<?php the_permalink(); ?>">
	                					<?php the_post_thumbnail('full'); ?>             						
	                				</a>
								</div>

								<div class="col-lg-8 col-12 news-home2">
									<h1 class="text-news-home4">
					            		<a href="<?php the_permalink() ?>">
						                    <?php the_title() ?>
						                </a>
						            </h1>

						            <div class="text-news-home5"><?php the_excerpt(); ?></div>
								</div>


								<?php endwhile; wp_reset_postdata(); ?>
			        		<?php endif; ?>
						</div>
					</div>

					<!-- tab2 -->

					<div class="col-lg-8 col-12 tab-pane">
						<div class="row">
							<?php
					            $args = array(
					                'post_status' => 'publish',
					                'post_type' => 'post',
					                'posts_per_page' => 2,
					                'cat' => 1,
					                'orderby' => 'post_date',
					                'order' => 'ASC',
					            ); 
					        ?>
					            <?php $getposts = new WP_query($args); ?>
					            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
					            <?php if (have_posts()) : ?>
					            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

								<div class="col-lg-4 col-12 news-home2">
									<a class="img-news" href="<?php the_permalink(); ?>">
	                					<?php the_post_thumbnail('full'); ?>             						
	                				</a>
								</div>

								<div class="col-lg-8 col-12 news-home2">
									<h1 class="text-news-home4">
					            		<a href="<?php the_permalink() ?>">
						                    <?php the_title() ?>
						                </a>
						            </h1>

						            <div class="text-news-home5"><?php the_excerpt(); ?></div>
								</div>


								<?php endwhile; wp_reset_postdata(); ?>
			        		<?php endif; ?>
						</div>
					</div>

					<!-- tab3 -->

					<div class="col-lg-8 col-12 tab-pane">
						<div class="row">
							<?php
					            $args = array(
					                'post_status' => 'publish',
					                'post_type' => 'post',
					                'posts_per_page' => 2,
					                'cat' => 1,
					                'orderby' => 'post_date',
					                'order' => 'DESC',
					            ); 
					        ?>
					            <?php $getposts = new WP_query($args); ?>
					            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
					            <?php if (have_posts()) : ?>
					            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

								<div class="col-lg-4 col-12 news-home2">
									<a class="img-news" href="<?php the_permalink(); ?>">
	                					<?php the_post_thumbnail('full'); ?>             						
	                				</a>
								</div>

								<div class="col-lg-8 col-12 news-home2">
									<h1 class="text-news-home4">
					            		<a href="<?php the_permalink() ?>">
						                    <?php the_title() ?>
						                </a>
						            </h1>

						            <div class="text-news-home5"><?php the_excerpt(); ?></div>
								</div>


								<?php endwhile; wp_reset_postdata(); ?>
			        		<?php endif; ?>
						</div>
					</div>

				</div>
			
		</div>


		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">
	</div>
  

<?php get_footer(); ?>   