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
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
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
                    $dataUser = $users->getAll();
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
                                <a href="admin_users.php?type=edit&user_id=<?= $user['user_id'] ?>">
                                    edit
                                </a>
                                <a href="">
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
            modals_add_user('ADD', 'add');
            ?>

    </div>
    <script>
        let id_add = document.getElementById('modal-add-show');
        let id_close = document.getElementById('modal-add-close');
        let id_main = document.getElementById('modal-add-main');

        id_add.addEventListener('click', () => {
            id_main.style.display = 'flex';
        })
        id_close.addEventListener('click', () => {
            id_main.style.display = 'none';
        })

    </script>
</body>

</html>