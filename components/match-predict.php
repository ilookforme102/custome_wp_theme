
<?php
$args_pred = array(
    'posts_per_page' => -1,
    'post_type' => 'matches',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);
$matches = new WP_Query( $args_pred );
// get all matches from the 'matches' custom post type and display them in a list
if ( $matches->have_posts() ) :
    ?>
    
    <div class="match-predict">
        <div class= "most-top-heading">
            <h2> Nhận định dự đoán </h2>
        </div>
        <div class="top-predict-container">
        <?php
            while ( $matches->have_posts() ) :
                // Get all post from query
                $matches->the_post();
                if ( $matches->current_post == 0 ) {
                    ?>
                    
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                    <div class="first-predict-content">
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    </div>
                    <?php
                }
            endwhile;
            ?>
        </div>
        <div class="bottom-predict-container">
        <?php
            while ( $matches->have_posts() ) :
                // Get all post from query
                $matches->the_post();
                if ( $matches->current_post > 0 ) {
                    ?>
                <div class="bottom-predict-match">
                    
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                    <div class="bottom-predict-content">
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    </div>
                </div>
                    <?php
                }
            endwhile;
            ?>
        </div>


    </div>

<?php
else:
    ?>
    <div></div>
<?php
wp_reset_postdata();
endif;

?>

