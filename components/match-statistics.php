<?php
// get match detail by send post request to https://api.tysobongda.org/matchDetail
// and display the match detail
// get the match id from the url
$match_id = get_field( 'match_id' );
// send post request to the api
$match_statistics_response = wp_remote_post( 'https://api.tysobongda.org/matchStatics', array(
    'body' => json_encode( array( 'id' => $match_id ) ),
    'headers' => array(
        'Content-Type' => 'application/json',
    ),
) );
// get the response from the api
$match_stats = json_decode( wp_remote_retrieve_body( $match_statistics_response ) );

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
        <div class="other-stats-rows">
            <div class="short-on-target">
                <div class="header-shot-on-target">
                    <div class="home-shot-on-target">
                        <p> <?php echo $match_stats->result->home_stats->shots_on_target; ?> </p>
                    </div>
                    <div class="shot-on-target-title">
                        
                    </div>
                    <div class="away-shot-on-target">
                        <p> <?php echo $match_stats->result->away_stats->shots_on_target; ?> </p>
                </div>
            </div>
        </div>
        

        
    </div>
<style>
    /* Basic styling for the tabs */
.tabs {
    width: 100%;
    display: block;
}

.tab-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.tab-links li {
    margin: 0;
    padding: 10px 20px;
    background: #f1f1f1;
    cursor: pointer;
}

.tab-links li.active {
    background: #e1e1e1;
}

.tab-links a {
    text-decoration: none;
    color: #000;
}

.tab-content .tab {
    display: none;
    padding: 20px;
    background: #fff;
    border: 1px solid #ddd;
}

.tab-content .tab.active {
    display: block;
}

</style>
 
    <?php
else:
    ?>
    <div><p>Tạm thời chưa có dữ liệu về các đội</p></div>
<?php
endif;
?>

    
