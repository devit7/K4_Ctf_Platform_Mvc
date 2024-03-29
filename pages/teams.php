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
                <form class="search-teams" method="GET" action="?search=<?= $search ?>">
                    <?php
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    ?>
                    <input name="search" value="<?= $search ?>" type="text">
                    <button type="submit">SEARCH</button>
                </form>
            <div class="table-teams">
                <table>
                    <tr>
                        <th>Teams</th>
                        <th>Afiliasi</th>
                        <th>Website</th>
                    </tr>
                    <?php
                    require_once '../model/teams.php';
                    $teams = new Teams();
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $dataTeams = $teams->searchTeam($_GET['search']);
                    } else {
                        $dataTeams = $teams->getAll();
                    }
                    foreach ($dataTeams as $team) :
                    ?>
                        <tr>
                            <td><?= $team['nama_team'] ?></td>
                            <td><?= $team['afiliasi'] ?></td>
                            <td><?= $team['website'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
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