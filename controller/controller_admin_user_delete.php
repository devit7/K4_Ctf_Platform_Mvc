<?php

include("../model/users.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $users= new Users();
    $pesan=$users->deleteByid($_GET['user_id']);
    header('Location: ../pages/admin_user.php?status='.$pesan['pesan'].'');
}

?>