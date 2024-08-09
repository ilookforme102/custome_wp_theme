
<?php
// get all matches from the 'matches' custom post type and display them in a list
$args = array(
    'post_type' => 'matches',
    'posts_per_page' => -1,
    'meta_key' => 'end_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
);
$matches = new WP_Query( $args );
if ( $matches->have_posts() ) :
    ?>
    <div class="match_list">
        <?php
        while ( $matches->have_posts() ) :
            $matches->the_post();
            $home_logo = get_field( 'home_logo' );
            $home_name = get_field( 'home_name' );
            $home_goal_ht = get_field('home_goal_ht');
            $home_goal_ft = get_field('home_goal_ft');
            $away_goal_ht = get_field('away_goal_ht');
            $away_goal_ft = get_field('away_goal_ft');
            $away_logo = get_field( 'away_logo' );
            $away_name = get_field( 'away_name' );
            $end_date = get_field( 'end_date' );
            $matches_url = get_permalink();
            ?>
            
            <div class="match">
                <a href="<?php echo $matches_url; ?>">
                <div class="match_end">
                    <p>Kết thúc</p>
                    <p class="match_end_text"><?php echo date( 'd/m', strtotime( $end_date ) ); ?></p>
                </div>
                <div class= "home_info">
                    <div class="home_logo">
                        <img src="<?php echo $home_logo; ?>" alt="<?php echo $home_logo; ?>" >
                    </div>
                    <div class="home_name">
                        <span><?php echo $home_name; ?></span>
                    </div>
                    <div class="home_goal">
                        <div class="home_goal_ft">
                            <span><?php echo $home_goal_ft; ?></span>
                        </div>
                        <div class="home_goal_ht">
                            <span>(<?php echo $home_goal_ht; ?>)</span>
                        </div>
                    </div>
                </div>
                <div class="away_info">
                    <div class="away_logo">
                        <img src="<?php echo $away_logo; ?>" alt="<?php echo $away_logo; ?>" >
                    </div>
                    <div class="away_name">
                        <span><?php echo $away_name; ?></span>
                    </div>
                    <div class="away_goal">
                        <div class="away_goal_ft">
                            <span><?php echo $away_goal_ft; ?></span>
                        </div>
                        <div class="away_goal_ht">
                            <span>(<?php echo $away_goal_ht; ?>)</span>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- </a> -->
<?php endwhile; ?>
</div>
<?php


wp_reset_postdata();
endif;
?>

