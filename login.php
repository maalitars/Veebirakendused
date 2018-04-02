<?php
    require 'init.php';
    require 'db.php';
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css">
    <title>SeenItAll - Logi sisse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Siit saab SeenItAll veebilehele sisse logida."/>
    <meta name="keywords" content="logi sisse, filmid, kasutaja, konto, salasõna"/>
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
        if (isset($_POST['login'])) { //user logging in

            require 'loginsite.php';
        }
        elseif(isset($_POST['tagasi'])){
            header("Location: index.php");
        }
    }
?>
<div class="login">
    <div itemscope itemtype="http://schema.org/WebPage">
    <form itemprop="potentialAction" class="form" action="login.php" method="POST">
        <div class="text">
            <p itemprop="text">Sisene filmimaailma</p>
        </div>
            <input type="text" name="email" placeholder="e-mail">
            <input type="password" name="password" placeholder="salasõna">
            <button itemprop="url" class="button" name="login">Logi sisse</button>
            <button itemprop="url" class="button" id="reg" name="tagasi">Mine tagasi</button>
            <a href="facebook/fbLogin.php" class="button" id="reg"> logi sisse facebookiga </a>
        <div itemprop="url" class="buttonen" onclick='location.href="?lang=english"'>
        </div>
        <div itemprop="url" class="buttonet" onclick='location.href="?lang=estonian"'>
        </div>

    </form>
    </div>
</div>
</body>