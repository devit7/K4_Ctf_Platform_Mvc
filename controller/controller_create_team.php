<?php
session_start();
include("../model/teams.php");
include("../model/users.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $teams = new Teams();
    $pesan =$teams->createNewTeam($_POST['team_name'],$_POST['team_pass']);
    echo $pesan;
    if($pesan!=0||$pesan!=null){
        $user = new Users();
        $id_user=$_SESSION['id_user'];
        $check=$user->updateIdTeams($id_user,$pesan,'lead');
        header('Location: ../pages/login.php');
    }else{
        header('Location: ../pages/team_register.php?status='.$pesan['pesan']);
    }
}

?>