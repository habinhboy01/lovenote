<!DOCTYPE html>
<html>
<head>
	<title>
	    <?php if (is_front_page()) : ?>
	        <?php bloginfo('name') ?>
	    <?php elseif (is_single()) : ?>
	        <?php echo wp_title('', true, ''); ?>
	    <?php else : ?>
	        <?php echo wp_title('', true, ''); ?>
	    <?php endif ?>
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/vendor/bootstrap5/css/bootstrap.min.css">

	<!-- fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/vendor/fontawesome-free-5.15.3-web/css/all.min.css">

	 <!-- carousel -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/vendor/OwlCarousel/dist/assets/owl.carousel.min.css">
  	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/vendor/OwlCarousel/dist/assets//owl.theme.default.min.css">

  	<!-- library animation -->
  	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/aos.css">
  	<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory') ?>/images/logo.ico"/>

  	 <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style.css">

	<?php wp_head() ?>
</head>
<body>

<!-- menu pc -->

<div class="bg-header">
	<div class="container">
		<?php wp_nav_menu (
            array('theme_location' => 'menu-4', 'menu_class' => 'login-register'));?>
	</div>
</div>

<!-- menu pc -->

<div class="bg-header2">
	<div class="container">
		<div class="bg-header3">

			<form class="form-search-home" method="get" action="<?php bloginfo('url');?>">
			    <input class="input-search-home" type="text" placeholder="Tìm kiếm..." value="" name="s">

			    <input type="hidden" name="post_type" value="product">

			    <!-- <button type="submit" class="search-home"> -->
			    	<img class="search-home2" src="<?php bloginfo('template_directory') ?>/images/search.png">
			    <!-- </button> -->
			</form>

		    <a class="logo-pc home-url" href="<?php echo home_url(); ?>">
                <img class="img_logo" data-src="<?php echo get_theme_mod( 'Logo' ); ?>">
            </a>

			<?php wp_nav_menu (
                array('theme_location' => 'menu-1', 'menu_class' => 'menu-pc'));?>


            <?php global $woocommerce; ?>	
            <a class="cart-home" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Giỏ hàng ' ); ?>">
                <span class="quantity-home"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>

               <img src="<?php bloginfo('template_directory') ?>/images/cart.png">	
            </a>

		</div>
	</div>
</div>

<!-- menu mobile -->
<div class="all-mobile">
	<div class="bg-mobile">
		<div class="container">
			<div class="bg-mobile2">
				<a class="home-url" href="<?php echo home_url(); ?>">
			        <img class="img_logo logo-mobile" src="<?php echo get_theme_mod( 'Logo' ); ?>">
			    </a>

			    <ul class="menu-mobile">
			    	<li>
						<form class="form-search-home" method="get" action="<?php bloginfo('url');?>">
						    <input class="input-search-home" type="text" placeholder="Tìm kiếm..." value="" name="s">

						    <input type="hidden" name="post_type" value="product">

						    <!-- <button type="submit" class="search-home"> -->
						    	<img class="search-home2" src="<?php bloginfo('template_directory') ?>/images/search.png">
						    <!-- </button> -->
						</form>
			    	</li>

			    	<li>
			            <?php global $woocommerce; ?>	
			            <a class="cart-home" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Giỏ hàng ' ); ?>">
			                <span class="quantity-home"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>

			               <img src="<?php bloginfo('template_directory') ?>/images/cart.png">	
			            </a>
			    	</li>

			    	<li id="btn-bar">
			    		<i class="fas fa-bars"></i>
			    	</li>
			    </ul>
			</div>
	    </div>
	</div>

	<?php wp_nav_menu (
	    array('theme_location' => 'menu-2', 'menu_class' => 'menu-mobile2'));?>
</div>

