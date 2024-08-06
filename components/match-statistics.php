<?php
// get match detail by send post request to https://api.tysobongda.org/matchDetail
// and display the match detail
// get the match id from the url
// $match_id = get_field( 'match_id' );
// // // send post request to the api
// $match_statistics_response = wp_remote_post( 'https://api.tysobongda.org/matchStatics', array(
//     'body' => json_encode( array( 'id' => $match_id ) ),
//     'headers' => array(
//         'Content-Type' => 'application/json',
//     ),
// ) );
// // get the response from the api
// $match_stats = json_decode( wp_remote_retrieve_body( $match_statistics_response ) );

if ( $match_stats ) :
    ?>
    <div class="stats-home-away">
        <div class="top-most-heading">
            <h2> Thống kê trận đấu </h2>
        </div>
        <div class="first-row-stats">
            <div class="ball-possession">
                <h3> Kiểm soát bóng </h3>
                <div class="home-possession">
                    <p> <?php echo $match_stats->result->home_stats->ball_possession; ?>% </p>
                </div>
                <div class="possession-icon">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/possession-icon.png'; ?>" alt="">
                </div>
                <div class="away-possession">
                    <p> <?php echo $match_stats->result->away_stats->ball_possession; ?>% </p>
                </div>
            </div>
            <div class="attack-rate">
                <h3> Tỉ lệ tấn công </h3>
                <div class="home-attack">
                    <p> <?php echo $match_stats->result->home_stats->shots; ?> </p>
                </div>
                <div class="attack-icon">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/attack-icon.png'; ?>" alt="">
                </div>
                <div class="away-attack">
                    <p> <?php echo $match_stats->result->away_stats->shots; ?> </p>
                </div>
            </div>
            <div class="dangerous-attack">
                <h3> Tấn công nguy hiểm </h3>
                <div class="home-dangerous-attack">
                    <p> <?php echo $match_stats->result->home_stats->shots_on_target; ?> </p>
                </div>
                <div class="dangerous-attack-icon">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/dangerous-attack-icon.png'; ?>" alt="">
                </div>
                <div class="away-dangerous-attack">
                    <p> <?php echo $match_stats->result->away_stats->shots_on_target; ?> </p>
                </div>
            </div>
        </div>
        <div class="second-row-stats">
            <div class="fouls-number">
                <div class="home-fouls-number">
                    <p> <?php echo $match_stats->result->home_stats->fouls; ?> </p>
                </div>
                <div class="fouls-number-title">
                    <h3> Phạm lỗi </h3>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/fouls-icon.png'; ?>" alt="">
                </div>
                <div class="away-fouls-number">
                    <p> <?php echo $match_stats->result->away_stats->fouls; ?> </p>
                </div>
            </div>
            <div class="yellow-card-number">
                <div class="home-yellow-card">
                    <p> <?php echo $match_stats->result->home_stats->yellow_cards; ?> </p>
                </div>
                <div class="yellow-card-title">
                    <h3> Thẻ vàng </h3>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/yellow-card-icon.png'; ?>" alt="">
                </div>
                <div class="away-yellow-card">
                    <p> <?php echo $match_stats->result->away_stats->yellow_cards; ?> </p>
                </div>
            </div>
            <div class="red-card-number">
                <div class="home-red-card">
                    <p> <?php echo $match_stats->result->home_stats->red_cards; ?> </p>
                </div>
                <div class="red-card-title">
                    <h3> Thẻ đỏ </h3>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/red-card-icon.png'; ?>" alt="">
                </div>
                <div class="away-red-card">
                    <p> <?php echo $match_stats->result->away_stats->red_cards; ?> </p>
                </div>
            </div>

        </div>
        <div class="other-stats-rows">
            <div class="header-shot-on-target">
                <div class="home-shot-on-target">
                    <p> <?php echo $match_stats->result->home_stats->shots_on_target; ?> </p>
                </div>
                <div class="shot-on-target-title">
                    <p> Sút trúng mục tiêu </p>
                </div>
                <div class="away-shot-on-target">
                    <p> <?php echo $match_stats->result->away_stats->shots_on_target; ?> </p>
                </div>
            </div>
            <div class="passes-number">
                <div class="home-passes-number">
                    <p> <?php echo $match_stats->result->home_stats->passes; ?> </p>
                </div>
                <div class="passes-number-title">
                    <p> Số lần chuyền bóng</p>
                </div>
                <div class="away-passes-number">
                    <p> <?php echo $match_stats->result->away_stats->passes; ?> </p>
                </div>
            </div>
            <div class="tackles-number">
                <div class="home-tackles-number">
                    <p> <?php echo $match_stats->result->home_stats->tackles; ?> </p>
                </div>
                <div class="tackles-number-title">
                    <p> Số lần tắc bóng </p>
                </div>
                <div class="away-tackles-number">
                    <p> <?php echo $match_stats->result->away_stats->tackles; ?> </p>
                </div>
            </div>
            <div class="intersection-number">
                <div class="home-intersection-number">
                    <p> <?php echo $match_stats->result->home_stats->interceptions; ?> </p>
                </div>
                <div class="intersection-number-title">
                    <p> Số lần cắt bóng </p>
                </div>
                <div class="away-intersection-number">
                    <p> <?php echo $match_stats->result->away_stats->interceptions; ?> </p>
                </div>
            </div>
            <div class="longball-number">
                <div class="home-longball-number">
                    <p> <?php echo $match_stats->result->home_stats->long_balls; ?> </p>
                </div>
                <div class="longball-number-title">
                    <p> Số lần chuyền dài </p>
                </div>
                <div class="away-longball-number">
                    <p> <?php echo $match_stats->result->away_stats->long_balls; ?> </p>
                </div>
            </div>
        </div>   
    </div>
    
    <?php
else:
    ?>
    <div><p>Tạm thời chưa có dữ liệu về các đội</p></div>
<?php
endif;
?>

    
