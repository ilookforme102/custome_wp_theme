<?php
/**
 * blanktheme Theme Customizer
 *
 * @package blanktheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blanktheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blanktheme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blanktheme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'blanktheme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blanktheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blanktheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blanktheme_customize_preview_js() {
	wp_enqueue_script( 'blanktheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'blanktheme_customize_preview_js' );
// Header customizer
function mytheme_customize_register( $wp_customize ) {

    // Add a setting for the header background color
    $wp_customize->add_setting( 'header_background_color', array(
        'default'           => '#3237df', // Default color
        'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
        'transport'         => 'refresh', // Refresh the page on change
    ) );

    // Add a control for the header background color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color_control', array(
        'label'    => __( 'Header Background Color', 'mytheme' ),
        'section'  => 'colors', // Default section for colors
        'settings' => 'header_background_color',
    ) ) );
	// customize header text color
	$wp_customize->add_setting( 'header_text_color', array(
		'default'           => '#ffffff', // Default color
		'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
		'transport'         => 'refresh', // Refresh the page on change
	) );

	// Add a control for the header text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color_control', array(
		'label'    => __( 'Header Text Color', 'mytheme' ),
		'section'  => 'colors', // Default section for colors
		'settings' => 'header_text_color',
	) ) );

}
add_action( 'customize_register', 'mytheme_customize_register' );
function mytheme_customizer_css() {
    $header_background_color = get_theme_mod( 'header_background_color', '#ffffff' );
    ?>
    <style type="text/css">
        #masthead {
            background-color: <?php echo esc_attr( $header_background_color ); ?>;
        }
		#masthead ul li a {
			color: <?php echo esc_attr( get_theme_mod( 'header_text_color', '#ffffff' )."!important" ); ?>;
		}
    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customizer_css' );
// End Header customizer
// Footer customizer
// Add customizing color background for footer 1 and footer 2
function footer_customize_register( $wp_customize ) {

    // Add a section for the footer settings
    // $wp_customize->add_section( 'footer_widget_settings', array(
    //     'title'       => __( 'Footer Widget Settings', 'mytheme' ),
    //     'priority'    => 160,
    // ) );

    // Footer 1 Background Color
    $wp_customize->add_setting( 'footer_1_background_color', array(
        'default'           => '#aebe1b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_1_background_color', array(
        'label'    => __( 'Footer 1 Background Color', 'mytheme' ),
        'section'  => 'colors',
        'settings' => 'footer_1_background_color',
    ) ) );

    // Footer 2 Background Color
    $wp_customize->add_setting( 'footer_2_background_color', array(
        'default'           => '#f8f8f8',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_2_background_color', array(
        'label'    => __( 'Footer 2 Background Color', 'mytheme' ),
        'section'  => 'colors',
        'settings' => 'footer_2_background_color',
    ) ) );

}
add_action( 'customize_register', 'footer_customize_register' );
function footer_customizer_css() {
    $footer1_bg_color = get_theme_mod( 'footer_1_background_color', '#ffffff' );
	$footer2_bg_color = get_theme_mod( 'footer_2_background_color', '#f8f8f8' );
    ?>
    <style type="text/css">
        .footer-one-container {
            background-color: <?php echo esc_attr( $footer1_bg_color ); ?>;
        }
		.footer-two-container {
			background-color: <?php echo esc_attr( $footer2_bg_color ); ?>;
		}
    </style>
    <?php
}
add_action( 'wp_head', 'footer_customizer_css' );
