<?php
// get match detail by send post request to https://api.tysobongda.org/matchDetail
// and display the match detail
// // get the match id from the url
// $match_id = get_field( 'match_id' );
// // send post request to the api
// $match_detail_response = wp_remote_post( 'https://api.tysobongda.org/matchDetail', array(
//     'body' => json_encode( array( 'id' => $match_id ) ),
//     'headers' => array(
//         'Content-Type' => 'application/json',
//     ),
// ) );
// // get the response from the api
// $match_detail = json_decode( wp_remote_retrieve_body( $match_detail_response ) );
// // display the match detail
// date_default_timezone_set('Asia/Bangkok'); // GMT+7 timezone
// $root_domain_str = "https://img.thesports.com";

// Convert Unix timestamp to date and time format
// check if
if ( $match_detail->result ) :
    $league = $match_detail->result->competition_name;
    $home_team = $match_detail->result->home_name;
    $away_team = $match_detail->result->away_name;
    // Convert match time from Unix time to date time
    $match_time =  $match_detail->result->match_time;
    $match_time = date('Y-m-d H:i', $match_detail->result->match_time);
    ?>
    <div class="match-detail">
        <div class="match-detail-header">
            <h3> <?php echo $match_detail->result->competition_name; ?> </h2>
            <p> <?php echo $match_time; ?> </p>
            <p> <?php echo $match_detail->result->venue_name; ?> </p>
        </div>
        <div class="match-detail-content">
            <div class="home-team">
                <img src="<?php echo $root_domain_str . $match_detail->result->home_logo; ?>" alt="">
                <h3> <?php echo $match_detail->result->home_name; ?> </h3>
            </div>

            <div class="away-team">
                <img src="<?php echo $root_domain_str . $match_detail->result->away_logo; ?>" alt="">
                <h3> <?php echo $match_detail->result->away_name; ?> </h3>
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