<div class="bg-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-6 col-12 bg-footer2">
				<p class="text-footer"><?php echo get_field('title-hotline', 'option'); ?></p>

				<a class="text-footer2" href="tel:+0705 168 568"><?php echo get_field('phone', 'option'); ?></a>

				<div class="list-social">
					<?php if( have_rows('zalo', 'option') ): ?>
			            <?php while( have_rows('zalo', 'option') ): the_row(); 
			                $link = get_sub_field('link');
			                $image = get_sub_field('img');
			                ?>

							<a href="<?php echo $link;?>" target="_blank">
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
							</a>

			       	    <?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-12 bg-footer2">
				<p class="text-footer"><?php echo get_field('store', 'option'); ?></p>

				<p class="text-footer text-footer3"><?php echo get_field('address-store', 'option'); ?></p>

				<ul class="list-address">
					<li>
						<a href="https://goo.gl/maps/krhUvDLikbdKUSaB9" target="_blank"><?php echo get_field('detail-address', 'option'); ?>				
						</a>
					</li>

					<li>
						<a href="https://goo.gl/maps/AuajeR9unmq4dMpk8" target="_blank"><?php echo get_field('detail-address2', 'option'); ?>				
						</a>
					</li>

					<li>
						<a href="tel:+0705 168 568">ĐT: <?php echo get_field('phone', 'option'); ?>
							
						</a>
					</li>

					<li>
						<p class="text-footer"><?php echo get_field('time-open', 'option'); ?></p>
					</li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-6 col-12 bg-footer2">

				<!-- Kênh thương mại điện tử :  -->

				<p class="text-footer"><?php echo get_field('e-commerce', 'option'); ?></p>

				<ul class="e-commerce">
					<?php if( have_rows('list-e-commerce', 'option') ): ?>
			            <?php while( have_rows('list-e-commerce', 'option') ): the_row(); 
			                $link = get_sub_field('link');
			                $image = get_sub_field('img');
			                ?>

			                <li>
								<a href="<?php echo $link;?>" target="_blank">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
								</a>
							</li>

			       	    <?php endwhile; ?>
					<?php endif; ?>
				</ul>

				<p class="line-footer"></p>

				<!-- Delivery -->

				<p class="text-footer"><?php echo get_field('delivery', 'option'); ?></p>

				<ul class="e-commerce">
					<?php if( have_rows('list-delivery', 'option') ): ?>
			            <?php while( have_rows('list-delivery', 'option') ): the_row(); 
			                $link = get_sub_field('link');
			                $image = get_sub_field('img');
			                ?>

			                <li>
								<a href="<?php echo $link;?>" target="_blank">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'];?>">
								</a>
							</li>

			       	    <?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</div>

			<div class="col-lg-3 col-md-6 col-12 bg-footer2">
				<p class="text-footer"><?php echo get_field('useful-links', 'option'); ?></p>

				<?php if( have_rows('list-useful-links', 'option') ): ?>
		            <?php while( have_rows('list-useful-links', 'option') ): the_row(); 
		                $link = get_sub_field('link');
		                ?>
		                <p>
		                	<a class="text-footer4" href="<?php echo $link['url'];?>"><?php echo get_sub_field('text'); ?></a>
		                </p>

		        	<?php endwhile; ?>
				<?php endif; ?>

				<p class="line-footer"></p>

				<?php 
				$image = get_field('img','option');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
			</div>
		</div>

		<p class="conpyright"><?php echo get_field('copyright', 'option'); ?></p>
	</div>
</div>

<a class="back-top" href="#"><i class="fas fa-chevron-up"></i></a>

<?php wp_footer() ?>    
<!-- Thư Viện jquery -->
<script src="<?php bloginfo('template_directory') ?>/vendor/jquery/jquery-3.6.0.min.js"></script>

<!-- bootstrap -->
<script src="<?php bloginfo('template_directory') ?>/vendor/bootstrap5/js/bootstrap.min.js"></script>

<!-- Thư Viện carousel js -->
<script src="<?php bloginfo('template_directory') ?>/vendor/OwlCarousel/dist/owl.carousel.min.js"></script>

<!-- library animation js -->
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/aos.js"></script>

<!-- My Js -->

<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/tab-home.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/style.js"></script>


<script>
  AOS.init();
</script>

</body>
</html>