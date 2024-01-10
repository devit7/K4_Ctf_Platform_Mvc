<?php

session_start();
if (isset($_SESSION['id_user'])) {
    include_once '../model/users.php';
    $user = new Users();
    $user_id=$user->getByid($_SESSION['id_user']);
    $user_id=$user_id[0]['role'];
    if($user_id!='user'){
        header('Location: ../pages/login.php');
    }
}else{
    header('Location: ../pages/login.php');
}

function session_chall(){
        require_once '../model/users.php';
        $team = new Users();
        $team_id=$team->checkHaveATeam($_SESSION['id_user']);
        if (count($team_id) == 0) {
            header('Location: ../pages/team_register.php');
        }
}

?>