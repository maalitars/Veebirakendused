<!DOCTYPE html>
<?php
/* Displays all successful messages */
session_start();
?>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
=======
=======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
=======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
<html>
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
<head>
    <title>Success</title>
    <?php include 'pages/main2.css'; ?>
</head>
<body>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
        <?php

        if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
            echo $_SESSION['message'];
        else:
            header("location: index.php");
        endif;
        ?>
    </p>
    <<<<<<< HEAD
    <a href="index.php"><span class="button button-block">Home</span></a>
    =======
    <a href="index.php">
        <button class="button button-block"/>
        Home</button></a>
    >>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
    =======
    =======
    >>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
    =======
    >>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
    if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
    echo $_SESSION['message'];
    else:
    header("location: index.php");
    endif;
    ?>
    </p>
    <a href="index.php">
        <button class="button button-block"/>
        Home</button></a>
    <<<<<<< HEAD
    <<<<<<< HEAD
    >>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
    =======
    >>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
    =======
    >>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
</div>
</body>
</html>
