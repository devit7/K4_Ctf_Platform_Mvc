<?php
include('../component/check_sesion.php');
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
        <div id="modal-join" class="main-modal">
          <div class="modal-helper">
            <div class="modal-content">
              <div class="modal-header">
                <h1>Join Team</h1>
              </div>
              <form action="">
              <div class="modal-body">
                <label for="teamname">Team Name</label>
                <input id="teamname" type="text">
                <label for="teampass">Team Password</label>
                <input id="teampass" type="password">
              </div>
              <div class="modal-footer">
                <button class="bt-create">+ Create</button>
              </form>
                <button type="button" class="bt-cancel" id="close-modal-join">X Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End modal -->
      </div>
    </div>

    <script>
      let button_create = document.getElementById('create-button');
      let close_modal_create = document.getElementById('close-modal-create');
      let modal_creeate = document.getElementById('modal-create');
      let button_join = document.getElementById('join-button');
      let close_modal_join = document.getElementById('close-modal-join');
      let modal_join = document.getElementById('modal-join');

      button_join.addEventListener('click',()=>{
        modal_join.style.display='flex';
      });

      close_modal_join.addEventListener('click',() => {
        modal_join.style.display='none';
      });

      button_create.addEventListener('click',()=>{
        modal_creeate.style.display='flex';
      });

      close_modal_create.addEventListener('click',() => {
        modal_creeate.style.display='none';
      });

    </script>
  </body>
</html>
