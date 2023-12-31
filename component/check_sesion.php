<?php

session_start();
if (!isset($_SESSION['id_user'])) {
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