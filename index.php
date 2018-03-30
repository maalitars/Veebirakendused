<!DOCTYPE html>
<?php
require 'init.php';
require 'db.php';
session_start(); //realiseerib andmebaasi
?>
<html lang="en">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>SeenItAll</title>
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
