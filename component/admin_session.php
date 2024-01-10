<?php
session_start();

if(isset($_SESSION['id_user'])){
    include_once '../model/users.php';
    $user = new Users();
    $user_id=$user->getByid($_SESSION['id_user']);
    $user_id=$user_id[0]['role'];
    if($user_id!='admin'){
        header('Location: ../pages/login.php');
    }
}else{
    header('Location: ../pages/login.php');
}
?>