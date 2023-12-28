<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('../model/chall.php');
    require_once('../model/teams.php');
    $id_chall = $_POST['id_chall'];
    $flag = $_POST['flag'];
    $chall = new Challs();
    $team = new Teams();
    $team_id= $team->listTeambyUser($_SESSION['id_user']);
    $check = $chall->checkFlag($flag,$id_chall,$team_id[0]['team_id']);
    if($check){
        header('Location: ../pages/challenges.php?status=solved');
    }
    else{
        header('Location: ../pages/challenges.php?status=gagal');
    }
}
else{
    header('Location: ../pages/challenges.php');
}

?>