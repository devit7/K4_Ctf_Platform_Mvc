<?php
include('../component/check_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teams</title>
    <link rel="stylesheet" href="../css/teams.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="">
        <!-- Navbar -->
        <?php
    include '../component/navbar.php';
    ?>
    </div>
    <!-- Content -->
    <div class="container-teams">
        <div class="vertical-text">
            <h1>
                Teams
            </h1>
        </div>
        <!-- Main -->
        <div class="kotak-utama">
            <div class="search-teams">
                    <input name="search" type="text">
                    <button>SEARCH</button>
            </div>
            <div class="table-teams">
                <table>
                    <tr>
                        <th>Teams</th>
                        <th>Afiliasi</th>
                        <th>Website</th>
                    </tr>
                    <?php
                    include '../model/teams.php';
                    $teams = new Teams();
                    $dataTeams=$teams->getAll();
                    foreach ($dataTeams as $team):
                    ?>
                    <tr>
                        <td><?=$team['nama_team']?></td>
                        <td><?=$team['afiliasi']?></td>
                        <td><?=$team['website']?></td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
        <div class="Myteam">
            <h1>My Team</h1>
        </div>
    </div>
</body>
</html>