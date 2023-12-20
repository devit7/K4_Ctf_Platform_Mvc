<?php
include('../component/check_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>teams</title>
  <link rel="stylesheet" href="../css/teams.css" />
  <link rel="stylesheet" href="../css/font.css" />
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/team_setting.css">
</head>

<body>
  <div class="">
    <!-- Navbar -->
    <?php
    include '../component/navbar.php';
    ?>
  </div>
  <div class="member">
    <div class="team-name">
      <h1>
        Team Setting
      </h1>
    </div>
    <div class="main-kotak">
      <div class="area-kiri">
        <div class="menu">
          <a href=""> List Member </a>
        </div>
        <div class="menu">
          <a href=""> Invite Member </a>
        </div>
        <div class="menu">
          <a href=""> Delete Team </a>
        </div>
      </div>
      <div class="area-kanan">
        <h2>
          List Member
        </h2>
        <br>
        <table>
          <tr>
            <th>No</th>
            <th>Member</th>
            <th>Role</th>
          </tr>
          <?php
          include '../model/teams.php';
          $no=1;
          $teams = new Teams();
          $dataTeams = $teams->listTeambyUser($_SESSION['id_user']);
          foreach ($dataTeams as $team) :
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $team['nama'] ?></td>
              <td><?= $team['role'] ?></td>
            </tr>
          <?php
          endforeach;
          ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>