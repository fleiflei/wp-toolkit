<?php
if ( function_exists( 'vc_add_param' ) ) {

// Before VC Init
	add_action( 'vc_before_init', 'vc_before_init_actions' );

	function vc_before_init_actions() {

		// Link your VC elements's folder
		if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {

			vc_set_shortcodes_templates_dir( get_template_directory() . '/vc-elements' );
		}

		require_once( get_template_directory() . '/vc-elements/my_post_slider.php' );
	}

	$attributes = array(
//    'type' => 'dropdown',
		'heading'     => "Column Styles",
		'type'        => 'checkbox',
		'param_name'  => 'my_style',
		'value'       => array(
			"rote Box"         => "red_box",
			'transparente Box' => 'default_box',
			'weisse Box'       => 'white_box',
			'graue Box'        => 'gray_box',
			'hellgraue Box'    => 'gray_light_box',
			'weisse Schrift'   => 'white_font',
		),
		'description' => __( "New style attribute", "sage" ),
	);
	vc_add_param( 'vc_column', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element
	vc_add_param( 'vc_column_inner', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element

	$attributes = array(
		'type'        => 'dropdown',
		'heading'     => "vertikale Ausrichtung",
		'param_name'  => 'my_vertical_align',
		'value'       => array(
			"oben"  => "top",
			'mitte' => 'center',
			'unten' => 'bottom',
		),
		'description' => __( "Greift nur, wenn 'equal height' ebenfalls gewählt ist.", "sage" ),
	);
	vc_add_param( 'vc_column', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element
	vc_add_param( 'vc_column_inner', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element

	$attributes = array(
		'type'        => 'checkbox',
//    'type' => 'dropdown',
		'heading'     => "Row Styles",
		'param_name'  => 'my_style',
		'value'       => array(
			"Schatten oben"  => "shadow_top",
			"Schatten unten" => "shadow_bottom",
		),
		'description' => __( "New style attribute", "sage" ),
	);
	vc_add_param( 'vc_row', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element
	vc_add_param( 'vc_row_inner', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element

	add_action( 'vc_after_init', function () {
		$newParamData = array(
			'type'        => 'checkbox',
			'heading'     => __( 'Equal height', 'js_composer' ),
			'param_name'  => 'equal_height',
			'description' => __( 'If checked columns will be set to equal height.', 'js_composer' ),
			'value'       => 'yes',
		);

		vc_update_shortcode_param( 'vc_row', $newParamData );
	} );
}
