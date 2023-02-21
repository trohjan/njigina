<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ad@ansalogin.php");
        exit();
    }
?>