<!DOCTYPE html>
<?php
    /* Errorite kuvamine  */
    session_start();
?>
<html>
<head>
    <title>Error</title>
    <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
        <?php
            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                echo $_SESSION['message'];
            else:
                header("location: login.php");
            endif;
        ?>
    </p>
    <a href="login.php">
        <button class="button button-block"></button>
        Mine tagasi</button></a>
</div>
</body>
</html>
