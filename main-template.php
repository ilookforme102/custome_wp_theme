<?php
/**
 * Template Name: Main Template
 * Template Post Type: post, page
 *
 * @package blanktheme
 */
?>
<?php
get_header();
?>
    <main id="primary" class="site-main">
		<div class="match_list_container container">
			<?php include get_template_directory().'/components/match-list.php'; ?>
		</div>
		<div class="site-main-content">
			<div class="related-post-and-sidebar container">
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

                    if ( $query->have_posts() ) :
                        include get_template_directory().'/components/related_post.php';
                        
                        // get_sidebar();
                        // the_posts_navigation();

                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;

                // Restore original Post Data
                // wp_reset_postdata();
                    ?>
             <!-- <div class='editor-content'> -->
            <?php
            // if ( have_posts() ) :
            //     while ( have_posts() ) : the_post();
            //         the_content(); // Outputs the content of the current page or post
            //     endwhile;
            // endif;
            ?>
            <!-- </div> -->
			</div> <!-- .related-post-and-sidebar -->
            
            
		</div> <!-- .site-main-content -->
    </main><!-- #main -->
<?php
// get_sidebar();
get_footer();