<?php
session_start();
include("../model/teams.php");
include("../model/users.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $teams = new Teams();
    $pesan =$teams->createNewTeam($_POST['team_name'],$_POST['team_pass'],$_SESSION['id_user']);
    echo $pesan;
    if($pesan!=0||$pesan!=null){
        header('Location: ../pages/team_setting.php');
    }
}

?>