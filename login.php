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
    if (isset($_POST['login'])) { //user logging in

        require 'loginsite.php';
    }
}
?>
<div class="login">
    <form class="form" action="login.php" method="post">
    <div class="text">
        <?php echo $lang['sisene_filmimaailma']?>
    </div>
        <input type="text" name="email" placeholder='<?php echo 'e-mail'?>'>
        <input type="password" name="password" placeholder='<?php echo $lang['salasõna']?>'>
        <div class ="button" onclick='location.href="pages/esileht.php"'>
            <t name = "login"><?php echo $lang['logi_sisse']?></t>
        </div>
        <div class ="button" id="reg" onclick='location.href="index.php"'>
            <t><?php echo 'mine tagasi'?></t>
        </div>
    <div class ="buttonen" onclick='location.href="?lang=english"'>
    </div>
    <div class ="buttonet" onclick='location.href="?lang=estonian"'>
    </div>

</form>
    </div>
</body>