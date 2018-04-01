<!DOCTYPE html>
<?php
require 'init.php';
require 'db.php';
session_start(); //realiseerib andmebaasi
?>
<html lang="et">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
    <head>
        <title>SeenItAll</title>
        <title>Viga</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="See on SeenItAll veebilehe avaleht, kust on võimalik sisse logida enda konto kasutamiseks või registreeruda kasutajaks veebilehele. "/>
        <meta name="keywords" content="kasutaja, filmid, logi sisse, registreeru"/>
    </head>
<header>
        <t><?php echo "Seenitall"?></t>
</header>

    <body> <!-- Valid kuhu lehele lähed -->
    <div class="frontbutton" onclick='location.href="login.php"'>
        <div class="fronttext">
            <?php echo'Logi sisse filmimaailma'?>

        </div>
    </div>
    <div class="frontbutton" id= "leftbutton" onclick='location.href="register.php"'>
        <div class="fronttext">
            <?php echo "Pole kasutajat? Registreeru"?>
        </div>
    </div>

</body>
</html>
