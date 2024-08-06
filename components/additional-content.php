<?php
$match_id = get_field( 'match_id' );
// send post request to the api
// data for statistics
$match_statistics_response = wp_remote_post( 'https://api.tysobongda.org/matchStatics', array(
    'body' => json_encode( array( 'id' => $match_id ) ),
    'headers' => array(
        'Content-Type' => 'application/json',
    ),
) );
// get the response from the api
$match_stats = json_decode( wp_remote_retrieve_body( $match_statistics_response ));
////////////////////////////
// data for h2h/////////////
////////////////////////////
$match_h2h_response = wp_remote_post( 'https://api.tysobongda.org/matchH2H', array(
    'body' => json_encode( array( 'id' => $match_id ) ),
    'headers' => array(
        'Content-Type' => 'application/json',
    ),
) );
$match_h2h = json_decode( wp_remote_retrieve_body($match_h2h_response) );

//////////////////////////////////////
//////// data for match lineup////////
//////////////////////////////////////
$match_lineup_response = wp_remote_post( 'https://api.tysobongda.org/matchLineup', array(
    'body' => json_encode( array( 'id' => $match_id ) ),
    'headers' => array(
        'Content-Type' => 'application/json',
    ),
) );
$match_lineup = json_decode( wp_remote_retrieve_body( $match_lineup_response ) );
/////////////////////////////////
////data from match prediction///
/////////////////////////////////
$match_prediction_response = wp_remote_post( 'https://api.tysobongda.org/matchPredict', array(
    'body' => json_encode( array( 'id' => $match_id ) ),
    'headers' => array(
        'Content-Type' => 'application/json',
    ),
) );
$match_predict = json_decode( wp_remote_retrieve_body( $match_prediction_response ) );
/////////////////////////
////data for match detail
/////////////////////////
$match_detail_response = wp_remote_post( 'https://api.tysobongda.org/matchDetail', array(
    'body' => json_encode( array( 'id' => $match_id ) ),
    'headers' => array(
        'Content-Type' => 'application/json',
    ),
) );
// get the response from the api
$match_detail = json_decode( wp_remote_retrieve_body( $match_detail_response ) );
// display the match detail
date_default_timezone_set('Asia/Bangkok'); // GMT+7 timezone
$root_domain_str = "https://img.thesports.com";
?>
<?php include get_template_directory().'/components/match-detail.php'; ?>

<div class="tabss">
    <ul class="tab-linkss">
        <li class="actives" data-tab="statistics-tab">Thống kê trận đấu</li>
        <li data-tab="match-h2h-tab">Lịch sử đối đầu</li>
        <li data-tab="lineup-tab">Đội hình ra sân</li>
    </ul>

    <div class="tab-contents">
        <div id="statistics-tab" class="tabs actives">
            <?php include get_template_directory().'/components/match-statistics.php'; ?>
        </div>
        <div id="match-h2h-tab" class="tabs">
            <?php include get_template_directory().'/components/match-h2h.php'; ?>
        </div>
        <div id="lineup-tab" class="tabs">
            <?php include get_template_directory().'/components/match-lineup.php'; ?>
        </div>
    </div>
</div>
<?php include get_template_directory().'/components/match-prediction.php'; ?>