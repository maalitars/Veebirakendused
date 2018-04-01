<?php
    require 'init.php';
    require 'db.php';
    //realiseerib andmebaasi
    //loeb statistikat lehe külastatavuse kohta
    $now = date("Y-m-d");
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO statTracker(browser,ip,time_visited,thedate_visited)
      VALUES('$browser','$ip', now(),'$now')";
?>

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Avaleht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="See on SeenItAll veebilehe avaleht, kust on võimalik sisse logida enda konto kasutamiseks või registreeruda kasutajaks veebilehele. "/>
    <meta name="keywords" content="kasutaja, filmid, logi sisse, registreeru"/>
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

<body> <!-- Valid kuhu lehele lähed -->
<header>
    <t>Seenitall</t>
    <span class="tooltip">
        <img itemprop="image" src="pages/uploads/qmark.png" width="8%" heigth="8%" alt="abiinfo">
        <span itemprop="text" class="tooltiptext">
            <t2>SeenItAll - Mis see on? Veebileht, kus saad pidada järge oma vaadatud filmidel ning nende kohta statistikat luua</t2>
        </span>
    </span>
</header>
<div itemprop="button" class="frontbutton" onclick='location.href="login.php"'>
    <div class="frontText">
        <p itemprop="text">Logi sisse filmimaailma</p>
    </div>
</div>
<div itemprop="button" class="frontbutton" id="leftbutton" onclick='location.href="register.php"'>
    <div class="fronttext">
        <p>Pole kasutajat? Registreeru</p>
    </div>
</div>
</body>
</html>
