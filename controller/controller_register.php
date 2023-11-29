<?php
include("../model/users.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $users = new Users(time(),$_POST['nama'],$_POST['provinsi'],$_POST['kampus'],$_POST['email'],$_POST['username'],$_POST['password']);
    $users->createData();
    echo'<script>alert("anda berhasil register")</script>';
    header('Location: /login');
}

?>