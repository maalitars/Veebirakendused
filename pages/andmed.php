<!DOCTYPE html>
<?php
require_once '../db.php';
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

//autoriseerimata kasutaja ei saa andmed.php lehele ligi
if(($_SESSION['email'] == "") && !($_SESSION['idcard'] == true) && !($_SESSION['facebook_id'] == true)){
    header("Location: http://46.101.6.112/");
}

?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Andmed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="../datapush/client/client.js"></script>
    <script>
        if (!window.jQuery) {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'js/jquery-3.3.1.min.js';
            var firstScript = document.getElementsByTagName('script')[0];
            firstScript.parentNode.insertBefore(script, firstScript);
        }
    </script>
</head>
<body>
<?php include 'header.php'; ?>
<div itemscope itemtype="http://www.schema.org/WebPage">
    <div class="card">
        <h2 itemprop="headline">Profiilipilt</h2>
        <br><br>
        <p>Praegu registeeritud kasutajate arv: <div id="countOfUsers"></div>
        <br><br>
        <form itemprop="potentialAction" action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="fileUpload">Vali fail üleslaadimiseks:</label>
            <br><br>
            <input name="file" type="file" id="fileUpload">
            <br><br>
            <button type="submit" name="submit">Lae pilt üles</button>
        </form>
        <br><br>
        <?php
        $sql = "SELECT path FROM img order by id desc limit 1";
        $result1 = $mysqli->query($sql);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $path = $row['path'];
                echo "<div id='profileimg' class='avatarPicture'><img itemprop='image' class='avatarPicture' src='$path' alt='Profile picture' /></div>";
            }
        } else {
            echo "<div id='profileimg2' class='avatarPicture'><img itemprop='image' class='avatarPicture' src='uploads/profilesdefault.jpg' alt='Profile picture'/></div>";
        }
        ?>
        <br><br>
        <form itemprop="potentialAction" action="deletepic.php" method="POST">
            <button type="submit" name="delete">Eemalda pilt</button>
        </form>
    </div>
</div>
</body>
</html>