<?php

//destroy session
session_start();
session_destroy();
header('Location: ../pages/login.php');

?>