<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once('../model/teams.php');
    $id_teams=$_POST['password'];
    $teams=new Teams();
    $teams->setIdteams($id_teams);
    $teams->deleteTeamsById();
    header('Location: ../pages/team_setting.php');
}
else{
    header('Location: ../pages/team_setting.php');
}

?>