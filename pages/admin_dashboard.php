<?php
    include_once '../component/admin_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <link rel="stylesheet" href="../css/font.css">
</head>

<body>
    <?php
    include '../component/admin_sidebar.php';
    ?>
    <div class="db-admin">
        <div class="bagian-1">
            <div class="halaman-bagian">
                <h1>Dashboard</h1>
            </div>
            <div class="navigate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
                <a href="#"> / dashboard /</a>
            </div>
            <div class="info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
                <p> anda dapat melihat statistik semua data yang ada di dashboard website ini</p>
            </div>
        </div>
        <div class="bagian-2">
            <div class="card">
                <div class="judul">
                    <h4>Users</h4>
                </div>
                <div class="st">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <?php
                    require_once '../model/users.php';
                    $users = new Users();
                    $totalUser = $users->totalUser();
                    ?>
                    <p><?=$totalUser[0]['total_user']?></p>
                </div>
                <div class="color-blue"></div>
            </div>
            <div class="card">
                <div class="judul">
                    <h4>Teams</h4>
                </div>
                <div class="st">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <?php
                    require_once '../model/teams.php';
                    $teams = new Teams();
                    $totalTeams = $teams->totalTeam();
                    ?>
                    <p><?=$totalTeams[0]['total_team']?></p>
                </div>
                <div class="color-blue"></div>
            </div>
            <div class="card">
                <div class="judul">
                    <h4>Chall</h4>
                </div>
                <div class="st">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <?php
                    require_once '../model/chall.php';
                    $chall = new Challs();
                    $totalChall = $chall->totalChall();
                    ?>
                    <p><?=$totalChall[0]['total_chall']?></p>
                </div>
                <div class="color-blue"></div>
            </div>
            <div class="card">
                <div class="judul">
                    <h4>Category</h4>
                </div>
                <div class="st">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <?php
                    $totalCategory = $chall->totalCategory();
                    ?>
                    <p><?=$totalCategory[0]['total_category']?></p>
                </div>
                <div class="color-blue"></div>
            </div>
            <div class="card">
                <div class="judul">
                    <h4>Solved</h4>
                </div>
                <div class="st">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <?php
                    $totalSolved = $teams->totalSolve();
                    ?>
                    <p><?=$totalSolved[0]['total_solved']?></p>
                </div>
                <div class="color-blue"></div>
            </div>
        </div>
        <div class="bagian-3">
            <div class="st-solve">
                <h3>Solved</h3>
                <div class="tb-s">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Team Solved</th>
                            <th>Total Chall</th>
                        </tr>
                        <?php
                        $dataSolved = $teams->dhAdminSolved();
                        $no = 1;
                        foreach ($dataSolved as $solved) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $solved['category_name'] ?></td>
                                <td><?= $solved['total_team_solved'] ?></td>
                                <td><?= $solved['total_chall'] ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>

            <div class="new-solve">
                <h3>New Solve</h3>
                <div class="daftar-solve">
                    <?php
                    include_once '../model/chall.php';
                    $chall = new Challs();
                    $dataChall = $chall->dhMiddle();
                    foreach ($dataChall as $chall) :
                    ?>
                        <div class="solve">
                            <div class="nama">
                                <h4><?= $chall['date_solve'] ?></h4>
                            </div>
                            <div class="soal">
                                <h4><?= $chall['nama_team'] ?></h4>
                            </div>
                            <div class="waktu">
                                <h4><?= $chall['nama_chall'] ?></h4>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <div class="top-10">
                <h3>Top 10</h3>
                <div class="daftar-solve">
                    <?php
                    $dataTeams = $teams->laderboardAllLimit10();
                    $no = 1;
                    foreach ($dataTeams as $team) :
                    ?>
                        <div class="solve">
                            <div class="nama">
                                <h4><?= $no++ ?>. <?= $team['team_name'] ?> [<?= $team['total_points'] ?>]</h4>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- div pelengkap -->
</div>
</body>

</html>