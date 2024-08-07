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
        <!-- <div class="most-top-heading">
            <h2> Thống kê trận đấu </h2>
        </div> -->
        <div class="first-row-stats">
            <div class="ball-possession">
                
                <div class="home-possession">
                    <p class='home-red'> <?php echo $match_stats->result->home_stats->ball_possession; ?>% </p>
                </div>
                <div class="possession-icon">
                    <span> Kiểm soát bóng </span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/ball-possession.svg'; ?>" alt="">
                </div>
                <div class="away-possession">
                    <p class='home-blue'> <?php echo $match_stats->result->away_stats->ball_possession; ?>% </p>
                </div>
            </div>
            <div class="attack-rate">
                
                <div class="home-attack">
                    <p class='home-red'> <?php echo $match_stats->result->home_stats->shots; ?> </p>
                </div>
                <div class="attack-icon">
                    <span> Tỉ lệ tấn công </span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/ball-attack.svg'; ?>" alt="">
                </div>
                <div class="away-attack">
                    <p class='home-blue'> <?php echo $match_stats->result->away_stats->shots; ?> </p>
                </div>
            </div>
            <div class="dangerous-attack">
                <div class="home-dangerous-attack">
                    <p class='home-red'> <?php echo $match_stats->result->home_stats->shots_on_target; ?> </p>
                </div>
                <div class="dangerous-attack-icon">
                    <span> Tấn công nguy hiểm </span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/dangerous-attack.svg'; ?>" alt="">
                </div>
                <div class="away-dangerous-attack">
                    <p class='home-blue'> <?php echo $match_stats->result->away_stats->shots_on_target; ?> </p>
                </div>
            </div>
        </div>
        <div class="second-row-stats">
            <div class="fouls-number">
                <div class="home-fouls-number">
                    <p class='home-red'> <?php echo $match_stats->result->home_stats->fouls; ?> </p>
                </div>
                <div class="fouls-number-title">
                    <span> Phạm lỗi </span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/fouls.svg'; ?>" alt="">
                </div>
                <div class="away-fouls-number">
                    <p class='home-blue'> <?php echo $match_stats->result->away_stats->fouls; ?> </p>
                </div>
            </div>
            <div class="yellow-card-number">
                <div class="home-yellow-card">
                    <p class='home-red'> <?php echo $match_stats->result->home_stats->yellow_cards; ?> </p>
                </div>
                <div class="yellow-card-title">
                    <span> Thẻ vàng </span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/yellow-card.svg'; ?>" alt="">
                </div>
                <div class="away-yellow-card">
                    <p class='home-blue'> <?php echo $match_stats->result->away_stats->yellow_cards; ?> </p>
                </div>
            </div>
            <div class="red-card-number">
                <div class="home-red-card">
                    <p class='home-red'> <?php echo $match_stats->result->home_stats->red_cards; ?> </p>
                </div>
                <div class="red-card-title">
                    <span> Thẻ đỏ </span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/red-card.svg'; ?>" alt="">
                </div>
                <div class="away-red-card">
                    <p class='home-blue'> <?php echo $match_stats->result->away_stats->red_cards; ?> </p>
                </div>
            </div>

        </div>
        <div class="other-stats-rows">
            <div class="short-on-target-container">
                <div class="short-on-target-header">
                    <div class="home-shot-on-target">
                        <p class='home-red'> <?php echo $match_stats->result->home_stats->shots_on_target; ?> </p>
                    </div>
                    <div class="shot-on-target-title">
                        <p> Sút trúng mục tiêu </p>
                    </div>
                    <div class="away-shot-on-target">
                        <p class='home-blue'> <?php echo $match_stats->result->away_stats->shots_on_target; ?> </p>
                    </div>
                </div>
                <div class="short-on-target-progress">
                    <div class='progress-bar progress-bar-home' style="width:<?php echo 100*$match_stats->result->home_stats->shots_on_target/($match_stats->result->home_stats->shots_on_target+$match_stats->result->away_stats->shots_on_target);?>%"></div>
                    <div class='progress-bar progress-bar-away' style="width:<?php echo 100*$match_stats->result->away_stats->shots_on_target/($match_stats->result->home_stats->shots_on_targe+$match_stats->result->away_stats->shots_on_target);?>%"></div>
                </div>
            </div>
            <div class="passes-number-container">
                <div class="passes-number-header">
                    <div class="home-passes-number">
                        <p class='home-red'> <?php echo $match_stats->result->home_stats->passes; ?> </p>
                    </div>
                    <div class="passes-number-title">
                        <p> Số lần chuyền bóng </p>
                    </div>
                    <div class="away-passes-number">
                        <p class='home-blue'> <?php echo $match_stats->result->away_stats->passes; ?> </p>
                    </div>
                </div>
                <div class="passes-number-progress">
                    <div class='progress-bar progress-bar-home' style="width:<?php echo  100*$match_stats->result->home_stats->passes/($match_stats->result->home_stats->passes+$match_stats->result->away_stats->passes); ?>%"></div>
                    <div class='progress-bar progress-bar-away' style="width:<?php echo  100*$match_stats->result->away_stats->passes/($match_stats->result->home_stats->passes+$match_stats->result->away_stats->passes); ?>%"></div>
                </div>
            </div>
            <div class="tackles-number-container">
                <div class="tackles-number-header">
                    <div class="home-tackles-number">
                        <p class='home-red'>
                            <?php echo $match_stats->result->home_stats->tackles; ?>
                        </p>
                    </div>
                    <div class="tackles-number-title">
                        <p> Số lần phòng thủ </p>
                    </div>
                    <div class="away-tackles-number">
                        <p class='home-blue'>
                            <?php echo $match_stats->result->away_stats->tackles; ?>
                        </p>
                    </div>
                </div>
                <div class="tackles-number-progress">
                    <div class='progress-bar progress-bar-home' style="width:<?php echo  100*$match_stats->result->home_stats->tackles/($match_stats->result->home_stats->tackles+$match_stats->result->away_stats->tackles); ?>%"></div>
                    <div class='progress-bar progress-bar-away' style="width:<?php echo  100*$match_stats->result->away_stats->tackles/($match_stats->result->home_stats->tackles+$match_stats->result->away_stats->tackles); ?>%"></div>
                </div>
            </div>
            <div class="intersection-number-container">
                <div class="intersection-number-header">
                    <div class="home-intersection-number">
                        <p class='home-red'>
                            <?php echo $match_stats->result->home_stats->interceptions; ?>
                        </p>
                    </div>
                    <div class="intersection-number-title">
                        <p> Số lần cắt bóng </p>
                    </div>
                    <div class="away-intersection-number">
                        <p class='home-blue'>
                            <?php echo $match_stats->result->away_stats->interceptions; ?>
                        </p>
                    </div>
                </div>
                <div class="intersection-number-progress">
                    <div class='progress-bar progress-bar-home' style="width:<?php echo  100*$match_stats->result->home_stats->interceptions/($match_stats->result->home_stats->interceptions+$match_stats->result->away_stats->interceptions); ?>%"></div>
                    <div class='progress-bar progress-bar-away' style="width:<?php echo  100*$match_stats->result->away_stats->interceptions/($match_stats->result->home_stats->interceptions+$match_stats->result->away_stats->interceptions); ?>%"></div>
                </div>
            </div>
            <div class="longball-number-container">
                <div class="longball-number-header">
                    <div class="home-longball-number">
                        <p class='home-red'>
                            <?php echo $match_stats->result->home_stats->long_balls; ?>
                        </p>
                    </div>
                    <div class="longball-number-title">
                        <p> Số lần chuyền dài </p>
                    </div>
                    <div class="away-longball-number">
                        <p class='home-blue'>
                            <?php echo $match_stats->result->away_stats->long_balls; ?>
                        </p>
                    </div>
                </div>
                <div class="longball-number-progress">
                    <div class='progress-bar progress-bar-home' style="width:<?php echo  100*$match_stats->result->home_stats->long_balls/($match_stats->result->home_stats->long_balls+$match_stats->result->away_stats->long_balls); ?>%"></div>
                    <div class='progress-bar progress-bar-away' style="width:<?php echo  100*$match_stats->result->away_stats->long_balls/($match_stats->result->home_stats->long_balls+$match_stats->result->away_stats->long_balls); ?>%"></div>
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

    
