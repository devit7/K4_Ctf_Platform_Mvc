<?php

if(isset($_SESSION['role'])){
    if($_SESSION['role']=='user'){
        header('Location: ../pages/scoreboard.php');
    }
}

?>