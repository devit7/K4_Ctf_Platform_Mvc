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
                <h1>Users Managemment</h1>
            </div>
            <div class="navigate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
                <a href="#"> / users /</a>
            </div>
            <div class="info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
                <p> anda dapat melakukan management data users yang ada di website ini</p>
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
                        <th>User Id</th>
                        <th>Nama</th>
                        <th>Provinsi</th>
                        <th>Kampus</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    require_once '../model/users.php';

                    $users = new Users();
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $dataUser = $users->searchUser($_GET['search']);
                    } else {
                        $dataUser = $users->getAll();
                    }
                    $no = 1;
                    foreach ($dataUser as $user) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['provinsi'] ?></td>
                            <td><?= $user['kampus'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td>
                                <p class="<?= $user['role'] == 'admin' ? 'mark' : '' ?>"><?= $user['role'] ?></p>
                            </td>
                            <td>
                                <a id="edit-show" href="#" onclick="openEditModal(
                                    '<?= $user['nama'] ?>',
                                    '<?= $user['provinsi'] ?>',
                                    '<?= $user['kampus'] ?>',
                                    '<?= $user['email'] ?>',
                                    '<?= $user['username'] ?>',
                                    '<?= $user['password'] ?>',
                                    '<?= $user['role'] ?>',
                                    '<?= $user['user_id'] ?>'
                                )">
                                    edit
                                </a>
                                <a id="delete-show" onclick="openDeleteModal('<?= $user['user_id'] ?>')" href="#">
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
        include '../component/modals_form_user.php';
        include '../component/modals_delete.php';
        ?>

    </div>
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
            document.getElementById('form-delete').action = '../controller/controller_delete.php?user_id=' + user_id;
        }

        function openEditModal(nama, provinsi, kampus, email, username, password, role, id_user) {
            id_main.style.display = 'flex';
            document.getElementById('form-register').action = '../controller/controller_edit.php';
            document.getElementById('modal-title').innerHTML = '/ FORM EDIT USER /';
            document.getElementById('nama').value = nama;
            document.getElementById('provinsi').value = provinsi;
            document.getElementById('kampus').value = kampus;
            document.getElementById('email').value = email;
            document.getElementById('username').value = username;
            document.getElementById('password').value = password;
            document.getElementById('role').value = role;
            document.getElementById('id_user').value = id_user;
        }

        function resetFormValues() {
            document.getElementById('form-register').action = '../controller/controller_edit.php';
            document.getElementById('modal-title').innerHTML = '/ FORM ADD USER /';
            document.getElementById('nama').value = '';
            document.getElementById('provinsi').value = '';
            document.getElementById('kampus').value = '';
            document.getElementById('email').value = '';
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            document.getElementById('role').value = '';
            document.getElementById('id_user').value = '';
        }
    </script>
</body>

</html>