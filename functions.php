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
	$labels = array(
		'name'               => _x( 'Matches', 'post type general name', 'your-textdomain' ),
        'singular_name'      => _x( 'Match', 'post type singular name', 'your-textdomain' ),
        'menu_name'          => _x( 'Matches', 'admin menu', 'your-textdomain' ),
        'name_admin_bar'     => _x( 'Match', 'add new on admin bar', 'your-textdomain' ),
        'add_new'            => _x( 'Add New', 'match', 'your-textdomain' ),
        'add_new_item'       => __( 'Add New Match', 'your-textdomain' ),
        'new_item'           => __( 'New Match', 'your-textdomain' ),
        'edit_item'          => __( 'Edit Match', 'your-textdomain' ),
        'view_item'          => __( 'View Match', 'your-textdomain' ),
        'all_items'          => __( 'All Matches', 'your-textdomain' ),
        'search_items'       => __( 'Search Matches', 'your-textdomain' ),
        'parent_item_colon'  => __( 'Parent Matches:', 'your-textdomain' ),
        'not_found'          => __( 'No matches found.', 'your-textdomain' ),
        'not_found_in_trash' => __( 'No matches found in Trash.', 'your-textdomain' )
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array(
            'slug'       => '/', // Empty slug to remove the post type slug
            'with_front' => false
        ),//array( 'slug' => 'matches' ),
		'query_var'             => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);
	register_post_type( 'matches', $args );
	// CPT Options
		
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
			'key' => 'field_66b5b30d21aec',
			'label' => 'Custom Url',
			'name' => 'custom_url',
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
			'key' => 'field_66b078129e6e9',
			'label' => 'Match ID',
			'name' => 'match_id',
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
			'key' => 'field_66c2fb6547e0c',
			'label' => 'Match Status',
			'name' => 'match_status',
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
			'default_value' => 'Kết thúc',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66a8533db18dd',
			'label' => 'Home logo',
			'name' => 'home_logo',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'medium',
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
			'label' => 'Home goal HT',
			'name' => 'home_goal_ht',
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
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'medium',
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
			'label' => 'Away Goal HT',
			'name' => 'away_goal_ht',
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
		)
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
		$end_date = date('d/m/Y', strtotime($end_date));
        $home_name = get_post_meta( $post->ID, 'home_name', true );
        $home_goal_ft = get_post_meta( $post->ID, 'home_goal_ft', true );
        $home_goal_ht = get_post_meta( $post->ID, 'home_goal_ht', true );
		$home_logo = wp_get_attachment_url( get_post_meta($post->ID, 'home_logo',true));
		$away_name = get_post_meta( $post->ID, 'away_name', true );
		$away_goal_ft = get_post_meta( $post->ID, 'away_goal_ft', true );
		$away_goal_ht = get_post_meta( $post->ID, 'away_goal_ht', true );
		$match_status = get_post_meta( $post->ID, 'match_status', true ) ?: 'Kết thúc';
		$away_logo = wp_get_attachment_url( get_post_meta($post->ID, 'away_logo',true));

        // Format the custom fields
        $custom_fields = 
		"<div class='match-info'>"
		."<div class='home-info'>"
			."<img src='$home_logo' alt=''>"
			."<h3>$home_name</h3>"
			."<div class='home-goal'>"
				."<div class='home-goal-ft'>"
					."<span>$home_goal_ft</span>"
				."</div>"
				."<div class='home-goal-ht'>"
					."<span>($home_goal_ht)</span>"
				."</div>"
			."</div>"
		."</div>"
		."<div class='match-info-header-center'>"
			."<p class='match_end-time'>$match_status</p>"
			."<p class='match_end_time-text'>$end_date</p>"
		."</div>"
		."<div class='away-info'>"
			."<div class='away-goal'>"
				."<div class='away-goal-ft'>"
					."<span>$away_goal_ft</span>"
				."</div>"
				."<div class='away-goal-ht'>"
					."<span>($away_goal_ht)</span>"
				."</div>"
			."</div>"
			."<h3>$away_name</h3>"
			."<img src='$away_logo' alt=''>"
		."</div>"
		."</div>";

    

		// Append the custom fields to the content
		$content = $custom_fields . $content;
        
    }

    return $content;
}
add_filter( 'the_content', 'add_custom_fields_to_matches_content' );
// wp enqueue style for assests/css/style.css
add_action( 'wp_enqueue_scripts', 'blanktheme_enqueue_styles' );
function blanktheme_enqueue_styles() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), _S_VERSION );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), _S_VERSION );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom-scripts.js', array(),  _S_VERSION );
}
# Register Footer Widget Area
function footer_widget_init() {
    // Register first footer widget area
    register_sidebar( array(
        'name'          => __( 'Footer Area One', 'blanktheme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your first footer area.', 'blanktheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register second footer widget area
    register_sidebar( array(
        'name'          => __( 'Footer Area Two', 'blanktheme' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your second footer area.', 'blanktheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'footer_widget_init' );
// Custom rewrite rules
// function matches_rewrite_rules() {
//     add_rewrite_rule(
//         '^([^/]+)?$',
//         'index.php?matches=$matches',
//         'top'
//     );
// }
// add_action( 'init', 'matches_rewrite_rules' );

// Add custom URL field to the 'matches' custom post type

function set_custom_permalink_from_acf_field( $data, $postarr ) {
    // Only apply to specific post types, e.g., 'post'. Adjust as needed.
    if ( 'matches' === $data['post_type'] ) {

        // Get the ACF field value
        $custom_slug = get_field('custom_url', $postarr['ID']);

        // If the ACF field has a value, use it as the slug
        if ( !empty($custom_slug) ) {
            $data['post_name'] = sanitize_title($custom_slug);
        }
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'set_custom_permalink_from_acf_field', 10, 2 );
// add_action( 'init', 'flush_rewrite_rules' );
function matches_pre_get_posts( $query ) {
    // Check if the query is the main query and not in admin
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( ! empty( $query->query['name'] ) && ! isset( $query->query['post_type'] ) ) {
            $query->set( 'post_type', array( 'post', 'page', 'matches' ) );
        }
    }
}
add_action( 'pre_get_posts', 'matches_pre_get_posts' );
// Set default post thumbnail
function set_default_thumbnail($html, $post_id, $post_thumbnail_id, $size, $attr) {
    $post_type = get_post_type($post_id);
    
    // Only apply to specific post types, e.g., 'post', 'matches'
    if (empty($html) && in_array($post_type, array('post', 'matches'))) {
        $default_thumbnail_url = get_template_directory_uri() . '/images/default-thumbnail.jpg';
        $html = '<img src="' . $default_thumbnail_url . '" alt="' . get_the_title($post_id) . '" class="wp-post-image" />';
    }

    return $html;
}
add_filter('post_thumbnail_html', 'set_default_thumbnail', 10, 5);

// echo  get_stylesheet_directory_uri();
function create_shortcode_replay(){
    ob_start();
    get_template_part('template-parts/replay-page');
	$ob = ob_get_contents();
	ob_end_clean();
	return $ob;
}
add_shortcode('replay', 'create_shortcode_replay');
function convertUrl($str){
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    $str = str_replace(' ','-',$str);
    return strtolower($str);
}
// function my_pagination_rewrite() {
//     add_rewrite_rule('blog/page/?([0-9]{1,})/?$', 'index.php?category_name=blog&paged=$matches[1]', 'top');
// }
// add_action('init', 'my_pagination_rewrite');