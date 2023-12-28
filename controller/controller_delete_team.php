<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once('../model/teams.php');
    $id_user=$_SESSION['id_user'];
    $password=$_POST['password'];
    $teams=new Teams();
    $dataTeam=$teams->listTeambyUser($id_user);
    $id_team=$dataTeam[0]['team_id'];
    $check=$teams->deleteTeamById($id_team,$password);
    if($check){
        header('Location: ../pages/teams.php');
    }
    else{
        header('Location: ../pages/team_setting.php');
    }
}
else{
    header('Location: ../pages/team_setting.php');
}

?>