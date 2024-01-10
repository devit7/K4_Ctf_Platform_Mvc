<?php

include("../model/chall.php");

//Add data Chall
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Add') {

    $chall = new Challs( 
    uniqid(),
    $_POST['nama_chall'],
    $_POST['level'],
    $_POST['deskripsi'],
    $_POST['attch'],
    $_POST['category_id'],
    $_POST['point'],
    $_POST['flag'],
);
    $pesan = $chall->createNewChall();
       
    if ($pesan == '1') {
        header('Location: ../pages/admin_chall.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_chall.php?status=' . $pesan['pesan']);
    }
}

// Edit data Chall
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Edit') {

    $chall_id = $_GET['chall_id'];
    $chall = new Challs(
        $chall_id,
        $_POST['nama_chall'],
        $_POST['level'],
        $_POST['deskripsi'],
        $_POST['attch'],
        $_POST['category_id'],
        $_POST['point'],
        $_POST['flag']);
    $pesan = $chall->updateChallenge(
        $chall_id
    );
    if ($pesan == '1') {
        header('Location: ../pages/admin_chall.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_chall.php?status=Gagal');
    }
}

// Delete data Chall
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['type'] == 'delete') {

    $chall_id = $_GET['chall_id'];
    $chall = new Challs();
    $pesan = $chall->deleteChallByid($chall_id);
    if ($pesan == '1') {
        header('Location: ../pages/admin_chall.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_chall.php?status=' . $pesan['pesan']);
    }
}

?>