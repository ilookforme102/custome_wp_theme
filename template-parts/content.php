<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blanktheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		//if ( 'matches' === get_post_type() || 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				if ( !is_singular('matches') ):
				blanktheme_posted_on();
				blanktheme_posted_by();
				endif;
				?>
			</div><!-- .entry-meta -->
		<?php //endif; ?>
	</header><!-- .entry-header -->

	<?php //blanktheme_post_thumbnail(); ?>

	<div class="entry-content">
		<div id='single-post-content-container' class="main-content-container">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blanktheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blanktheme' ),
				'after'  => '</div>',
			)
		);
		?>
		
	    </div> <!-- .main-content-container -->
		<?php
		// if matches post type, display the match prediction
		if ( 'matches' === get_post_type()):
			include get_template_directory().'/components/additional-content.php'; 
		endif;
		?>
	</div>
	
	<!-- .entry-content -->
	<footer class="entry-footer">
		<?php blanktheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><?php //the_ID(); ?> 
