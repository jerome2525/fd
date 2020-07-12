<?php /* Template Name: Home Skin1 Template */ get_header(); ?>

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
								<div class="fd-module fd-module-button"><a href="<?php echo $hero_menu_link; ?>" class="fd-button"><span class="label">Menu</span> <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a></div>
							<?php } ?>
							<?php if( !empty( $hero_featured_image ) ) { ?>
								<div class="fd-module fd-module-featured"><img src="<?php echo $hero_featured_image; ?>" alt="hero_featured_image"></div>
							<?php } ?>
						</div>
					</section>		
				<?php 
				}
				// end Hero row 
				
			}
		}   
		?>	
	</main>

<?php get_footer(); ?>
