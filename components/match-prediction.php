<?php
if($match_predict):
    ?>
    <div class="all-prediction-container">
        <div class="most-top-heading">
            <h2> Dự đoán bàn thắng từ AI </h2>
        </div>
        <div class="all-analysis-container">
        <div class="pre-match-analysis">
            <div class="pre-match-analysis-header">
                <h3> Phân tích trước trận đấu </h3>
            </div>
            <div class="home-team-win">
                <div class="home-team-win-header">
                    <span>Xác suất đội nhà thắng</span>
                    <span><?php echo number_format(100*$match_predict->home_win_prob,2); ?>%</span>
                </div>
                <div class="home-team-win-progress-bar  pred-progress-container">
                    <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_win_prob,2); ?>%"></div>
                    <div class='progress-bar' style="width:<?php echo  number_format(100* (1-$match_predict->home_win_prob),2); ?>%"></div>
                </div>
            </div>
            <div class="both-team-draw">
                <div class="both-team-draw-header">
                    <span>Xác suất hòa</span>
                    <span><?php echo number_format(100*$match_predict->draw_prob,2); ?>%</span>
                </div>
                <div class="both-team-draw-progress-bar pred-progress-container">
                    <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->draw_prob,2); ?>%"></div>
                    <div class='progress-bar' style="width:<?php echo  number_format(100* (1-$match_predict->draw_prob),2); ?>%"></div>
                </div>
            </div>
            <div class="away-team-win">
                <div class="away-team-win-header">
                    <span>Xác suất đội khách thắng</span>
                    <span><?php echo number_format(100*$match_predict->away_win_prob,2); ?>%</span>
                </div>
                <div class="away-team-win-progress-bar pred-progress-container">
                    <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_win_prob,2); ?>%"></div>
                    <div class='progress-bar' style="width:<?php echo  number_format(100* (1-$match_predict->away_win_prob),2); ?>%"></div>
                </div>
            </div>
            <div class="both-team-score">
                <div class="both-team-score-header">
                    <span>Xác suất cả 2 đội ghi bàn</span>
                    <span><?php echo number_format(100*$match_predict->both_team_score_prob,2); ?>%</span>
                </div>
                <div class="both-team-score-progress-bar pred-progress-container">
                    <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->both_team_score_prob,2); ?>%"></div>
                    <div class='progress-bar' style="width:<?php echo  number_format(100 -(1-$match_predict->both_team_score_prob),2); ?>%"></div>
                </div>
            </div>
            <div class="home-away-goal-total">
                <div class="home-goal-total goal-total">
                    <span> Số bàn thắng đội nhà </span>
                    <span> <?php echo $match_predict->home_goal_pred; ?> </span>
                </div>
                <div class="away-goal-total goal-total">
                    <span> Số bàn thắng đội khách </span>
                    <span> <?php echo $match_predict->away_goal_pred; ?> </span>
                </div>
            </div>
        </div>
        <div class="goal-score-predict">
            <div class="goal-score-predict-header">
                <h3> Xác suất ghi bàn (chủ nhà/khách) </h3>
            </div>
            <div class="goal-0-pred goal-pred">
                <div class="goal-0-pred-header goal-pred-header">
                    <span> <?php echo number_format(100*$match_predict->home_goals_probs[0],2); ?>% </span>
                    <span>Xác suất ghi 0 bàn</span>
                    <span> <?php echo number_format(100*$match_predict->away_goals_probs[0],2); ?>%</span>
                </div>
                <div class="goal-0-pred-progress-bar progress-bar-container">
                    <div class="goal-0-home-pred  pred-progress-container ">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_goals_probs[0],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100 -number_format(100*$match_predict->home_goals_probs[0],2); ?>%"></div>
                    </div>
                    <div class="goal-0-away-pred pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_goals_probs[0],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100- number_format(100*$match_predict->away_goals_probs[0],2); ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-1-pred goal-pred">
                <div class="goal-1-pred-header goal-pred-header">
                    <span> <?php echo number_format(100*$match_predict->home_goals_probs[1],2); ?>% </span>
                    <span>Xác suất ghi 1 bàn</span>
                    <span> <?php echo number_format(100*$match_predict->away_goals_probs[1],2); ?>%</span>
                </div>
                <div class="goal-1-pred-progress-bar progress-bar-container">
                    <div class="goal-1-home-pred pred-progress-container ">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_goals_probs[1],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100 -number_format(100*$match_predict->home_goals_probs[1],2); ?>%"></div>
                    </div>
                    <div class="goal-1-away-pred pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_goals_probs[1],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100- number_format(100*$match_predict->away_goals_probs[1],2); ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-2-pred goal-pred">
                <div class="goal-2-pred-header goal-pred-header">
                    <span> <?php echo number_format(100*$match_predict->home_goals_probs[2],2); ?>% </span>
                    <span>Xác suất ghi 2 bàn</span>
                    <span> <?php echo number_format(100*$match_predict->away_goals_probs[2],2); ?>%</span>
                </div>
                <div class="goal-2-pred-progress-bar progress-bar-container">
                    <div class="goal-2-home-pred pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_goals_probs[2],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100 -number_format(100*$match_predict->home_goals_probs[2],2); ?>%"></div>
                    </div>
                    <div class="goal-2-away-pred pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_goals_probs[2],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100- number_format(100*$match_predict->away_goals_probs[2],2); ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-3-pred goal-pred">
                <div class="goal-3-pred-header goal-pred-header">
                    <span> <?php echo number_format(100*$match_predict->home_goals_probs[3],2); ?>% </span>
                    <span>Xác suất ghi 3 bàn</span>
                    <span> <?php echo number_format(100*$match_predict->away_goals_probs[3],2); ?>%</span>
                </div>
                <div class="goal-3-pred-progress-bar  progress-bar-container">
                    <div class="goal-3-home-pred  pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_goals_probs[3],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100 -number_format(100*$match_predict->home_goals_probs[3],2); ?>%"></div>
                    </div>
                    <div class="goal-3-away-pred  pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_goals_probs[3],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100- number_format(100*$match_predict->away_goals_probs[3],2); ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-4-pred goal-pred">
                <div class="goal-4-pred-header goal-pred-header">
                    <span> <?php echo number_format(100*$match_predict->home_goals_probs[4],2); ?>% </span>
                    <span>Xác suất ghi 4 bàn</span>
                    <span> <?php echo number_format(100*$match_predict->away_goals_probs[4],2); ?>%</span>
                </div>
                <div class="goal-4-pred-progress-bar  progress-bar-container">
                    <div class="goal-4-home-pred  pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_goals_probs[4],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100 -number_format(100*$match_predict->home_goals_probs[4],2); ?>%"></div>
                    </div>
                    <div class="goal-4-away-pred  pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_goals_probs[4],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100- number_format(100*$match_predict->away_goals_probs[4],2); ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="goal-5-pred goal-pred">
                <div class="goal-5-pred-header goal-pred-header">
                    <span> <?php echo number_format(100*$match_predict->home_goals_probs[5],2); ?>% </span>
                    <span>Xác suất ghi 5 bàn</span>
                    <span> <?php echo number_format(100*$match_predict->away_goals_probs[5],2); ?>%</span>
                </div>
                <div class="goal-5-pred-progress-bar  progress-bar-container">
                    <div class="goal-5-home-pred  pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->home_goals_probs[5],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100 -number_format(100*$match_predict->home_goals_probs[5],2); ?>%"></div>
                    </div>
                    <div class="goal-5-away-pred  pred-progress-container">
                        <div class='progress-bar' style="width:<?php echo  number_format(100*$match_predict->away_goals_probs[5],2); ?>%"></div>
                        <div class='progress-bar' style="width:<?php echo  100- number_format(100*$match_predict->away_goals_probs[5],2); ?>%"></div>
                    </div>
                </div>
            </div>    
        </div>
        </div>
        
    </div>
    <?php
else:
    ?> 
    <div class="all-prediction-container">
        <div class="most-top-heading">
            <h2> Dự đoán bàn thắng từ AI </h2>
        </div>
        <p>Hiện tại chưa có thông tin </p>
    </div>
    
<?php
endif;
?>
