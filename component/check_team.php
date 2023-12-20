<?php
require_once('../model/users.php');

session_start();
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $user = new Users();
    $check=$user->checkHaveATeam($id_user);
    if ($check) {
        header('Location: ../pages/team_setting.php');
    }
}
if (!isset($_SESSION['id_user'])) {
    header('Location: ../pages/login.php');
}

?>