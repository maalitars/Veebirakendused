<!DOCTYPE html>

<?php
    /* Errorite kuvamine  */
    session_start();
?>

<html lang="et">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                header("location: pages/andmed.php");
            endif;
        ?>
    </h3>
    <div class="button" id="centerbutton" onclick='location.href="pages/andmed.php"'>Mine tagasi</div>
</div>
</body>
</html>
