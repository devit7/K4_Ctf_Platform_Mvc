<?php

include("../model/users.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $users= new Users();
    $users->update(
        $_GET['id'],
        $_POST['nama'],
        $_POST['provinsi'],
        $_POST['kampus'],
        $_POST['email']
        
        );
    header('Location: ../pages/user_profile.php');
}

?>