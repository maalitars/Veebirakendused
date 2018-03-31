<!DOCTYPE html>
<?php
    require 'init.php';
    require 'db.php';

?>
<html lang="en">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>SeenItAll</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ((empty($_POST['email'])) OR (empty($_POST['firstname']))
            OR (empty($_POST['lastname'])) OR (empty($_POST['password']))) {
            $message = "Oled midagi sisestamata jätnud, vaata üle!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $message = "Email on vale, vaata üle!";
                echo "<script type='text/javascript'>alert('$message');</script>";
        }
        } else {
            if (isset($_POST['register'])) { //user registering
                require 'registersite.php';
            } elseif (isset($_POST['tagasi'])) {
                header("Location: index.php");
            }
        }
?>

<!-- sisestad oma emailid ja asjad ära ja siis peaks buttoni vajutusega peaks ta andmebaasi
asjad salvestama, aga ei salvesta.-->
<form class="form" action="register.php" method="POST">
    <div class="text">
        <?php echo 'sisene filmimaailma' ?>
    </div>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <input type="text" name="firstname" placeholder='<?php echo "eesnimi"?>'>
    <input type="text" name="lastname" placeholder='<?php echo "perenimi"?>'>
    <input type="text" name="email" placeholder='<?php echo "meiliaadress"?>'>
    <input type="password" name="password" placeholder='<?php echo "salasõna"?>'>
        <!-- type submit näitab, et submitiks selle formi ära-->
        <button class="button" type="submit" name="register"><?php echo "registreeru"?></button>
=======
    =======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
=======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
    <input type="text" name="firstname" placeholder='<?php echo 'eesnimi' ?>'>
    <input type="text" name="lastname" placeholder='<?php echo 'perenimi' ?>'>
    <input type="text" name="email" placeholder='<?php echo 'meiliaadress' ?>'>
    <input type="password" name="password" placeholder='<?php echo 'salasõna' ?>'>
    <!-- type submit näitab, et submitiks selle formi ära-->
    <button class="button" type="submit" name="register">Registreeru</button>
    <button class="button" id="reg" name="tagasi">Mine tagasi</button>
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
=======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83
=======
>>>>>>> bedda6ffa8d7414e143b81b6584e390229535e83

</form>
</body>