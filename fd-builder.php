<?php /* Template Name: FD Builder */ get_header(); ?>

	<main role="main">
		<?php
		if( have_rows( 'fd_page_composer' ) ) { 
		    while ( have_rows( 'fd_page_composer' ) ) { 
		 	the_row();

			 	// Hero row
				if( get_row_layout() == 'hero' ) { 
					$title = get_sub_field( 'hero_title' );
					$subtitle = get_sub_field( 'hero_sub_title' );
			    	$bg_image = get_sub_field( 'hero_background_image' );
			     	$bg_color = get_sub_field( 'hero_background_color' );
			     	$hero_menu_link = get_sub_field( 'hero_menu_link' );
			     	$hero_featured_image = get_sub_field( 'hero_featured_image' );
			     	if( $bg_image || $bg_color ) {
			     		?>
			     		<style type="text/css">
			     			.hero-row {
							    <?php if( $bg_color ) { ?>
							    	background-color: <?php echo $bg_color; ?>;
								<?php } ?>
							    <?php if( $bg_image ) { ?>
							    	background-image: url(<?php echo $bg_image; ?>);
								<?php } ?>
							}
			     		</style>
			     		<?php
			     	}
				?>
					<section class="fd-row-content-wrap hero-row">
						<div class="fd-row-content">
							<div class="fd-module fd-module-heading fd-module-heading1"><h1><?php echo $title; ?></h1></div>
							<?php if( !empty( $subtitle ) ) { ?>
								<div class="fd-module fd-module-heading fd-module-heading2"><h2><?php echo $subtitle; ?></h2></div>
							<?php } ?>
							<?php if( !empty( $hero_menu_link ) ) { ?>
								<div class="fd-module fd-module-button"><a href="<?php echo $hero_menu_link; ?>" class="fd-button hvr-grow"><span class="label">Menu</span> <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a></div>
							<?php } ?>
							<?php if( !empty( $hero_featured_image ) ) { ?>
								<div class="fd-module fd-module-featured"><img src="<?php echo $hero_featured_image; ?>" alt="hero_featured_image"></div>
							<?php } ?>
						</div>
					</section>		
				<?php 
				}
				// end Hero row 


				// Food Category row
				if( get_row_layout() == 'home_food_category' ) { 
					$title = get_sub_field( 'home_food_category_title' );
					$subtitle = get_sub_field( 'home_food_category_sub_title' );
					$button_text = get_sub_field( 'button_text' );
					$button_url = get_sub_field( 'button_url' );
					$home_food_category_button_label = get_sub_field( 'home_food_category_button_label' );
					$home_food_category_limit = get_sub_field( 'home_food_category_limit' );
					if( !empty( $home_food_category_limit ) ) {
						$limit = $home_food_category_limit + 1 ;
					}
					else {
						$limit = 0;
					}

				?>
					<section class="fd-row-content-wrap food-cat-row">
						<div class="fd-row-content">
							<div class="fd-module fd-module-heading fd-module-heading3"><h3><?php echo $title; ?></h3></div>

							<?php if( !empty( $subtitle ) ) { ?>
								<div class="fd-module fd-module-heading fd-module-heading4"><h4><?php echo $subtitle; ?></h4></div>
							<?php } ?>
							
							<?php
							if( !class_exists( 'WooCommerce' ) ) {
								return true;
							}

							$categories = get_terms( 'product_cat', array(
							    'orderby'    => 'count',
							    'hide_empty' => 0,
							    'number' => $limit
							) );

							if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
							    echo '<ul class="food-category-list">';
							    foreach ( $categories as $category ) {
							    	$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	    							$image = wp_get_attachment_url( $thumbnail_id );
	    							$name = $category->name;
	    							$slug = get_term_link( $category );
	    							$sub_title = get_field('product_sub_tile', $category->taxonomy . '_' . $category->term_id );
  									
									if ( ! in_array( $category->slug, array( 'uncategorized' ) ) ) {
							        	echo '<li style="background-image: url(' . $image . ');" class="hvr-grow"><a href="' . $slug . '"></a>';
							        	if( !empty( $sub_title ) ) {
							        		echo '<h4>' . $sub_title . '</h4>';
							        	}
							        	echo '<h3>' . $name . '</h3>';
							        	echo '</li>';
							    	}
							    }
							    echo '</ul>';
							}
							?>
							<?php if( !empty( $home_food_category_button_label ) ) { ?>
								<div class="fd-module fd-module-heading fd-module-heading5"><h5><?php echo $home_food_category_button_label; ?></h5></div>
							<?php } ?>
							<?php if( !empty( $button_url ) ) { ?>
								<div class="fd-module fd-module-button"><a href="<?php echo $button_url; ?>" class="fd-button hvr-grow"><span class="label"><?php echo $button_text; ?></span> <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a></div>
							<?php } ?>

						</div>
					</section>		
				<?php 
				}
				// end Food Category row


				// How to Order row
				if( get_row_layout() == 'home_how_to_order' ) { 
					$title = get_sub_field( 'home_how_to_order_title' );
					$subtitle = get_sub_field( 'home_how_to_order_sub_title' );
				?>
					<section class="fd-row-content-wrap how-to-order-row">
						<div class="fd-row-content">
							<div class="fd-module fd-module-heading fd-module-heading3"><h3><?php echo $title; ?></h3></div>

							<?php if( !empty( $subtitle ) ) { ?>
								<div class="fd-module fd-module-heading fd-module-heading4"><h4><?php echo $subtitle; ?></h4></div>
							<?php } ?>

							<?php
							$steps = get_sub_field('home_how_to_order_steps');
							if( $steps ) {
							    echo '<ul class="steps">';
							    foreach( $steps as $step ) {
							        $label = $step['home_how_to_order_steps_label'];
							        $step_image = $step['home_how_to_order_steps_image'];
							        echo '<li>';
							        echo '<img src="' .$step_image . '">';
							        echo '<p>' . $label . '</p>';
							        echo '</li>';
							    }
							    echo '</ul>';
							}
							?>

						</div>
					</section>		
				<?php 
				}
				// end How to Order row

				// Google play and App store row
				if( get_row_layout() == 'home_google_apple_store' ) { 
					$title = get_sub_field( 'home_google_apple_store_title' );
			    	$bg_image = get_sub_field( 'home_google_apple_store_background_image' );
			     	$home_google_apple_store_featured_image = get_sub_field( 'home_google_apple_store_featured_image' );
			     	$google_play_url = get_sub_field( 'google_play_url' );
			     	$apple_url = get_sub_field( 'apple_url' );
			     	if( $bg_image ) {
			     		?>
			     		<style type="text/css">
			     			.app-row {
							    <?php if( $bg_image ) { ?>
							    	background-image: url(<?php echo $bg_image; ?>);
								<?php } ?>
							}
			     		</style>
			     		<?php
			     	}
				?>
					<section class="fd-row-content-wrap app-row">
						<div class="fd-row-content">
							<div class="fd-col">
								<div class="fd-module fd-module-heading fd-module-heading3"><h3><?php echo $title; ?></h3></div>
								<div class="fd-col fd-col-btn">
									<?php if( !empty( $google_play_url ) ) { ?>
										<div class="fd-module fd-module-img-button"><a href="<?php echo $google_play_url; ?>" class="fd-button hvr-grow"><img src="<?php echo get_template_directory_uri() . '/img/google-play.png'; ?>"></a></div>
									<?php } ?>
									<?php if( !empty( $apple_url ) ) { ?>
										<div class="fd-module fd-module-img-button"><a href="<?php echo $apple_url; ?>" class="fd-button hvr-grow"><img src="<?php echo get_template_directory_uri() . '/img/appstore.png'; ?>"></a></div>
									<?php } ?>
								</div>
							</div>
							<div class="fd-col">
								<?php if( !empty( $home_google_apple_store_featured_image ) ) { ?>
									<div class="fd-module fd-module-featured"><img src="<?php echo $home_google_apple_store_featured_image; ?>" alt="hero_featured_image"></div>
								<?php } ?>
							</div>
						</div>
					</section>		
				<?php 
				}
				// end Google play and App store row 


				// Menu list row
				if( get_row_layout() == 'home_menu_list' ) { 
					$title = get_sub_field( 'home_menu_list_title' );
					$subtitle = get_sub_field( 'home_menu_list_sub_title' );
				?>
					<section class="fd-row-content-wrap menu-list-row">
						<div class="fd-row-content">
							<div class="fd-module fd-module-heading fd-module-heading3"><h3><?php echo $title; ?></h3></div>

							<?php if( !empty( $subtitle ) ) { ?>
								<div class="fd-module fd-module-heading fd-module-heading4"><h4><?php echo $subtitle; ?></h4></div>
							<?php } ?>

							<?php
							$steps = get_sub_field('home_how_to_order_steps');
							if( $steps ) {
							    echo '<ul class="steps">';
							    foreach( $steps as $step ) {
							        $label = $step['home_how_to_order_steps_label'];
							        $step_image = $step['home_how_to_order_steps_image'];
							        echo '<li>';
							        echo '<img src="' .$step_image . '">';
							        echo '<p>' . $label . '</p>';
							        echo '</li>';
							    }
							    echo '</ul>';
							}
							?>

						</div>
					</section>		
				<?php 
				}
				// end Menu list row
				
			}
		}   
		?>	
	</main>

<?php get_footer(); ?>
