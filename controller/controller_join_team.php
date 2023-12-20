<?php
session_start();
include '../model/teams.php';
include '../model/users.php';   
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $teams = new Teams();
    $pesan =$teams->joinTeam($_POST['team_name'],$_POST['team_pass']);
    echo $pesan;
    if($pesan!=0||$pesan!=null){
        if($pesan['pesan']!=null){
            header('Location: ../pages/team_register.php?status='.$pesan['pesan']);
        }
    }
}


?>