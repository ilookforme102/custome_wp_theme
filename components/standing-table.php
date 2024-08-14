<?php
$leagues = [
    "Premier League" => 36,
    "Bundesliga"=> 8,
    "Serie A" => 34,
    "La Liga" => 31,
    "Ligue 1" => 11,
    "V.League" => 766,
    "Thai League" => 700];

?>
<div class="standing-table">
<div class="top-table-container">
    <div class= "most-top-heading">
        <h2> Bảng xếp hạng </h2>
    </div>
    <div class="form-container">
        <form id="leagueForm">
            <select id="leagueSelect">
                <?php foreach ($leagues as $leagueName => $leagueId) : ?>
                    <option value="<?php echo $leagueId; ?>"><?php echo $leagueName; ?></option>
                <?php endforeach; ?>    
                <!-- Add more leagues as needed -->
            </select>
        </form>
    </div>
</div>

<div id="standings"></div>
</div>
<script>
    jQuery(document).ready(function($) {
        var defaultLeagueId = '36'; // Set the default league ID here
        $('#leagueSelect').val(defaultLeagueId);

        function loadStandings(leagueId) {
            $.ajax({
                url: 'https://api2.asiasport.com/soccerLeague/ranking?leagueIdList=' + leagueId + '&lang=en_PH',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var currentRound = data.result[0].currRound
                    var leagueName = data.result[0].tableName
                    var teamData = data.result[0].total 
                    var standingTableHeader = `
                        <h2>${leagueName} Vòng: ${currentRound}</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team</th>
                                    <th>Trận</th>
                                    <th>Thắng</th>
                                    <th>Hòa</th>
                                    <th>Thua</th>
                                    <th>B.Thắng</th>
                                    <th>B.Thua</th>
                                    <th>Điểm</th>
                                </tr>
                            </thead>
                            <tbody>
                        `;
                    var standings = teamData.map((team, index) => {
                        return `
                            <tr>
                                <td class="${team.promotionColor}">${index + 1}</td>
                                <td>
                                    <div class="team-name-logo">
                                        <img src="https://asset.asiasport.com/${team.logo}" alt="${team.teamName}" style="width: 30px; height: 30px;">
                                        <p>${team.teamName}</p>
                                    </div>
                                </td>
                                <td>${team.gamesPlayed}</td>
                                <td>${team.gamesWon}</td>
                                <td>${team.gamesDrawn}</td>
                                <td>${team.gamesLost}</td>
                                <td>${team.gamesScored}</td>
                                <td>${team.gamesAgainst}</td>
                                <td>${team.points}</td>
                            </tr>
                        `;
                    });
                    $('#standings').html(standingTableHeader + standings.join('') + '</tbody></table>');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching standings:', error);
                }
            });
        }

        $('#leagueSelect').on('change', function() {
            var leagueId = $(this).val();
            loadStandings(leagueId);
        });

        // Load the default league standings on page load
        loadStandings(defaultLeagueId);
    });
</script>