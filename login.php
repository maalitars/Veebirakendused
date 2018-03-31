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
        if (isset($_POST['login'])) { //user logging in

            require 'loginsite.php';
        }
        elseif(isset($_POST['tagasi'])){
            header("Location: index.php");
        }
    }
?>
<div class="login">
    <form class="form" action="login.php" method="POST">
        <div class="text">
            <?php echo $lang['sisene_filmimaailma'] ?>
        </div>
        <input type="text" name="email" placeholder='<?php echo 'e-mail' ?>'>
        <input type="password" name="password" placeholder='<?php echo $lang['salasõna'] ?>'>
        <button class="button" name="login">Logi sisse</button>
        <button class="button" id="reg" name="tagasi">Mine tagasi</button>
        <div class="buttonen" onclick='location.href="?lang=english"'>
        </div>
        <div class="buttonet" onclick='location.href="?lang=estonian"'>
        </div>

    </form>
</div>
</body>