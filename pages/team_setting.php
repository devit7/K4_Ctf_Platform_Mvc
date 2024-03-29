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
        <div class="menu active" onclick="showDefault()" id="defaultMenu">
          <a href="#"> List Member </a>
        </div>
        <div class="menu" onclick="showInvite()" id="inviteMenu">
          <a href="#"> Invite Member </a>
        </div>
        <div class="menu" onclick="showSetting()" id="settingMenu">
          <a href="#"> Setting Team </a>
        </div>

        <!--         <div class="menu" onclick="showDelete()" id="deleteMenu">
          <a href="#"> Delete Team </a>
        </div> -->
      </div>
      <div id="area-kanan-default" class="area-kanan">
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
          require_once '../model/teams.php';
          $no = 1;
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
      <div id="area-kanan-invite" class="area-kanan-invite">
        <h2>
          Invite Member
        </h2>
        <br>
        <form>
          <?php
          $teams = new Teams();
          $id = $_SESSION['id_user'];
          $dataId = $teams->listTeambyIdUser($id);
          foreach ($dataId as $team) :
          ?>
            <label for="">Team Name</label>
            <input type="text" id="teamName" name="team_name" disabled value="<?= $team['nama_team'] ?>">
            <label for="">Team Password</label>
            <input type="password" id="password" name="password" disabled value="<?= $team['pass_team'] ?>">
            <button type="button" class="bt-save" onclick="copyToClipboard()">Copy</button>
          <?php
          endforeach;
          ?>
        </form>
      </div>
      <?php $users = new Users();

      $dt = $users->checkHaveATeam($_SESSION['id_user']);
      $hide = '';
      if ($dt[0]['role'] == 'member') {
      ?>
        <div id="area-kanan-setting" class="area-kanan-setting">
          <h2>
            Setting Team
          </h2>
          <br>
          <h1>
            You are not the leader of this team
          </h1>
        <?php
      } else {
        ?>
          <div id="area-kanan-setting" class="area-kanan-setting">
            <h2>
              Setting Team
            </h2>
            <br>
            <form method="POST" action="../controller/controller_update_team.php">
              <?php
              $dataId = $teams->listTeambyIdUser($id);
              foreach ($dataId as $team) :
              ?>
                <label for="">Nama Team</label>
                <input type="text" name="nama_team" disabled value="<?= $team['nama_team'] ?>">
                <label for="">Afiliasi</label>
                <input type="text" name="afiliasi" value="<?= $team['afiliasi'] ?>">
                <label for="">Website</label>
                <input type="text" name="website" value="<?= $team['website'] ?>">
              <?php
              endforeach;
              ?>
              <button type="submit" class="bt-save">Save</button>
            </form>
          </div>
        <?php
      }
        ?>
        <!-- <div id="area-kanan-delete" class="area-kanan-delete">
        <h2>Delete This Team</h2>
        <br>
        <form method="POST" action="../controller/controller_delete_team.php">
          <label for="">Team Password</label>
          <input type="password" name="password">
          <button type="submit">
            Delete
          </button>
        </form>
      </div> -->
        </div>
    </div>
    <script>
      function setActive(element) {
        // Menghapus kelas 'active' dari semua elemen dengan kelas 'menu'
        var menuElements = document.getElementsByClassName('menu');
        for (var i = 0; i < menuElements.length; i++) {
          menuElements[i].classList.remove('active');
        }

        // Menambahkan kelas 'active' pada elemen yang ditekan
        element.classList.add('active');
      }

      function showSetting() {
        document.getElementById("area-kanan-default").style.display = "none";
        document.getElementById("area-kanan-invite").style.display = "none";
        document.getElementById("area-kanan-setting").style.display = "block";
        setActive(document.getElementById('settingMenu'));
      }

      function showDefault() {
        document.getElementById("area-kanan-default").style.display = "block";
        document.getElementById("area-kanan-setting").style.display = "none";
        document.getElementById("area-kanan-invite").style.display = "none";
        setActive(document.getElementById('defaultMenu'));
      }


      function showInvite() {
        document.getElementById("area-kanan-default").style.display = "none";
        document.getElementById("area-kanan-setting").style.display = "none";
        document.getElementById("area-kanan-invite").style.display = "block";
        setActive(document.getElementById('inviteMenu'));
      }

      function copyToClipboard() {
        var teamNameInput = document.getElementById("teamName");
        var passwordInput = document.getElementById("password");
        var combinedValue = "Nama Team : " + teamNameInput.value + " | Password Team :" + passwordInput.value;
        var textarea = document.createElement("textarea");
        textarea.value = combinedValue;
        textarea.style.position = "absolute";
        textarea.style.left = "-9999px";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
      }
    </script>

</body>

</html>