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
  <link rel="stylesheet" href="../css/user_profile.css" />
  <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
  <div class="">
    <!-- Navbar -->
    <?php
    include '../component/navbar.php';
    ?>
  </div>
  <!-- User Setting -->
  <div class="main-area">
    <div class="area-atas">
      <h1>
        User Setting
      </h1>
    </div>
    <div class="area-bawah">
      <div class="tombol-area">
        <div id="menu-prof" onclick="showDefaultProfile()" class="menu active">
          <a href="#"> Profile </a>
        </div>
        <div id="menu-auth" onclick="showAuthProfile()" class="menu">
          <a href="#"> Authentication </a>
        </div>
        <div id="menu-logout" onclick="showLogoutProfile()" class="menu">
          <a href="#"> Logout </a>
        </div>
      </div>
      <div id="profile-area" class="form-area">
        <?php require_once '../model/users.php';
        $users = new Users();
        $id = $_SESSION['id_user'];
        $dataId = $users->getByid($id);
        foreach ($dataId as $user) :
        ?>
          <form action="../controller/controller_user_profile.php?id=<?= $user['user_id'] ?>" method="POST">
            <h2>Profile Setting</h2>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" id="nama" name="nama" value="<?= $user['nama'] ?>" />
              <label for="provinsi">Provinsi</label>
              <input type="text" id="provinsi" name="provinsi" value="<?= $user['provinsi'] ?>" />
              <label for="kampus">Kampus</label>
              <input type="text" id="kampus" name="kampus" value="<?= $user['kampus'] ?>" />
              <label for="email">Email</label>
              <input type="text" id="email" name="email" value="<?= $user['email'] ?>" />
            </div>
          <?php
        endforeach;
          ?>
          <div class="form-button">
            <button type="submit" class="bt-save">Save</button>
          </div>
          </form>
      </div>
      <div id="auth-area" class="form-area-auth">
        <?php
        $id = $_SESSION['id_user'];
        $dataId = $users->getByid($id);
        foreach ($dataId as $user) :
        ?>
          <form action="../controller/controller_user_profile.php?id=<?= $user['user_id'] ?>" method="POST">
            <h2>Profile Setting</h2>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" id="nama" name="nama" value="<?= $user['username'] ?>" />
              <label for="nama">New Password</label>
              <input type="text" id="nama" name="nama" />
              <label for="provinsi">Confirm New Password</label>
              <input type="text" id="provinsi" name="provinsi" />
            </div>
          <?php
        endforeach;
          ?>
          <div class="form-button">
            <button type="submit" class="bt-save">Save</button>
          </div>
          </form>
      </div>
      <div id="logout-area" class="form-logout" >
        <form action="../controller/controller_logout.php" method="POST">
          <h2>Sure to Logout ??</h2>
          <div class="form-button">
            <button type="submit" >Logout</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function setActive(element) {
      var menu = document.getElementsByClassName("menu");
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("active");
      }
      element.classList.add("active");
    };

    function showDefaultProfile() {
      document.getElementById('profile-area').style.display = 'block';
      document.getElementById('auth-area').style.display = 'none';
      document.getElementById('logout-area').style.display = 'none';
      setActive(document.getElementById('menu-prof'));
    }

    function showAuthProfile() {
      document.getElementById('profile-area').style.display = 'none';
      document.getElementById('auth-area').style.display = 'block';
      document.getElementById('logout-area').style.display = 'none';
      setActive(document.getElementById('menu-auth'));
    }

    function showLogoutProfile() {
      document.getElementById('profile-area').style.display = 'none';
      document.getElementById('auth-area').style.display = 'none';
      document.getElementById('logout-area').style.display = 'block';
      setActive(document.getElementById('menu-logout'));
    }
  </script>
</body>

</html>