<?php
include("../model/users.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $users = new Users(time(),$_POST['nama'],$_POST['provinsi'],
    $_POST['kampus'],$_POST['email'],$_POST['username'],$_POST['password']);
    $pesan =$users->createData();
    echo $pesan;
    if($pesan=='1'){
        header('Location: ../pages/login.php');
    }else{
        header('Location: ../pages/register.php?status='.$pesan['pesan']);
    }
}

?>