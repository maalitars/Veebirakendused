<?php

session_start();
if(isset($_POST['submitLogin'])){
    $_SESSION['id'] = 1; //ainult 1. kasutaja saab pilti vahetada
    header("Location: login.php");
}