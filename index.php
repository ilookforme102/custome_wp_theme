<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blanktheme
 */
get_header();
?>
    <main id="primary" class="site-main">
		<div class="match_list_container">
			<?php include get_template_directory().'/template-parts/match-list.php'; ?>

		</div>
		<div class="site-main-content">
        <?php
        
        $args = array(
            'posts_per_page' => 11,
			'post_type' => 'post',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
        );
        $query = new WP_Query( $args );
		
		// 11 posts get displayed on the home page, 1 post will put inside a div with thumbnail, title and short content, 7 posts will be on the right side with title only, 3 last post will be at the bottom with thubnails
		// how to do this?

		if ( $query->have_posts() ) :
			include get_template_directory().'/template-parts/related_post.php';
			get_sidebar();
			// the_posts_navigation();

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;

        // Restore original Post Data
        wp_reset_postdata();
        ?>
		</div>
    </main><!-- #main -->
<?php
// get_sidebar();
get_footer();