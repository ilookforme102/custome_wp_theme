<?php
if($match_h2h):
    // echo $match_h2h->h2h;
    if($match_h2h->h2h):
        $all_h2h_matches  = [];
        foreach($match_h2h->h2h as $h2h_league_matches):
            foreach($h2h_league_matches->matches as $h2h_matche):
                $all_h2h_matches[] = [
                    'home_team' => $h2h_matche->home_name,
                    'away_team' => $h2h_matche->away_name,
                    'home_logo' => $root_domain_str . $h2h_matche->home_logo,
                    'away_logo' => $root_domain_str . $h2h_matche->away_logo,
                    'home_score_ft' => $h2h_matche->home_scores[0],
                    'home_score_ht' => $h2h_matche->home_scores[1],
                    'away_score_ht' => $h2h_matche->away_scores[1],
                    'away_score_ft' => $h2h_matche->home_scores[0],
                    'match_time' => $h2h_matche->match_time,
                    'match_time_str' => date('Y-m-d', $h2h_matche->match_time),
                    'league' => $h2h_league_matches->competition_name,
                    'league_logo' => $root_domain_str . $h2h_league_matches->competition_logo,
                ];
            endforeach;
        endforeach;
        // $all_h2h_matches = array_slice($all_h2h_matches, 0, 5);
        // get 5 most recent matches order by match time
        usort($all_h2h_matches, function($a, $b) {
            return $b['match_time'] - $a['match_time'];
        });
        $all_h2h_matches = array_slice($all_h2h_matches, 0, 5);
        // print_r($all_h2h_matches);
        $home_team = $match_detail->result->home_name;
        $away_team = $match_detail->result->away_name;
        $home_team_logo = $root_domain_str . $match_detail->result->home_logo;
        $away_team_logo = $root_domain_str . $match_detail->result->away_logo;
        // Count how many times the home team win, lose, draw
        $home_win = 0;
        $home_lose = 0;
        $home_draw = 0;
        foreach($all_h2h_matches as $h2h_match):
            if($h2h_match['home_team'] == $home_team):
                if($h2h_match['home_score_ft'] > $h2h_match['away_score_ft']):
                    $home_win++;
                elseif($h2h_match['home_score_ft'] < $h2h_match['away_score_ft']):
                    $home_lose++;
                else:
                    $home_draw++;
                endif;
            else:
                if($h2h_match['home_score_ft'] < $h2h_match['away_score_ft']):
                    $home_win++;
                elseif($h2h_match['home_score_ft'] > $h2h_match['away_score_ft']):
                    $home_lose++;
                else:
                    $home_draw++;
                endif;
            endif;
        endforeach;
        ?>
        <!-- <div> -->
            <div class="h2h-container">
                
                <div class="h2h-content-header">
                    <div class="h2h-content-header-left">
                        <img src="<?php echo $home_team_logo; ?>" alt="">
                        <div class="h2h-header-home-content">
                            <p> <?php echo $home_win; ?> </p>
                            <p>Thắng</p>
                        </div>
                    </div>
                    <div class="h2h-content-header-center">
                        <div class="h2h-header-home-content">
                            <p> <?php echo $home_draw; ?> </p>
                            <p>Hòa</p>
                        </div>
                    </div>
                    <div class="h2h-content-header-right">
                        <img src="<?php echo $away_team_logo; ?>" alt="">
                        <div class="h2h-header-home-content">
                            <p> <?php echo $home_lose; ?> </p>
                            <p>Thắng</p>
                        </div>
                    </div>
                </div>
                <div class="h2h-content-footer">
                <?php foreach($all_h2h_matches as $h2h_match): ?>
                    <div class="h2h-content-footer-body">
                        
                            <div class="h2h-content-footer-body-left">
                                <p> <?php echo $h2h_match['match_time_str']; ?> </p>
                            </div>
                            <div class="h2h-content-footer-body-center">
                                <img src="<?php echo $h2h_match['league_logo']; ?>" alt="">
                                <p> <?php echo $h2h_match['league']; ?> </p>
                            </div>
                            <div class="h2h-content-footer-body-right">
                                <p> <?php echo $h2h_match['home_team']; ?> </p>
                                <p> <?php echo $h2h_match['away_team']; ?> </p>
                            </div>
                            <div class="h2h-content-footer-body-rightest-ft">
                                <p> <?php echo $h2h_match['home_score_ft']; ?></p>
                                <p> <?php echo $h2h_match['away_score_ft']; ?></p>
                            </div>
                            <div class="h2h-content-footer-body-rightest-ht">
                                <p>(<?php echo $h2h_match['home_score_ht']; ?>) </p>
                                <p>(<?php echo $h2h_match['away_score_ht']; ?>)</p>
                            </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>    
        <!-- </div> -->
        <?php
    else:
        ?>
            <p>Không có thông tin đối đầu</p>
        <?php
    endif;
else:
    ?>
    <div class="h2h-container">
        <p>Không có thông tin đối đầu</p>
    </div>
    <?php
endif;
?>

        

        
    

        