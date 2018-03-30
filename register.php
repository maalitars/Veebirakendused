<!DOCTYPE html>
<?php
require 'init.php';
require 'db.php';
session_start();
?>
<html lang="en">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>SeenItAll</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['register'])) { //user registering
        require 'registersite.php';
    }
}
?>
<form class="form" action="register.php" method="post">
    <div class="text">
        <?php echo 'sisene filmimaailma'?>
    </div>
    <input type="text" name="firstname" placeholder='<?php echo 'eesnimi'?>'>
    <input type="text" name="lastname" placeholder='<?php echo 'perenimi'?>'>
    <input type="text" name="email" placeholder='<?php echo 'meiliaadress'?>'>
    <input type="password" name="password" placeholder='<?php echo 'salasõna'?>'>
    <div class ="button">
        <t type="submit" name="register"><?php echo "registreeru"?></t>
    </div>
    <div class ="button" id="reg" onclick='location.href="index.php"'>
        <t type="submit"><?php echo "mine tagasi"?></t>
    </div>

</form>
</body>