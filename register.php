<!DOCTYPE html>
<?php
require 'init.php';
require 'db.php';

?>
<html lang="et">
<head>
    <link href="pages/main2.css" rel="stylesheet" type="text/css">
    <title>SeenItAll - Registreeru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="Siin on võimalik registreeruda SeenItAll kasutajaks, et kõik filmiinfo oleks alati ühes ja samas kohas olemas."/>
    <meta name="keywords" content="kasutaja, registreeru, filmid"/>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tagasi'])) {
        header("Location: index.php");
    }
    if (isset($_POST['register'])) {
        if ((empty($_POST['email'])) OR (empty($_POST['firstname']))
            OR (empty($_POST['lastname'])) OR (empty($_POST['password']))) {
            $message = "Oled midagi sisestamata jätnud, vaata üle!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $message = "Email on vale, vaata üle!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            require "registersite.php";
        }

    }
}
?>

<!-- sisestad oma emailid ja asjad ära ja siis peaks buttoni vajutusega peaks ta andmebaasi
asjad salvestama, aga ei salvesta.-->
<form class="form" action="register.php" method="POST">
    <div class="text">
        <p>Sisene filmimaailma</p>
    </div>
    <input type="text" name="firstname" placeholder="eesnimi">
    <input type="text" name="lastname" placeholder="perenimi">
    <input type="text" name="email" placeholder="meiliaadress">
    <input type="password" name="password" placeholder="salasõna">
    <!-- type submit näitab, et submitiks selle formi ära-->
    <button class="button" type="submit" name="register">Registreeru</button>
    <button class="button" id="reg" name="tagasi">Mine tagasi</button>
</form>
</body>
</html>