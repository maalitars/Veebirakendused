<!DOCTYPE html>
<?php
require 'init.php';
require 'db.php';
session_start(); //realiseerib andmebaasi
?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="See on SeenItAll veebilehe avaleht, kust on võimalik sisse logida enda konto kasutamiseks või registreeruda kasutajaks veebilehele. "/>
    <meta name="keywords" content="kasutaja, filmid, logi sisse, registreeru"/>
</head>
<body> <!-- Valid kuhu lehele lähed -->
<header>
    <t>SeenItAll</t>
</header>
<div class="frontbutton" onclick='location.href="login.php"'>
    <div class="fronttext">
        <p>Logi sisse filmimaalima</p>
    </div>
    <div class="frontbutton" id="leftbutton" onclick='location.href="register.php"'>
        <div class="fronttext">
            <p>Pole kasutajat? Registreeru</p>
        </div>
    </div>
</div>
</body>
</html>
