<!DOCTYPE html>
<?php
/* Errorite kuvamine  */
session_start();
?>
<html lang ="en">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
=======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
<head>
    <title>Viga</title>
</head>
<body>
<div class="form">
    <h1>Viga</h1>
    <h3>
        <?php
        if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
            echo $_SESSION['message'];
        else:
            header("location: login.php");
        endif;
        ?>
<<<<<<< HEAD
<<<<<<< HEAD
    </p>
    <a href="login.php">
        <span class="button button-block">
            Mine tagasi
        </span>
    </a>
=======
    </h3>
    <div class="button" id="centerbutton" onclick='location.href="login.php"'>Mine tagasi</div>
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
</div>
</body>
</html>
