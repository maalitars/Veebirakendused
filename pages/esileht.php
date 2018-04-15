<!DOCTYPE html>
<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Esileht</title>
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
<?php include 'header.php';
include_once 'loginphp/idcardLogin.php';?>
<div id="google"></div>
</body>
</html>