<?php
    include_once '../component/admin_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>
    <link rel="stylesheet" href="../css/admin_chall.css">
    <link rel="stylesheet" href="../css/modal_add_user.css">
</head>

<body>
    <?php
    include '../component/admin_sidebar.php';
    ?>
    <div class="u-admin">
        <div class="bagian-1">
            <div class="halaman-bagian">
                <h1>Challs Managemment</h1>
            </div>
            <div class="navigate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
                <a href="#"> / challenges / challs /</a>
            </div>
            <div class="info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
                <p> anda dapat melakukan management data challs yang ada di website ini</p>
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
                        <th>Chall ID</th>
                        <th>Nama Chall</th>
                        <th>Level</th>
                        <th>Attch</th>
                        <th>Point</th>
                        <th>Flag</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>Detail</th>
                    </tr>

                    <?php
                    require_once '../model/chall.php';

                    $challs = new Challs();
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $dataChall = $challs->searchChall($_GET['search']);
                    } else {
                        $dataChall = $challs->getAlldanCatego();
                    }
                    $no = 1;
                    foreach ($dataChall as $chall) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $chall['chall_id'] ?></td>
                            <td><?= $chall['nama_chall'] ?></td>
                            <td><?= $chall['level'] ?></td>
                            <td hidden><?= $chall['description'] ?></td>
                            <td><?= $chall['attch'] ?></td>
                            <td>[ <?= $chall['point'] ?> ]</td>
                            <td><?= $chall['flag'] ?></td>
                            <td><?= $chall['nama_category'] ?></td>
                            <td>
                                <a id="edit-show" href="#" onclick="openEditModal(
                                    '<?= $chall['chall_id'] ?>',
                                    '<?= $chall['nama_chall'] ?>',
                                    '<?= $chall['level'] ?>',
                                    '<?= $chall['description'] ?>',
                                    '<?= $chall['attch'] ?>',
                                    '<?= $chall['point'] ?>',
                                    '<?= $chall['flag'] ?>',
                                    '<?= $chall['category_id'] ?>'
                                )">
                                    edit
                                </a>
                                <a id="delete-show" onclick="openDeleteModal('<?= $chall['chall_id'] ?>')" href="#">
                                    delete
                                </a>
                            </td>
                            <td>
                                <a id="edit-show" class="show" href="#" onclick="openEditModal(
                                    '<?= $chall['chall_id'] ?>',
                                    '<?= $chall['nama_chall'] ?>',
                                    '<?= $chall['level'] ?>',
                                    '<?= $chall['description'] ?>',
                                    '<?= $chall['attch'] ?>',
                                    '<?= $chall['point'] ?>',
                                    '<?= $chall['flag'] ?>',
                                    '<?= $chall['category_id'] ?>'
                                )">
                                    show
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

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
        include_once '../component/modals_form_chall.php';
        include_once '../component/modals_delete.php';
        include_once '../component/modals.php';


        if (isset($_GET['status']) && $_GET['status'] == 'Berhasil') {
            $pesan = htmlspecialchars($_GET['status'], ENT_QUOTES, 'UTF-8'); // sanitized input wkwkw
            createModal('Process Succes', $pesan, 'success');
        } else if (isset($_GET['status'])) {
            $pesan = htmlspecialchars($_GET['status'], ENT_QUOTES, 'UTF-8'); // sanitized input wkwkw
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
            document.getElementById('form-delete').action = '../controller/controller_admin_chall.php?chall_id=' + user_id;
        }

        function openEditModal(chall_id, nama_chall, level, description, attch, point, flag, category_id) {
            id_main.style.display = 'flex';
            document.getElementById('form-register').action = '../controller/controller_admin_chall.php?chall_id=' + chall_id + '&type=edit';
            document.getElementById('modal-title').innerHTML = '/ FORM EDIT CHALL /';
            document.getElementById('nama_chall').value = nama_chall;
            document.getElementById('level').value = level;
            document.getElementById('deskripsi').value = description;
            document.getElementById('attch').value = attch;
            document.getElementById('point').value = point;
            document.getElementById('flag').value = flag;
            document.getElementById('category_id').value = category_id;
            document.getElementById('id-submit').value = 'Edit';
        }

        function resetFormValues() {
            document.getElementById('form-register').action = '../controller/controller_admin_user.php';
            document.getElementById('modal-title').innerHTML = '/ FORM ADD CHALL /';
            document.getElementById('nama_chall').value = '';
            document.getElementById('level').value = '';
            document.getElementById('deskripsi').value = '';
            document.getElementById('attch').value = '';
            document.getElementById('point').value = '';
            document.getElementById('flag').value = '';
            document.getElementById('category_id').value = '';
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

        if (status === 'Username Alredy Exists' || status === 'Email Alredy Exists' || status === 'Berhasil' || status === 'Gagal') {
            modal_join.style.display = 'flex';
        }

        close_modal_join.addEventListener('click', () => {
            modal_join.style.display = 'none';
            if (status === 'Username Alredy Exists' || status === 'Email Alredy Exists' || status === 'Berhasil' || status === 'Gagal') {
                url.searchParams.delete('status');
                history.replaceState({}, document.title, url.href); //untuk menghilangkan status di url
            }
        });
    </script>
</body>

</html>