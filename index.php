<!DOCTYPE html>
<?php
    require 'init.php';
    require 'db.php';
    //realiseerib andmebaasi
?>
<html lang="et">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<head>
    <title>SeenItAll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="See on SeenItAll veebilehe avaleht, kust on võimalik sisse logida enda konto kasutamiseks või registreeruda kasutajaks veebilehele. "/>
    <meta name="keywords" content="kasutaja, filmid, logi sisse, registreeru"/>
</head>
<header>
    <t3>Seenitall</t3>
</header>

<body> <!-- Valid kuhu lehele lähed -->
<div class="frontbutton" onclick='location.href="login.php"'>
    <div class="fronttext">
        <t3>Logi sisse filmimaailma</t3>

    </div>
</div>
<div class="frontbutton" id="leftbutton" onclick='location.href="register.php"'>
    <div class="fronttext">
        <t3>Pole kasutajat? Registreeru</t3>
    </div>
</div>

</body>
</html>
