<?php

include("../model/chall.php");

// Add data Chategory
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Add') {
    $chall = new Challs();
    $pesan = $chall->createCategory($_POST['nama_category']);
    if ($pesan == '1') {
        header('Location: ../pages/admin_category.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_category.php?status=Sudah Ada');
    }
}

// Edit data Chategory
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Edit') {

    $category_id = $_GET['category_id'];
    $chall = new Challs();
    $pesan = $chall->updateCategory($_GET['category_id'], $_POST['nama_category']);
    if ($pesan == '1') {
        header('Location: ../pages/admin_category.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_category.php?status=' . $pesan['pesan']);
    }
}

// Delete data Chategory
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['type'] == 'delete') {
    
    $category_id = $_GET['category_id'];
    $chall = new Challs();
    $pesan = $chall->deleteCategoryByid($category_id);
    if ($pesan == '1') {
        header('Location: ../pages/admin_category.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_category.php?status=' . $pesan['pesan']);
    }
}

?>