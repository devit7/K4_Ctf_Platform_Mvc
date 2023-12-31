<?php
include('../component/check_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/scoreboard.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div>
        <?php
        include '../component/navbar.php';
        ?>
    </div>

    <!-- Content -->
    <div class="container-chall ">
        <div class="vertical-text ">
            <h1>Scoreboard</h1>
        </div>
        <!-- Content Main -->
        <div class="kotak-main">
            <div class="kotak-1">
                <div class="lead">
                    <h1>
                        / Leaderboard /
                    </h1>
                </div>
                <!-- kotak score -->
                <div class="table-score">
                    <table>
                        <tr>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>Score</th>
                        </tr>
                        <?php
                        require_once '../model/teams.php';
                        $teams = new Teams();
                        $dataTeams = $teams->laderboardAll();
                        $no = 1;
                        foreach ($dataTeams as $team) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $team['team_name'] ?></td>
                                <td><?= $team['total_points'] ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>

            </div>
            <!-- kotak graph dan  -->
            <div class="kotak-2">
                <div class="con-2">
                    <div class="fb">
                        <h1>/ First Blood /</h1>
                    </div>
                    <div class="table-firstblod">
                        <table>
                            <tr>
                                <th>Team</th>
                                <th>Chall</th>
                                <th>Category</th>
                                <th>Time</th>
                            </tr>
                            <?php
                            $dataFirstB = $teams->firstBloodAll();
                            foreach ($dataFirstB as $fb) :
                            ?>
                                <tr>
                                    <td><?= $fb['team_name'] ?></td>
                                    <td><?= $fb['challenge_name'] ?></td>
                                    <td><?= $fb['category_name'] ?></td>
                                    <td><?= $fb['first_blood_time'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </table>
                    </div>
                </div>
                <div class="con-3">
                    <div class="jdl">
                        <h1>/ Team Stats /</h1>
                    </div>
                    <?php
                    $id = $_SESSION['id_user'];
                    $datanamateam = $teams->listTeambyIdUser($id);
                    $totalSolved = $teams->totalSolvedByUserId();
                    ?>
                    <div class="team-stats">
                        <div class="st-team">
                            <?php if (!empty($datanamateam) && isset($datanamateam[0]['nama_team'])) : ?>
                                <p class="tm">Team Name: <?= $datanamateam[0]['nama_team'] ?></p>
                            <?php else : ?>
                                <p class="tm">Team Name: N/A</p>
                            <?php endif; ?>

                            <?php if (!empty($totalSolved) && isset($totalSolved[0]['total_solved'])) : ?>
                                <p class="sd">Total Solved: <?= $totalSolved[0]['total_solved'] ?></p>
                            <?php else : ?>
                                <p class="sd">Total Solved: 0</p>
                            <?php endif; ?>
                        </div>
                        <div class="sol-team">
                            <table>
                                <tr>
                                    <th>User</th>
                                    <th>Chall</th>
                                    <th>Category</th>
                                    <th>Time</th>
                                </tr>
                                <?php
                                $dataStatTeam = $teams->statTeamByUserId();
                                foreach ($dataStatTeam as $stat) :
                                ?>
                                    <tr>
                                        <td><?= $stat['nama_user'] ?></td>
                                        <td><?= $stat['Challname'] ?></td>
                                        <td><?= $stat['Category'] ?></td>
                                        <td><?= $stat['Time'] ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="link-myteam" class="Myteam">
            <h1>My Team</h1>
        </div>
    </div>
    <script>
        let idpindah = document.getElementById('link-myteam');

        idpindah.addEventListener('click', () => {
            window.location.href = './team_register.php'
        })
    </script>
</body>

</html>