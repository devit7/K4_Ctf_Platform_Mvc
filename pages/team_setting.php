<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>teams</title>
    <link rel="stylesheet" href="../css/teams.css" />
    <link rel="stylesheet" href="../css/font.css" />
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
            Your Team Name
        </h1>
    </div>
      <div class="main-kotak">
        <div>
          <table>
            <tr>
              <th>Member</th>
              <th>Score</th>
            </tr>
            <tr>
              <td>Member 1</td>
              <td>100</td>
            </tr>
            <tr>
              <td>Member 2</td>
              <td>200</td>
            </tr>
            <tr>
              <td>Member 3</td>
              <td>300</td>
            </tr>
          </table>
        </div>
        <div>
          <button>Setting</button>
          <button>Invite Member</button>
        </div>
      </div>
    </div>
  </body>
</html>
