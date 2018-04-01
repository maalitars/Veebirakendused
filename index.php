<?php
require 'init.php';
require 'db.php';
//realiseerib andmebaasi

?>
<!DOCTYPE html>
<html lang="et">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
    <head>
        <title>SeenItAll</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="See on SeenItAll veebilehe avaleht, kust on võimalik sisse logida enda konto kasutamiseks või registreeruda kasutajaks veebilehele. "/>
        <meta name="keywords" content="kasutaja, filmid, logi sisse, registreeru"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            if (!window.jQuery) {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'js/jquery-3.3.1.min.js';

                var firstScript = document.getElementsByTagName('script')[0];
                firstScript.parentNode.insertBefore(script, firstScript);
            }
        </script>
    </head>
<header>
    <t3>Seenitall</t3>
    <span class="tooltip">
        <img src="pages/uploads/qmark.png" width="8%" heigth="8%" alt="abiinfo">
        <span class="tooltiptext">
            SeenItAll - Mis see on? Veebileht, kus saad pidada järge oma vaadatud filmidel ning nende kohta statistikat luua
        </span>
    </span>

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
