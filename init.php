<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$allowed_lang = array('english','estonian');
if(isset($_GET['lang'])==true && in_array($_GET['lang'], $allowed_lang)==true){
    $_SESSION['lang'] = $_GET['lang'];
} else if(isset($_SESSION['lang'])==false){
    $_SESSION['lang']='english';
}

include 'language/lang/' . $_SESSION['lang'] .'.php';
 ?>
