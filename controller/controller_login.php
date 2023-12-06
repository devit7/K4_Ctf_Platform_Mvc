<?php

include('../model/users.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $u = new Users();
    $login=$u->authenticate($username,$password);
    if($login){
        header('Location: ../pages/scoreboard.php');
    }else{
        echo "Username atau Password salah";
        header('Location: ../pages/login.php');
    }

} else {
    echo "Username atau Password salah";
    header('Location: ../pages/login.php');
}
