<?php

// _ Parent's CSS
// ______________

function fschild_scripts_load() {

    if (!is_admin()) {

		wp_enqueue_style( 
			'parent-style', 
			get_template_directory_uri() . '/style.css',
			array(),
			'1.0',
			'screen'
		);
		
	}
}    
add_action( 'wp_enqueue_scripts', 'fschild_scripts_load' );



// _ ACF Blocks
// ______________


// Custom group
 
add_filter( 'block_categories', 'my_block_categories', 10, 2 );
function my_block_categories( $categories, $post ) {

    return array_merge(
        $categories,
        array(
            array(
                'slug' 	=> 'my-blocks',
                'title' => __( 'My Custom Blocks', 'my-acf-blocks' ),
                'icon'  => 'lightbulb',
            ),
        )
    );
}


// Custom blocks

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {
	
	if( function_exists('acf_register_block') ) {
		
		// Testimonial block
		
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial', 'my-acf-blocks'),
            'description'       => __('A custom testimonial block.', 'my-acf-blocks'),
            'category'			=> 'my-blocks',
			'icon'				=> 'format-chat',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'testimonial', 'témoignage' ),
            'render_template'   => get_stylesheet_directory() . '/blocks/testimonial/testimonial.php',
			'enqueue_style' 	=> get_stylesheet_directory_uri() . '/blocks/testimonial/testimonial.css',
		));
		
	}
}
