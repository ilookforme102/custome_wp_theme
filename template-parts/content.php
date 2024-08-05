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

		if ( 'matches' === get_post_type() || 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				blanktheme_posted_on();
				blanktheme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php //blanktheme_post_thumbnail(); ?>

	<div class="entry-content">
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
		<?php
		// if matches post type, display the match prediction
		if ( 'matches' === get_post_type()):
			include get_template_directory().'/components/match-detail.php';
			include get_template_directory().'/components/match-statistics.php';
			?>
			<div class="tabs all-tabs-container">
				<div class="tab-links-container">
					<ul class="tab-links">
						<li class="active"><a href="#statistics-home-away">Thống kê trận đấu</a></li>
						<li><a href="#matchH2H-home-away">Thông số đối đầu</a></li>
						<li><a href="#lineup-home-away">Đội hình ra sân</a></li>
					</ul>
				</div>
				<div class="tab-content content-container">
					<div id="stats-home-away" class="tab active">
						<?php include get_template_directory().'/components/match-statistics.php'; ?>
					</div>
					<div id="matchH2H-home-away" class="tab">
						<?php include get_template_directory().'/components/match-h2h.php'; ?>
					</div>
					<div id="lineup-home-away" class="tab">
						<?php include get_template_directory().'/components/match-lineup.php'; ?>
					</div>
				</div>
			</div>
	<?php
		endif;
		?>
	    
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php blanktheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>post<?php the_ID(); ?> 
