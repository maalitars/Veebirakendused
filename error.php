<!DOCTYPE html>
<?php
/* Errorite kuvamine  */
session_start();
?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css"/>
    <title>Viga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
<div itemprop="form" class="form">
    <h1 itemprop="headline">Viga</h1>
    <h2 itemprop="text">
        <?php
        if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
            echo $_SESSION['message'];
        else:
           // header("location: index.php");
        endif;
        ?>
    </h2>
    <div itemprop="button" class="errorbutton" id="centerbutton" onclick='location.href="index.php"'>Mine tagasi</div>
</div>
</body>
</html>
