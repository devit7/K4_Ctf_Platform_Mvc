<?php

    include_once("../model/teams.php");

    // Add data Team
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Add') {

    $teams = new Teams(
        uniqid(),
        $_POST['nama_team'],
        $_POST['pass_team'],
        $_POST['afiliasi'],
        $_POST['website']
    );
    $pesan = $teams->createTeamAdmin();
    if ($pesan == '1') {
        header('Location: ../pages/admin_teams.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_teams.php?status=' . $pesan['pesan']);
    }
}

// Edit data Team
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'Edit') {

    $team_id= $_GET['team_id'];
    $teams = new Teams();
    $pesan=$teams->updateAdmin(
        $team_id,
        $_POST['nama_team'],
        $_POST['pass_team'],
        $_POST['afiliasi'],
        $_POST['website']
    );
    if ($pesan == '1') {
        header('Location: ../pages/admin_teams.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_teams.php?status=' . $pesan['pesan']);
    }
}

// Delete data Team
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['type'] == 'delete') {

    $team_id= $_GET['team_id'];
    $teams = new Teams();
    $pesan=$teams->deleteByid($team_id);
    if ($pesan == '1') {
        header('Location: ../pages/admin_teams.php?status=Berhasil');
    } else {
        header('Location: ../pages/admin_teams.php?status=' . $pesan['pesan']);
    }
}

?>