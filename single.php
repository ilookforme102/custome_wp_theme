<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blanktheme
 */

get_header();
?>
	
	<main id="primary" class="site-main">
	<div class="related-post-and-sidebar container bg-grey top-padding-20">
	<div class="related-post">
		
	
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'blanktheme' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blanktheme' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		endwhile; // End of the loop.
		?>
	</div>
	</div> <!-- .main-content-sidebar-container -->
	</main><!-- #main -->
	<?php //get_sidebar(); ?>
	
<?php
// get_sidebar();
get_footer();
