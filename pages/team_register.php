<?php
include_once('../component/check_team.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/font.css" />
    <link rel="stylesheet" href="../css/team_register.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
  </head>
  <body>
    <div>
    <?php
    include '../component/navbar.php';
    ?>
    </div>
    <div class="main-content">
      <div class="ngotak">
        <!-- Button Create -->
        <div id="create-button" class="kotak">
          <a href="#"><h2>Create Team</h2></a>
        </div>
        <!-- Modals Crerate Teams -->
        <div id="modal-create" class="main-modal">
          <div class="modal-helper">
            <div class="modal-content">
              <div class="modal-header">
                <h1>Create Team</h1>
              </div>
              <form method="POST" action="../controller/controller_create_team.php">
              <div class="modal-body">
                <label for="teamname">Team Name</label>
                <input name="team_name" id="teamname" type="text">
                <label for="teampass">Team Password</label>
                <input name="team_pass" id="teampass" type="password">
              </div>
              <div class="modal-footer">
                <button type="submit" class="bt-create">+ Create</button>
              </form>
                <button type="button" class="bt-cancel" id="close-modal-create">X Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End modal -->

        <div  id="join-button" class="kotak">
          <a href="#"><h2>Join Team</h2></a>
        </div>
        <!-- Modals Crerate Teams -->
        <div id="modal-join1" class="main-modal">
          <div class="modal-helper">
            <div class="modal-content">
              <div class="modal-header">
                <h1>Join Team</h1>
              </div>
              <form method="post" action="../controller/controller_join_team.php">
              <div class="modal-body">
                <label for="teamname">Team Name</label>
                <input id="teamname" name="team_name" type="text">
                <label for="teampass">Team Password</label>
                <input id="teampass" name="team_pass" type="password">
              </div>
              <div class="modal-footer">
                <button type="submit" class="bt-create">+ Join</button>
              </form>
                <button type="button" class="bt-cancel" id="close-modal-join1">X Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End modal -->
      </div>
      <?php
        include_once '../component/modals.php';

        if (isset($_GET['status'])) {
          $pesan = htmlspecialchars($_GET['status'],ENT_QUOTES,'UTF-8');// sanitized input wkwkw
          createModal('Register Failed', $pesan);
      }

      ?>
    </div>

    <script>
      let button_create = document.getElementById('create-button');
      let close_modal_create = document.getElementById('close-modal-create');
      let modal_creeate = document.getElementById('modal-create');
      let button_join = document.getElementById('join-button');
      let close_modal_join1 = document.getElementById('close-modal-join1');
      let modal_join1 = document.getElementById('modal-join1');

      button_join.addEventListener('click',()=>{
        modal_join1.style.display='flex';
      });

      close_modal_join1.addEventListener('click',() => {
        modal_join1.style.display='none';
      });

      button_create.addEventListener('click',()=>{
        modal_creeate.style.display='flex';
      });

      close_modal_create.addEventListener('click',() => {
        modal_creeate.style.display='none';
      });

      //get query url
       let url = new URL(window.location.href);
        let status = url.searchParams.get('status');

        let close_modal_join = document.getElementById('close-modal-join');
        let modal_join = document.getElementById('modal-join');

        if (status === 'Nama Teams atau Password salah' ) {
            modal_join.style.display = 'flex';
        }

        close_modal_join.addEventListener('click', () => {
            modal_join.style.display = 'none';
            if (status === 'Nama Teams atau Password salah') {
                url.searchParams.delete('status');
                history.replaceState({}, document.title, url.href); //untuk menghilangkan status di url
            }
        }); 
    </script>
  </body>
</html>
