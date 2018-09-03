<?php 
//  Portfolio Custom Post Type
add_action('init','leisure_services_custom_post');
function leisure_services_custom_post() {
	register_post_type( 'services',
		array(
			'labels' =>
				array(
					'name' => __( 'Services', 'leisure'),	
					'singular_name' => __( 'Services', 'leisure'),
					'add_new_item' => __('Add New Services', 'leisure'), 
					'add_new' => __( 'Add New Services', 'leisure'),
					'edit_item' => __( 'Edit Services', 'leisure'),
					'new_item' => __( 'New Services', 'leisure' ),
					'view_item' => __( 'View Services' ),
					'not_found' => __( 'Sorry, we couldn\'t find the Services you are looking for.',  'leisure' ),
				),
			
			'public' => true,
			'menu_icon'=>'dashicons-admin-tools',
			'supports' => array( 'title','editor','thumbnail', 'excerpt')
		)
	);
}
// services solution_post_taxonomy
add_action( 'init', 'leisure_services_post_taxonomy');
function leisure_services_post_taxonomy() {
	register_taxonomy(
		'services_cat',  
		'services',                  
		array(
			'hierarchical'          => true,
			'label'                 => 'Services Category',  
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
				'slug'                 => 'services-category', 
				'with_front'    => true 
				)
			)
	);
}

//  Portfolio Custom Post Type
add_action('init','leisure_portfolio_custom_post');
function leisure_portfolio_custom_post() {
	register_post_type( 'portfolio',
		array(
			'labels' =>
				array(
					'name' => __( 'Portfolio', 'leisure'),	
					'singular_name' => __( 'Portfolio', 'leisure'),
					'add_new_item' => __('Add New Portfolio', 'leisure'), 
					'add_new' => __( 'Add New Portfolio', 'leisure'),
					'edit_item' => __( 'Edit Portfolio', 'leisure'),
					'new_item' => __( 'New Portfolio', 'leisure' ),
					'view_item' => __( 'View Portfolio' ),
					'not_found' => __( 'Sorry, we couldn\'t find the Portfolio you are looking for.',  'leisure' ),
				),
			
			'public' => true,
			'menu_icon'=>'dashicons-hammer',
			'supports' => array( 'title','editor','thumbnail', 'excerpt')
		)
	);
}

// Portfilio_post_taxonomy
add_action( 'init', 'leisure_portfolio_post_taxonomy');
function leisure_portfolio_post_taxonomy() {
	register_taxonomy(
		'portfolio_cat',  
		'portfolio',                  
		array(
			'hierarchical'          => true,
			'label'                 => 'Portfolio Category',  
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
				'slug'                 => 'Portfolio-category', 
				'with_front'    => true 
				)
			)
	);
 }
