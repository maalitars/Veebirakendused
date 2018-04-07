<!DOCTYPE html>
<?php
/* Displays all successful messages */
session_start();
?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css"/>
    <title>Edukas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div itemscope itemtype="http://schema.org/WebPage">
    <div class="form">
        <h1 itemprop="headline">Edukas</h1>
        <p itemprop="text">
            <?php
            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                echo $_SESSION['message'];
            else:
                header("location: index.php");
            endif;
            ?>
        </p>
        <a href="index.php">
        <span class="button button-block">
        Home</span></a>
    </div>
</div>
</body>
</html>