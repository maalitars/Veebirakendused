<?php
require 'init.php';
require 'db.php';
//realiseerib andmebaasi
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Avaleht</title>
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
<div itemscope itemtype="http://schema.org/WebPage">
    <header>
    </header>
    <div itemprop="url" class="frontbutton" onclick='location.href="login.php"'>
        <div class="text">
            <p itemprop="text">Logi sisse filmimaailma</p>
        </div>
    </div>
    <div itemprop="url" class="frontbutton" id="leftbutton" onclick='location.href="register.php"'>
        <div class="text">
            <p>Pole kasutajat? Registreeru</p>
        </div>
    </div>
</div>
</body>
</html>