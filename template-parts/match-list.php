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
    <ul class="match_list">
        <?php
        while ( $matches->have_posts() ) :
            $matches->the_post();
            $home_logo = get_field( 'home_logo' );
            $home_name = get_field( 'home_name' );
            $away_logo = get_field( 'away_logo' );
            $away_name = get_field( 'away_name' );
            $end_date = get_field( 'end_date' );
            ?>
            <a href="<?php the_permalink(); ?>">
            <li class="match">
                <div class="match_date"><?php echo esc_html( $end_date ); ?></div>
                <div class="match_teams">
                    <div class="match_team
                    <?php
                    if ( empty( $home_logo ) ) {
                        echo 'no_logo';
                    }
                    ?>
                    ">
                    <?php
                    if ( ! empty( $home_logo ) ) :
                        ?>
                        <img src="<?php echo esc_url( $home_logo ); ?>" alt="<?php echo esc_attr( $home_name ); ?>">
                        <?php
                    endif;
                    ?>
                    <span><?php echo esc_html( $home_name ); ?></span>
                </div>
                <div class="match_team
                <?php
                if ( empty( $away_logo ) ) {
                    echo 'no_logo';
                }
                ?>
                ">
                <?php
                if ( ! empty( $away_logo ) ) :
                    ?>
                    <img src="<?php echo esc_url( $away_logo ); ?>" alt="<?php echo esc_attr( $away_name ); ?>">
                    <?php
                endif;
                ?>
                <span><?php echo esc_html( $away_name ); ?></span>
            </div>
        </div>
    </li>
<?php endwhile; ?>
</ul>
<?php
wp_reset_postdata();
endif;
?>

