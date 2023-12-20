<?php
session_start();
include '../model/teams.php';  
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $teams = new Teams();
    $pesan =$teams->joinTeam($_POST['team_name'],$_POST['team_pass'],$_SESSION['id_user']);
    echo $pesan;
    if($pesan!=0||$pesan!=null){
        if(isset($pesan['pesan'])){
            header('Location: ../pages/team_register.php?status='.$pesan['pesan']);
        }else{
            header('Location: ../pages/team_setting.php');
        }
    }
}


?>