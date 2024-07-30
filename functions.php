<?php
/**
 * blanktheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blanktheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blanktheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on blanktheme, use a find and replace
		* to change 'blanktheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blanktheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primaryy', 'blanktheme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blanktheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'blanktheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blanktheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blanktheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'blanktheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blanktheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'blanktheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'blanktheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'blanktheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blanktheme_scripts() {
	wp_enqueue_style( 'blanktheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'blanktheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'blanktheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blanktheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// Custom PHP code coded manually
// create a custom post type called 'matches'
function create_posttype() {
 
	register_post_type( 'matches',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Matches' ),
				'singular_name' => __( 'Match' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'matches'),
		)
	);
}
// Registering your Custom Post Type
add_action( 'init', 'create_posttype' );
// Add custom fields to the 'matches' custom post type

add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_66a8523421563',
	'title' => 'Lịch thi đấu',
	'fields' => array(
		array(
			'key' => 'field_66a85276b18db',
			'label' => 'End Date',
			'name' => 'end_date',
			'aria-label' => '',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array(
			'key' => 'field_66a8533db18dd',
			'label' => 'Home logo',
			'name' => 'home_logo',
			'aria-label' => '',
			'type' => 'url',
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
		),
		array(
			'key' => 'field_66a852f2b18dc',
			'label' => 'Home Name',
			'name' => 'home_name',
			'aria-label' => '',
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
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66a85370b18de',
			'label' => 'Home Goal FT',
			'name' => 'home_goal_ft',
			'aria-label' => '',
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
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66a8539cb18df',
			'label' => 'Home goal PT',
			'name' => 'home_goal_pt',
			'aria-label' => '',
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
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66a87ce1df9eb',
			'label' => 'Away logo',
			'name' => 'away_logo',
			'aria-label' => '',
			'type' => 'url',
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
		),
		array(
			'key' => 'field_66a87cf4df9ec',
			'label' => 'Away Name',
			'name' => 'away_name',
			'aria-label' => '',
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
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66a87d00df9ed',
			'label' => 'Away Goal FT',
			'name' => 'away_goal_ft',
			'aria-label' => '',
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
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66a87d57df9ee',
			'label' => 'Away Goal PT',
			'name' => 'away_goal_pt',
			'aria-label' => '',
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
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'matches',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );
function add_custom_fields_to_matches_content( $content ) {
    if ( is_singular( 'matches' ) ) {
        global $post;
        
        // Retrieve custom fields
        $end_date = get_post_meta( $post->ID, 'end_date', true );
        $home_logo = get_post_meta( $post->ID, 'home_logo', true );
        $home_name = get_post_meta( $post->ID, 'home_name', true );
        $home_goal_ft = get_post_meta( $post->ID, 'home_goal_ft', true );
        $home_goal_pt = get_post_meta( $post->ID, 'home_goal_pt', true );
        $away_logo = get_post_meta( $post->ID, 'away_logo', true );

        // Format the custom fields
        $custom_fields = "<div class='match-info'>
			<p>End Date: $end_date</p>
			<p>Home Logo: <img src='$home_logo' alt='$home_name'></p>
			<p>Home Name: $home_name</p>
			<p>Home Goal FT: $home_goal_ft</p>
			<p>Home Goal PT: $home_goal_pt</p>
			<p>Away Logo: <img src='$away_logo'></p>
		</div>";

		// Append the custom fields to the content
		$content = $custom_fields . $content;



		
        
    }

    return $content;
}
add_filter( 'the_content', 'add_custom_fields_to_matches_content' );
