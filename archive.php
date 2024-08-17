<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blanktheme
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="category-sidebar-container container">
	
		<div id='excerpt-cate'>

		
		<?php if ( have_posts() ) : ?>


			<header class="page-header">
				<?php
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				// the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-image">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
                    <div class="entry-content">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-date">
							<?php echo get_the_date(); ?>
						</div>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</div>
                </article>
				<!-- get_template_part( 'template-parts/content', get_post_type() ); -->
				 <?php

			endwhile;

			the_posts_navigation();
		?>
		</div>
		<?php get_sidebar(); ?>
		
		
		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
	</div> 

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
