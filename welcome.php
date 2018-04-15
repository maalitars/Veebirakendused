<!DOCTYPE html>

<?php
    session_start();
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>

<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css"/>
      <title>SeenItAll- Tere tulemast!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
    <h1 itemprop="headline">Tere tulemast!</h1>
    <h3 itemprop="text">
        <?php
            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                echo $_SESSION['message'];
            else:
                header("location: login.php");
            endif;
        ?>
    </h3>
    <div itemprop="button" class="button" id="centerbutton" onclick='location.href="pages/esileht.php"'>Mine lehele</div>
</div>

</body>
</html>