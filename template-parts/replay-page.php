<style>
    .replayWrap{
        display:flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    .replayItem{
        display:flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 32.33334%;
        background:#1c1c1c;
        color:#fff!important;
        text-decoration: none;
    }
    .teamA,.teamB{
        width:45%;
        font-size: 14px;
        margin: 20px 0;
    }
    .vs {
        width: 10%;
        background: #21284c;
        border-radius: 3px;
    }
    .playBtn{
        width:100%;
        background:#cb2730;
        font-size: 14px;
        padding:5px 0;
        font-weight: bold;
    }
    .matchTime{
        width:100%;
        font-size:12px;
        background:#67421563;
    }
    @media(max-width:992px){
        .replayItem{
            width:48%;
        }
    }
    @media(max-width:665px){
        .replayItem{
            width:100%;
        }
    }
</style>
<?php
 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.5goall.com/replay',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$matches = json_decode($response);
?>

<div class="replayWrap">
<?php
    $path = explode('/',$_SERVER['REQUEST_URI']);
    if(isset($path[3]) && !empty($path[3])){
        
        
        $string = explode('-',$path[3]);
        $streamer_id = end($string);
        $match_id = $string[count($string)-2];
        
        // echo $match_id;
         foreach($matches->value->result as $i=>$match){
            if($match->match_id == $match_id) $current_match = $matches->value->result[$i];
        }
        $title = "<header class='entry-header'><h1 class='entry-title'>Xem lại trận đấu ".$current_match->home_team_name." vs ".$current_match->away_team_name." ngày ".date('d/m/Y',$current_match->match_time)."</h1></header>";
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.5goall.com/replay/'.$match_id.'/'.$streamer_id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
        ));    
        $replay = json_decode(curl_exec($curl)); 
        curl_close($curl);
        ?>
        <?php echo $title; ?>
        <script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script>
        <video id="video" width="100%" height="500" controls playinsline></video>
        <script>
          var video = document.getElementById('video');
          var videoSrc = "<?php echo $replay[0]->url; ?>";
          if (Hls.isSupported()) {
            var hls = new Hls();
            hls.loadSource(videoSrc);
            hls.attachMedia(video);
          }
          else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = videoSrc;
          }
        </script>
        <?php
    }else{
        //print_r($matches);

         foreach($matches->value->result as $match){
           // echo $match->home_team_logo;
         ?>
            <a class="replayItem" href="<?php echo get_permalink().convertUrl($match->home_team_name).'-'.convertUrl($match->away_team_name).'-'. $match->match_id.'-'.$match->streamer_id ?>/">
                    <div class="matchTime"><?php echo date("d/m/Y H:i:s",$match->match_time) ?></div>
                    <div class="teamA">
                        <img width="45" height="45" src="<?php echo $match->home_team_logo ?>">
                        <div><?php echo $match->home_team_name ?></div> 
                    </div>
                    <div class="vs">vs</div>
                    <div class="teamB">
                        <img width="45" height="45" src="<?php echo $match->away_team_logo ?>">
                        <div><?php echo $match->away_team_name ?></div>
                    </div>
                    <div class="playBtn">XEM NGAY</div>
            </a>
    <?php 
         }
    }
    ?>
</div>
