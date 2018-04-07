<!DOCTYPE html>
<?php
require 'db.php';
?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css">
    <title>SeenItAll - Registreeru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'js/jquery-3.3.1.min.js';
            var firstScript = document.getElementsByTagName('script')[0];
            firstScript.parentNode.insertBefore(script, firstScript);
        }
    </script>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tagasi'])) {
        header("Location: index.php");
    }
    if (isset($_POST['register'])) {
        if ((empty($_POST['email'])) OR (empty($_POST['firstname']))
            OR (empty($_POST['lastname'])) OR (empty($_POST['password']))) {
            $message = "Oled midagi sisestamata jätnud, vaata üle!";
            echo "<script>alert('$message');</script>";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $message = "Email on vale, vaata üle!";
            echo "<script>alert('$message');</script>";
        } else {
            require "registersite.php";
        }
    }
}
?>
<div itemscope itemtype="http://schema.org/Webpage">
    <form itemprop="potentialAction" class="form" action="register.php" method="POST">
        <div class="text">
            <p itemprop="text">Registreeru</p>
        </div>
        <label for="firstname">Eesnimi</label>
        <input itemprop="name" type="text" name="firstname" id="firstname">
        <label for="lastname">Perenimi</label>
        <input itemprop="name" type="text" name="lastname" id="lastname">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email">
        <label for="password">Salasõna</label>
        <input type="password" name="password" id="password">
        <!-- type submit näitab, et submitiks selle formi ära-->
        <button itemprop="url" class="button" type="submit" name="register">Registreeru</button>
        <button itemprop="url" class="button" id="reg" name="tagasi">Mine tagasi</button>
    </form>
</div>
</body>
</html>