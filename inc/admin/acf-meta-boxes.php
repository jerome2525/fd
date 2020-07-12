<?php
/**
 * Define the metabox and field configurations.
 */
class Acf_Meta_Boxes {

	public function __construct() {

		$this->load_includes();
		$this->load_hooks();
		$this->create_theme_option();
		$this->create_builder_fields();

	}

	public function load_includes() {

		if ( file_exists( get_stylesheet_directory() . '/lib/acf/acf.php' ) ) {
			require get_stylesheet_directory() . '/lib/acf/acf.php';
		}

	}

	public function load_hooks() {

		add_filter('acf/settings/path', array( $this, 'new_acf_settings_path') );
		add_filter('acf/settings/dir', array( $this, 'new_acf_settings_dir') );
		//add_filter('acf/settings/show_admin', '__return_false' );

	}
	 
	public function new_acf_settings_path( $path ) { 

	    $path = get_stylesheet_directory() . '/lib/acf/';
	    return $path;    

	}
	 
	public function new_acf_settings_dir( $dir ) {

	    $dir = get_stylesheet_directory_uri() . '/lib/acf/';
	    return $dir;

	}

	public function create_builder_fields() {

		// Start Frontpage fields
		acf_add_local_field_group(array(
			'key' => 'fd_builder',
			'title' => 'FD Builder',
			'fields' => array (
				array (
					'key' => 'fd_page_composer',
					'label' => '',
					'name' => 'fd_page_composer',
					'type' => 'flexible_content',
					'layouts' => array (
						// Start Home Hero Skin1 Fields
						array (
							'label' => 'Home Hero Skin1',
							'name' => 'hero',
							'display' => 'row',
							'min' => '',
							'max' => '',
							'sub_fields' => array(
								array(
									'key'   => 'hero_title',
									'label' => 'Title',
									'name'  => 'hero_title',
									'type'  => 'text',
									'required' => 1,
									'default_value' => 'Order food online',
								),
								array(
									'key'   => 'hero_sub_title',
									'label' => 'Sub Title',
									'name'  => 'hero_sub_title',
									'type'  => 'text',
									'default_value' => 'From your Favorite Restaurants',
								),
								array(
									'key'   => 'hero_background_image',
									'label' => 'Background Image',
									'name'  => 'hero_background_image',
									'type'  => 'image',
									'return_format' => 'url',
									'default_value' => '',
								),
								array(
									'key'   => 'hero_background_color',
									'label' => 'Background Color',
									'name'  => 'hero_background_color',
									'type'  => 'color_picker',
									'return_format' => 'string'
								),

								array(
									'key'   => 'hero_featured_image',
									'label' => 'Featured Image',
									'name'  => 'hero_featured_image',
									'type'  => 'image',
									'return_format' => 'url',
									'instructions'	=> 'Advisable size 874px X 525px'
								),

								array(
									'key'   => 'hero_menu_link',
									'label' => 'Menu Link',
									'name'  => 'hero_menu_link',
									'type'  => 'url',
								),
							),
						),
						// End Home Hero Skin1 Fields

						// Start Food Category Fields
						array (
							'label' => 'Food Category',
							'name' => 'home_food_category',
							'display' => 'row',
							'min' => '',
							'max' => '',
							'sub_fields' => array(
								array(
									'key'   => 'home_food_category_title',
									'label' => 'Title',
									'name'  => 'home_food_category_title',
									'type'  => 'text',
									'required' => 1,
									'default_value' => 'More than <span>20,000 dishes</span> to order'
								),
								array(
									'key'   => 'home_food_category_sub_title',
									'label' => 'Sub Title',
									'name'  => 'home_food_category_sub_title',
									'type'  => 'text',
									'default_value' => 'WELCOME TO THE BIGGEST NETWORK OF FOOD ORDERING & DELIVERY'
								),
								array(
									'key'   => 'home_food_category_limit',
									'label' => 'Limit',
									'name'  => 'home_food_category_limit',
									'type'  => 'number',
									'default_value' => ''
								),
								array(
									'key'   => 'button_text',
									'label' => 'Button Text',
									'name'  => 'button_text',
									'type'  => 'text',
									'default_value' => 'More Categories'
								),
								array(
									'key'   => 'button_url',
									'label' => 'Button URL',
									'name'  => 'button_url',
									'type'  => 'url',
									'default_value' => 'http://localhost/foodala/'
								),

								array(
									'key'   => 'home_food_category_button_label',
									'label' => 'Button heading',
									'name'  => 'home_food_category_button_label',
									'type'  => 'text',
									'default_value' => 'Didnt see what you were looking for?'
								),
							),
						),
						// End Food Category Fields

						// Start How to Order Fields
						array (
							'label' => 'How to Order',
							'name' => 'home_how_to_order',
							'display' => 'row',
							'min' => '',
							'max' => '',
							'sub_fields' => array(
								array(
									'key'   => 'home_how_to_order_title',
									'label' => 'Title',
									'name'  => 'home_how_to_order_title',
									'type'  => 'text',
									'required' => 1,
									'default_value' => 'How to <span>order</span>'
								),
								array(
									'key'   => 'home_how_to_order_sub_title',
									'label' => 'Sub Title',
									'name'  => 'home_how_to_order_sub_title',
									'type'  => 'text',
									'default_value' => 'FOLLOW THESE STEPS'
								),
								array(
									'key' => 'home_how_to_order_steps',
									'label' => 'Steps',
									'name' => 'home_how_to_order_steps',
									'type' => 'repeater',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'collapsed' => '',
									'min' => 0,
									'max' => 0,
									'layout' => 'table',
									'button_label' => '',
									'sub_fields' => array(
										array(
											'key' => 'home_how_to_order_steps_label',
											'label' => 'Label',
											'name' => 'home_how_to_order_steps_label',
											'type' => 'text',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
										),
										array(
											'key'   => 'home_how_to_order_steps_image',
											'label' => 'Step Image',
											'name'  => 'home_how_to_order_steps_image',
											'type'  => 'image',
											'return_format' => 'url',
											'default_value' => '',
										),
									),	
								),
							),
						),
						// End How to Order Fields

						// Start App row Fields
						array (
							'label' => 'Google play and App store',
							'name' => 'home_google_apple_store',
							'display' => 'row',
							'min' => '',
							'max' => '',
							'sub_fields' => array(
								array(
									'key'   => 'home_google_apple_store_title',
									'label' => 'Title',
									'name'  => 'home_google_apple_store_title',
									'type'  => 'text',
									'required' => 1,
									'default_value' => 'Get your favorite food <span>fast with the app</span>'
								),
								array(
									'key'   => 'google_play_url',
									'label' => 'Google URL',
									'name'  => 'google_play_url',
									'type'  => 'url',
									'default_value' => 'http://localhost/foodala/'
								),

								array(
									'key'   => 'apple_url',
									'label' => 'App store URL',
									'name'  => 'apple_url',
									'type'  => 'url',
									'default_value' => 'http://localhost/foodala/'
								),
								array(
									'key'   => 'home_google_apple_store_background_image',
									'label' => 'Background Image',
									'name'  => 'home_google_apple_store_background_image',
									'type'  => 'image',
									'return_format' => 'url',
									'default_value' => '',
								),
								array(
									'key'   => 'home_google_apple_store_featured_image',
									'label' => 'Featured Image',
									'name'  => 'home_google_apple_store_featured_image',
									'type'  => 'image',
									'return_format' => 'url',
									'default_value' => '',
									'instructions'	=> 'Advisable size 341px X 419px'
								),
							),
						),
						// End App row Fields

						// Start Food Product Fields
						array (
							'label' => 'Menu List',
							'name' => 'home_menu_list',
							'display' => 'row',
							'min' => '',
							'max' => '',
							'sub_fields' => array(
								array(
									'key'   => 'home_menu_list_title',
									'label' => 'Title',
									'name'  => 'home_menu_list_title',
									'type'  => 'text',
									'required' => 1,
									'default_value' => 'Whats <span>Popular</span>'
								),
								array(
									'key'   => 'home_menu_list_sub_title',
									'label' => 'Sub Title',
									'name'  => 'home_menu_list_sub_title',
									'type'  => 'text',
									'default_value' => 'CLIENTS’ MOST POPULAR CHOICE'
								),
								array(
									'key'   => 'home_menu_list_limit',
									'label' => 'Limit',
									'name'  => 'home_menu_list_limit',
									'type'  => 'number',
									'default_value' => ''
								),
							),
						),
						// End Food Product Fields

					),
					'button_label' => 'Add Section',
					'min' => '',
					'max' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page_template',
						'operator' => '==',
						'value' => 'fd-builder.php',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array('the_content'),
		));
		// End Frontpage Fields

		// Start Product Categories Fields
		acf_add_local_field_group(array (
			'key' => 'product_fields',
			'title' => 'Product Fields',
			'fields' => array (
				array (
					'key' => 'product_sub_tile',
					'label' => 'Sub Title',
					'name' => 'product_sub_tile',
					'type' => 'text',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'taxonomy',
						'operator' => '==',
						'value' => 'product_cat',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));
		// End Product Categories Fields

		// Start Theme option
		acf_add_local_field_group( array (
			'key'      => 'theme_option_group',
			'title'    => 'Theme Option',
			'location' => array (
				array (
					array (
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
		) );

		acf_add_local_field( array(
			'key'          => 'skins_tab',
			'label'        => 'Skins',
			'name'         => 'skins_tab',
			'type'         => 'tab',
			'parent'       => 'theme_option_group',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'top_tab',
			'label'        => 'Top Area',
			'name'         => 'top_tab',
			'type'         => 'tab',
			'parent'       => 'theme_option_group',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'call_us_label',
			'label'        => 'Call Us Label',
			'name'         => 'call_us_label',
			'type'         => 'text',
			'parent'       => 'theme_option_group',
			'instructions' => '',
			'required'     => 0,
			'default_value' => 'Call us for orders',
		) );

		acf_add_local_field( array(
			'key'          => 'call_us_number',
			'label'        => 'Call Us Phone Number',
			'name'         => 'call_us_number',
			'type'         => 'text',
			'parent'       => 'theme_option_group',
			'instructions' => '',
			'required'     => 1,
			'default_value' => '0947 118 0583',
		) );

		acf_add_local_field( array(
			'key'          => 'header_tab',
			'label'        => 'Header',
			'name'         => 'header_tab',
			'type'         => 'tab',
			'parent'       => 'theme_option_group',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'main_logo',
			'label'        => 'Logo',
			'name'         => 'main_logo',
			'type'         => 'image',
			'parent'       => 'theme_option_group',
			'return_format'=> 'url',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'mobile_menu_link',
			'label'        => 'Mobile Menu Link',
			'name'         => 'mobile_menu_link',
			'type'         => 'text',
			'parent'       => 'theme_option_group',
			'instructions' => '',
			'required'     => 1,
			'default_value' => '/menu/',
		) );
		// End Theme option

		// Start Property fields
		acf_add_local_field_group( array (
			'key'      => 'property_fields',
			'title'    => 'Property Fields',
			'location' => array (
				array (
					array (
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'property',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
		) );

		acf_add_local_field( array(
			'key'          => 'property_details_tab',
			'label'        => 'Details',
			'name'         => 'property_details_tab',
			'type'         => 'tab',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'price',
			'label'        => 'Price',
			'name'         => 'price',
			'type'         => 'number',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
			'min'	=> 0
		) );

		acf_add_local_field( array(
			'key'          => 'saleprice',
			'label'        => 'Sale Price',
			'name'         => 'saleprice',
			'type'         => 'number',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 0,
			'min'	=> 0
		) );

		acf_add_local_field( array(
			'key'          => 'address',
			'label'        => 'Address',
			'name'         => 'address',
			'type'         => 'text',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'city',
			'label'        => 'City',
			'name'         => 'city',
			'type'         => 'text',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'state',
			'label'        => 'State',
			'name'         => 'state',
			'type'         => 'text',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'zip',
			'label'        => 'Zip',
			'name'         => 'zip',
			'type'         => 'text',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'country',
			'label'        => 'Country',
			'name'         => 'country',
			'type'         => 'text',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'square_feet',
			'label'        => 'Square Feet',
			'name'         => 'square_feet',
			'type'         => 'text',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'bedrooms',
			'label'        => 'bedrooms',
			'name'         => 'bedrooms',
			'type'         => 'number',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
			'min'	=> 0
		) );

		acf_add_local_field( array(
			'key'          => 'bathrooms',
			'label'        => 'bathrooms',
			'name'         => 'bathrooms',
			'type'         => 'number',
			'parent'       => 'property_fields',
			'instructions' => '',
			'required'     => 1,
			'min'	=> 0
		) );

		// End Property Fields
		
	}

	public function create_theme_option() {

		if( function_exists('acf_add_options_page') ) {
	
			acf_add_options_page(array(
				'page_title' 	=> 'Theme General Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
			
		}
	}

}