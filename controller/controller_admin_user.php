
<?php

include("../model/users.php");

// Add data User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Add') {
        $users = new Users(
            uniqid(),
            $_POST['nama'],
            $_POST['provinsi'],
            $_POST['kampus'],
            $_POST['email'],
            $_POST['username'],
            $_POST['password']
        );
        $pesan = $users->createData($_POST['role']);
        echo $pesan;
        if ($pesan == '1') {
            header('Location: ../pages/admin_users.php?status=Berhasil');
        } else {
            header('Location: ../pages/admin_users.php?status=' . $pesan['pesan']);
        }
    
}

// Edit data User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Edit') {

    $user_id= $_GET['user_id'];
    $users = new Users();
    $pesan=$users->updateAdmin(
        $user_id,
        $_POST['nama'],
        $_POST['provinsi'],
        $_POST['kampus'],
        $_POST['email'],
        $_POST['username'],
        $_POST['password'],
        $_POST['role']
    );
    if ($pesan == '1') {
        header('Location: ../pages/admin_users.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_users.php?status=' . $pesan['pesan']);
    }
}


?>