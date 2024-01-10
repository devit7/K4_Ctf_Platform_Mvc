<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>
    <link rel="stylesheet" href="../css/admin_users.css">
    <link rel="stylesheet" href="../css/modal_add_user.css">
</head>

<body>
    <?php
    include '../component/admin_sidebar.php';
    ?>
    <div class="u-admin">
        <div class="bagian-1">
            <div class="halaman-bagian">
                <h1>Teams Managemment</h1>
            </div>
            <div class="navigate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
                <a href="#"> / teams /</a>
            </div>
            <div class="info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
                <p> anda dapat melakukan management data teams yang ada di website ini</p>
            </div>
        </div>
        <div class="bagian-2">
            <div class="kotak-1">
                <div id="modal-add-show" class="bagian-kiri">
                    <a class="tambah" href="#">
                        add
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </a>
                </div>
                <div class="bagian-kanan">
                    <form class="search" action="?search=<?= $search ?>" method="GET"><!-- agar terpampang di url -->
                        <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        ?>
                        <input id="search-input" type="text" name="search" value="<?= $search ?>" placeholder="Search">
                        <button id="search-btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bagian-3">
            <div class="kotak-2">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Team Id</th>
                        <th>Nama Team</th>
                        <th>Password</th>
                        <th>Afiliasi</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    require_once '../model/teams.php';

                    $teams = new Teams();
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $dataTeam = $teams->searchTeam($_GET['search']);
                    } else {
                        $dataTeam = $teams->getAll();
                    }
                    $no = 1;
                    foreach ($dataTeam as $team) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $team['team_id'] ?></td>
                            <td><?= $team['nama_team'] ?></td>
                            <td><?= $team['pass_team'] ?></td>
                            <td><?= $team['afiliasi'] ?></td>
                            <td><?= $team['website'] ?></td>
                            <td>
                                <a id="edit-show" href="#" onclick="openEditModal(
                                    '<?= $team['team_id'] ?>',
                                    '<?= $team['nama_team'] ?>',
                                    '<?= $team['pass_team'] ?>',
                                    '<?= $team['afiliasi'] ?>',
                                    '<?= $team['website'] ?>'
                                )">
                                    edit
                                </a>
                                <a id="delete-show" onclick="openDeleteModal('<?= $team['team_id'] ?>')" href="#">
                                    delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
        <?php
        include_once '../component/modals_form_team.php';
        include_once '../component/modals_delete.php';
        include_once '../component/modals.php';

        
        if (isset($_GET['status'])&&$_GET['status']=='Berhasil') {
            $pesan = htmlspecialchars($_GET['status'],ENT_QUOTES,'UTF-8');// sanitized input wkwkw
            createModal('Process Succes', $pesan, 'success');
        }else if (isset($_GET['status'])) {
            $pesan = htmlspecialchars($_GET['status'],ENT_QUOTES,'UTF-8');// sanitized input wkwkw
            createModal('Process Failed', $pesan, 'failed');
        }
        
        ?>

    </div>
    <script type="text/javascript" src="../js/form_add.js" ></script>
    <script>

        let id_add = document.getElementById('modal-add-show');
        let id_close = document.getElementById('modal-add-close');
        let id_main = document.getElementById('modal-add-main');
        let id_edit = document.getElementById('edit-show');
        let id_modal_delete = document.getElementById('main-modal-delete');
        let id_close_delete = document.getElementById('close-modal-delete');
        let id_delete_show = document.getElementById('delete-show');


        id_delete_show.addEventListener('click', () => {
            id_modal_delete.style.display = 'flex';
        })

        id_close_delete.addEventListener('click', () => {
            id_modal_delete.style.display = 'none';
        })


        id_add.addEventListener('click', () => {
            id_main.style.display = 'flex';
        })
        id_close.addEventListener('click', () => {
            id_main.style.display = 'none';
            resetFormValues();
        })
        id_edit.addEventListener('click', () => {
            id_main.style.display = 'flex';
        })

        function openDeleteModal(user_id) {
            id_modal_delete.style.display = 'flex';
            document.getElementById('form-delete').action = '../controller/controller_admin_team.php?team_id='+ user_id +'&type=delete';
        }

        function openEditModal(id_team, nama_team, pass_team, afiliasi, website) {
            id_main.style.display = 'flex';
            document.getElementById('form-register').action = '../controller/controller_admin_team.php?team_id=' + id_team + '&type=edit';
            document.getElementById('modal-title').innerHTML = '/ FORM EDIT TEAM /';
            document.getElementById('nama_team').value = nama_team;
            document.getElementById('pass_team').value = pass_team;
            document.getElementById('afiliasi').value = afiliasi;
            document.getElementById('website').value = website;
            document.getElementById('id-submit').value = 'Edit';
        }
        function resetFormValues() {
            document.getElementById('form-register').action = '../controller/controller_admin_team.php';
            document.getElementById('modal-title').innerHTML = '/ FORM ADD TEAM /';
            document.getElementById('nama_team').value = '';
            document.getElementById('pass_team').value = '';
            document.getElementById('afiliasi').value = '';
            document.getElementById('website').value = '';
            document.getElementById('id-submit').value = 'Add';
        }
    </script>
    <!-- //js modal aller -->
    <script>
        //get query url
        let url = new URL(window.location.href);
        let status = url.searchParams.get('status');

        let close_modal_join = document.getElementById('close-modal-join');
        let modal_join = document.getElementById('modal-join');

        if (status === 'Nama Teams Alredy Exists' ||  status === 'Berhasil'  || status === 'Gagal') {
            modal_join.style.display = 'flex';
        }

        close_modal_join.addEventListener('click', () => {
            modal_join.style.display = 'none';
            if (status === 'Nama Teams Alredy Exists' ||  status === 'Berhasil' || status === 'Gagal') {
                url.searchParams.delete('status');
                history.replaceState({}, document.title, url.href); //untuk menghilangkan status di url
            }
        });
    </script>
</body>

</html>