<!DOCTYPE html>
<?php
require 'init.php';
session_start();
include_once 'pages/dbh.php';
?>
<html lang="en">
<link href="pages/main2.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>SeenItAll</title>
</head>
<body>

<?php

    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'"; //kas profiilipilt on üleslaetud selle kasutaja poolt
            $resultImg = mysqli_query($conn, $sqlImg);
            while($rowImg = mysqli_fetch_assoc($resultImg)) {
                echo "<div>";
                if($rowImg['status'] == 0){
                    echo"<img src='uploads/profile".$id.".jpg'>";
                } else{
                    echo "<img src='pages/uploads/profilesdefault.jpg'>"; //näitab ainult -jpg'sid
                }

                echo "</div>";

            }

        }
    }
    if (isset($_SESSION['id'])) { //kui oleme sisse loginud
        if ($_SESSION['id'] == 1){
            echo "Oled sisseloginud";
        }
        echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
                <input type='file' name='file' id='fileToUpload'>
                    <button type='submit' name='submit''>Lae pilt üles</button>
                </form>";
    }
    else {
        echo" pole sisseloginud";
        echo "<form action='signup.php' method='POST'>
                <input type='text' name='first' placeholder='First name'>
                <input type='text' name='last'placeholder='Last name'>
                <input type='text' name='uid' placeholder='Username'>
                <input type='password' name='pwd' placeholder='Password'>
                <button type='submit' name='submitSignup'>SIGN UP</button>
              </form>";
    }
?>

<!-- sisestad oma emailid ja asjad ära ja siis peaks buttoni vajutusega saama kuhugi, aga eitea kuda teha-->
<div class="login">
    <form class="form" action="loginsite.php" method="POST">
    <div class="text">
        <?php echo $lang['sisene_filmimaailma']?>
    </div>
        <input type="text" name="email" placeholder='<?php echo 'e-mail'?>'>
        <input type="password" name="password" placeholder='<?php echo $lang['salasõna']?>'>
        <div class ="button" onclick='location.href="pages/esileht.php"'>
            <t name = "sumbmitLogin">Login</t>
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