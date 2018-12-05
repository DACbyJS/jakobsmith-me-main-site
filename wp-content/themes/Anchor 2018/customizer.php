<?php



function anchor_customize_register($wp_customize){



    $wp_customize->add_section(

	'header_section',

		array( 

			'title' => __('Logo','anchor'), 

			'capability' => 'edit_theme_options', 

			'description' =>  __('Allows you to edit your theme\'s layout.','anchor')

			)

	);



	$wp_customize->add_section(

		'sm_section', 

		array( 

			'title' =>  __('Social Media','anchor'), 

			'capability' => 'edit_theme_options', 

			'description' =>  __('Allows you to set your social media URLs','anchor')

			)

	);



	$socials = array('twitter','facebook','google-plus','instagram','pinterest','linkedin','vimeo','youtube', 'github', 'codepen');



	for($i=0;$i<count($socials);$i++) {

		$name = str_replace('-',' ',ucfirst($socials[$i]));

		$wp_customize->add_setting('anchor_'.$socials[$i], array(

	    'capability' => 'edit_theme_options',

	    'type'       => 'theme_mod',

	    'sanitize_callback' => 'anchor_sanitize_customizer_val',

		));

		$wp_customize->add_control( new WP_Customize_Control(

			$wp_customize,

			'anchor_'.$socials[$i],

			array(

			    'settings' => 'anchor_'.$socials[$i],

			    'label'    => sprintf( __( '%s URL' ,'anchor' ), $name ),

			    'section'  => 'sm_section',

			    'type'     => 'text',

			)

		));

	}



	$wp_customize->add_section(

		'featured_text_section', 

		array( 

			'title' =>  __('Featured Text','anchor'), 

			'capability' => 'edit_theme_options', 

			'description' =>  __('Allows you to set your footer settings','anchor')

		)

	);



	$wp_customize->add_setting(

		'anchor_hometext',

		array(

		    'capability' => 'edit_theme_options',

		    'type'       => 'theme_mod',

		    'sanitize_callback' => 'anchor_sanitize_customizer_val',

		)

	);



	$wp_customize->add_control( new WP_Customize_Control(

		$wp_customize,

		'anchor_hometext',

		array(

		    'settings' => 'anchor_hometext',

		    'label'    => __('Featured Text','anchor'),

		    'section'  => 'featured_text_section',

		    'type'     => 'textarea', 

		)

	));



	$wp_customize->add_section(

		'copyright_section', 

		array( 

			'title' =>  __('Copyright Text','anchor'), 

			'capability' => 'edit_theme_options', 

			'description' =>  __('Allows you to set your footer settings','anchor')

		)

	);



	$wp_customize->add_setting(

		'anchor_copyright',

		array(

    		'capability' => 'edit_theme_options',

    		'type' => 'theme_mod',

    		'sanitize_callback' => 'anchor_sanitize_customizer_val',

		)

	);



	$wp_customize->add_control( new WP_Customize_Control(

		$wp_customize,

		'anchor_copyright',

		array(

		    'settings' => 'anchor_copyright',

		    'label'    => __('Copyright Text','anchor'),

		    'section'  => 'copyright_section',

		    'type'     => 'textarea',

		)

	));



}

add_action('customize_register', 'anchor_customize_register');



function anchor_setting($name, $default = false) {

	return get_theme_mod( $name, $default );

}



function anchor_sanitize_customizer_val($value){

	if (!filter_var($value, FILTER_VALIDATE_URL) === false) //check if URL

		return esc_url_raw($value);

	else

		return sanitize_text_field($value);

}