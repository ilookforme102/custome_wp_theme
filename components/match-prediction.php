<?php
if($match_predict):
    ?>
    <div class="match-predict-container">
        <div class="pre-match-analysis">
            <div class="home-team-win">
                <div class="home-team-win-header">
                    <span>Xác suất đội nhà thắng</span>
                    <span><?php echo $match_predict->home_win_prob; ?>%</span>
                </div>
                <div class="home-team-win-progress-bar">
                    <div class='progress-bar' style="width:<?php echo  $match_predict->home_win_prob; ?>%"></div>
                </div>
            </div>
            <div class="both-team-draw">
                <div class="both-team-draw-header">
                    <span>Xác suất hòa</span>
                    <span><?php echo $match_predict->draw_prob; ?>%</span>
                </div>
                <div class="both-team-draw-progress-bar">
                    <div class='progress-bar' style="width:<?php echo  $match_predict->draw_prob; ?>%"></div>
                </div>
            </div>
            <div class="away-team-win">
                <div class="away-team-win-header">
                    <span>Xác suất đội khách thắng</span>
                    <span><?php echo $match_predict->away_win_prob; ?>%</span>
                </div>
                <div class="away-team-win-progress-bar">
                    <div class='progress-bar' style="width:<?php echo  $match_predict->away_win_prob; ?>%"></div>
                </div>
            </div>
            <div class="both-team-score">
                <div class="both-team-score-header">
                    <span>Xác suất cả 2 đội ghi bàn</span>
                    <span><?php echo $match_predict->both_team_score_prob; ?>%</span>
                </div>
                <div class="both-team-score-progress-bar">
                    <div class='progress-bar' style="width:<?php echo  $match_predict->both_team_score_prob; ?>%"></div>
                </div>
            </div>
            <div class="home-goal-total">
                <span> Số bàn thắng đội nhà </span>
                <span> <?php echo $match_predict->home_goal_pred; ?> </span>
            </div>
            <div class="away-go-total">
                <span> Số bàn thắng đội khách </span>
                <span> <?php echo $match_predict->away_goal_pred; ?> </span>
            </div>
        </div>
        <div class="goal-score-predict">
            <div class="goal-0-pred goal-pred">
                <div class="goal-0-pred-header goal-pred-header">
                    <span> <?php echo $match_predict->home_goals_probs[0]; ?>% </span>
                    <span>Xác suất ghi 0 bàn</span>
                    <span> <?php echo $match_predict->away_goals_probs[0]; ?>%</span>
                </div>
                <div class="goal-0-pred-progress-bar  progress-bar-container">
                    <div class="goal-0-home-pred ">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->home_goals_probs[0]; ?>%"></div>
                    </div>
                    <div class="goal-0-away-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->away_goals_probs[0]; ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-1-pred goal-pred">
                <div class="goal-1-pred-header goal-pred-header">
                    <span> <?php echo $match_predict->home_goals_probs[1]; ?>% </span>
                    <span>Xác suất ghi 1 bàn</span>
                    <span> <?php echo $match_predict->away_goals_probs[1]; ?>%</span>
                </div>
                <div class="goal-1-pred-progress-bar progress-bar-container">
                    <div class="goal-1-home-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->home_goals_probs[1]; ?>%"></div>
                    </div>
                    <div class="goal-1-away-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->away_goals_probs[1]; ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-2-pred goal-pred">
                <div class="goal-2-pred-header goal-pred-header">
                    <span> <?php echo $match_predict->home_goals_probs[2]; ?>% </span>
                    <span>Xác suất ghi 2 bàn</span>
                    <span> <?php echo $match_predict->away_goals_probs[2]; ?>%</span>
                </div>
                <div class="goal-2-pred-progress-bar progress-bar-container">
                    <div class="goal-2-home-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->home_goals_probs[2]; ?>%"></div>
                    </div>
                    <div class="goal-2-away-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->away_goals_probs[2]; ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-3-pred goal-pred">
                <div class="goal-3-pred-header goal-pred-header">
                    <span> <?php echo $match_predict->home_goals_probs[3]; ?>% </span>
                    <span>Xác suất ghi 3 bàn</span>
                    <span> <?php echo $match_predict->away_goals_probs[3]; ?>%</span>
                </div>
                <div class="goal-3-pred-progress-bar progress-bar-container">
                    <div class="goal-3-home-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->home_goals_probs[3]; ?>%"></div>
                    </div>
                    <div class="goal-3-away-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->away_goals_probs[3]; ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-4-pred goal-pred">
                <div class="goal-4-pred-header goal-pred-header">
                    <span> <?php echo $match_predict->home_goals_probs[4]; ?>% </span>
                    <span>Xác suất ghi 4 bàn</span>
                    <span> <?php echo $match_predict->away_goals_probs[4]; ?>%</span>
                </div>
                <div class="goal-4-pred-progress-bar progress-bar-container">
                    <div class="goal-4-home-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->home_goals_probs[4]; ?>%"></div>
                    </div>
                    <div class="goal-4-away-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->away_goals_probs[4]; ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-5-pred goal-pred">
                <div class="goal-5-pred-header goal-pred-header">
                    <span> <?php echo $match_predict->home_goals_probs[5]; ?>% </span>
                    <span>Xác suất ghi 5 bàn</span>
                    <span> <?php echo $match_predict->away_goals_probs[5]; ?>%</span>
                </div>
                <div class="goal-5-pred-progress-bar progress-bar-container">
                    <div class="goal-5-home-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->home_goals_probs[5]; ?>%"></div>
                    </div>
                    <div class="goal-5-away-pred">
                        <div class='progress-bar' style="width:<?php echo  $match_predict->away_goals_probs[5]; ?>%"></div>
                    </div>
                </div>

            </div>  
        </div>
    </div>
    <?php
else:
    ?> 
    <p>Hiện tại chưa có thông tin </p>
<?php
endif;
?>
