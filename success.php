<!DOCTYPE html>
<?php
/* Displays all successful messages */
session_start();
?>
<html lang="et">
<head>
    <title>Edukas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="See on SeenItAll veebilehe teavitus, registreerumise õnnestumise kohta."/>
    <meta name="keywords" content="registreerumine, filmid, edukas"/>
    <?php include 'pages/main2.css'; ?>
</head>
<body>
<div itemscope itemtype="http://schema.org/WebPage">
    <div class="form">
        <h1 itemprop="headline">Edukas</h1>
        <p itemprop="text">
            <?php

            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                echo $_SESSION['message'];
            else:
                header("location: index.php");
            endif;
            ?>
        </p>
        <a href="index.php">
        <span class="button button-block">
        Home</span></a>
    </div>
</div>
</body>
</html>
