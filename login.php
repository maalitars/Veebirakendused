<!DOCTYPE html>
<?php
require 'init.php';
require 'db.php';
?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css">
    <title>SeenItAll - Logi sisse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Siit saab SeenItAll veebilehele sisse logida."/>
    <meta name="keywords" content="logi sisse, filmid, kasutaja, konto, salasõna"/>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) { //kasutaja logib sisse

        require 'loginsite.php';
    } elseif (isset($_POST['tagasi'])) {
        header("Location: index.php");
    }
}
?>
<div class="login">
    <form class="form" action="login.php" method="POST">
        <div class="text">
            <p>Sisene filmimaailma</p>
        </div>
        <input type="text" name="email" placeholder="e-mail">
        <input type="password" name="password" placeholder="salasõna">
        <button class="button" name="login"><t>Logi sisse</t></button>
        <button class="button" id="reg" name="tagasi"><t>Mine tagasi</t></button>
        <div class="buttonen" onclick='location.href="?lang=english"'>
        </div>
        <div class="buttonet" onclick='location.href="?lang=estonian"'>
        </div>

    </form>
</div>
</body>