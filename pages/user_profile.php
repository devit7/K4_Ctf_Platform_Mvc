<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>teams</title>
    <link rel="stylesheet" href="../css/teams.css" />
    <link rel="stylesheet" href="../css/font.css" />
    <link rel="stylesheet" href="../css/user_profile.css" />
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
          <div class="menu">
            <a href=""> Profile </a>
          </div>
          <div class="menu">
            <a href=""> Authentication </a>
          </div>
        </div>
        <div class="form-area">
          <form action="">
            <h2>Profile Setting</h2>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" id="nama" />
              <label for="provinsi">Provinsi</label>
              <input type="text" id="provinsi" />
              <label for="kampus">Kampus</label>
              <input type="text" id="kampus" />
              <label for="email">Email</label>
              <input type="text" id="email" />
            </div>
            <div class="form-button">
              <button
              class="bt-save"
              >Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
