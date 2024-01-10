<?php
include('../component/check_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/users.css">
    <link rel="stylesheet" href="../css/font.css">
</head>

<body>
    <div class="">
        <!-- Navbar -->
        <?php
        include '../component/navbar.php';
        ?>
    </div>
    <!-- Content -->
    <div class="container-users">
        <div class="vertical-text">
            <h1>
                Users
            </h1>
        </div>
        <!-- Main -->
        <div class="kotak-utama">
            <form class="search-users">
                <?php
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                ?>
                <input type="text" name="search" value="<?= $search ?>">
                <button>SEARCH</button>
            </form>
            <div class="table-users">
                <table>
                    <tr>
                        <th>User</th>
                        <th>Kampus</th>
                        <th>Provinsi</th>
                    </tr>
                    <?php
                    require_once '../model/users.php';
                    $users = new Users();
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $dataUser = $users->searchUser($_GET['search']);
                    } else {
                        $dataUser = $users->getAll();
                    }
                    foreach ($dataUser as $user) :
                    ?>
                        <tr>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['kampus'] ?></td>
                            <td><?= $user['provinsi'] ?></td>
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