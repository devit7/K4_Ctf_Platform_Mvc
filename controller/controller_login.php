<?php

include('../model/users.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $u = new Users();
    $login=$u->authenticate($username,$password);

    if($login){
        session_start();
        //mengambil data id_user
        $id_user=$login[0]['user_id'];
        $_SESSION['id_user']=$id_user;
        //check session
        echo $_SESSION['id_user'];
        header('Location: ../pages/scoreboard.php');
    }else{
        echo "Username atau Password salah";
        header('Location: ../pages/login.php?status=gagal');
    }

} else {
    echo "Username atau Password salah";
    header('Location: ../pages/login.php');
}
