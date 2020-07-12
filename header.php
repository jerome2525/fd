<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

		<!-- Mobile fixed Menu -->
		<div class="mobile-nav-bar">
			<ul>
				<li><a href="/"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
				<?php if( !empty( get_field('mobile_menu_link', 'option') ) ) { ?>
					<li><a href="<?php echo get_field('mobile_menu_link', 'option'); ?>"><i class="fa fa-cutlery" aria-hidden="true"></i><span>Menu</span></a></li>
				<?php } ?>
				<li class="center-nav"><a href="#" class="mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
				<?php if( !empty( get_field('call_us_number', 'option') ) ) { ?>
					<li><a href="tel:<?php echo get_field('call_us_number', 'option'); ?>"><i class="fa fa-phone-square" aria-hidden="true"></i><span>Call</span></a></li>
				<?php } ?>
				<?php if( class_exists( 'WooCommerce' ) ) { ?>
					<?php if( wc_get_cart_url() ) { ?>
						<li><a href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Cart <span class="header-cart-count">(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span></span></a></li>
					<?php } ?>
				<?php } ?>
				
			</ul>
		</div>	

		<!-- /Mobile fixed Menu -->	

		<!-- header -->
		<header class="header clear" role="banner">

				<!-- top row -->
				<?php if( !empty( get_field('call_us_label','option') || get_field('call_us_number', 'option') ) ) { ?>
				<section class="fd-row-content-wrap top-row">
					<div class="fd-row-content">
						<p><?php if( !empty( get_field('call_us_label', 'option') ) ) { echo '<span class="label">' . get_field('call_us_label', 'option') . '</span>'; } ?> <?php if( !empty( get_field('call_us_number', 'option') ) ) { echo '<a href="tel:' . get_field('call_us_number', 'option') . '"><i class="fa fa-mobile" aria-hidden="true"></i> ' .get_field('call_us_number', 'option'). '</a>'; } ?></p>
					</div>
				</section>
				<?php } ?>
				<!-- /top row -->

				<!-- logo nav row -->
				<section class="fd-row-content-wrap logo-nav-row">
					<div class="fd-row-content">
						<!-- logo -->
						<div class="logo">
							<a href="<?php echo home_url(); ?>">
								<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
								<img src="<?php echo get_field('main_logo', 'option'); ?>" alt="Logo" class="logo-img">
							</a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<nav class="nav" role="navigation">
							<a href="#" class="mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
							<?php fd_nav(); ?>
						</nav>
						<!-- /nav -->
					</div>
				</section>
				<!-- /logo nav row -->

		</header>
		<!-- /header -->
