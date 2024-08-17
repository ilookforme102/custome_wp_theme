<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blanktheme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'blanktheme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				//printf( esc_html__( 'Proudly powered by %s', 'blanktheme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				//printf( esc_html__( 'Theme: %1$s by %2$s.', 'blanktheme' ), 'blanktheme', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
		<div class="footer-widget">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-one-container">
				<!--<div class="row">-->
					<div id="footer-widget-area-one" class="widget-area container">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div><!-- #footer-widget-area-one -->
				<!--</div>-->
			</div>
				
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="footer-two-container">
					<!--<div class="row">-->
					<div id="footer-widget-area-two" class="widget-area container">
					
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<!--</div>	-->
				</div><!-- #footer-widget-area-two -->

			<?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
