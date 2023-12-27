<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('../model/teams.php');
    $teams = new Teams();
    $id = $_SESSION['id_user'];
    $id_team=$teams->listTeambyIdUser($id);
    $nama = $_POST['nama_team'];
    $afiliasi = $_POST['afiliasi'];
    $website = $_POST['website'];
    $teams->updateById($id_team[0]['team_id'],$nama,$afiliasi,$website);

    if($teams){
        header('location:../pages/team_setting.php');
    }else{
        header('location:../pages/team_setting.php?status=gagal');
    }
}

?>