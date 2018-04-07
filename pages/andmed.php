<!DOCTYPE html>
<?php
require_once '../db.php';
session_start();
?>
<html lang="et">
<head>
    <link href="main2.css" rel="stylesheet" type="text/css"/>
    <title>SeenItAll-Andmed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <?php
        $result = $mysqli->query("SELECT COUNT(*) as total from users;");
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];
        echo 'Praegu registreeritud kasutajate arv:  ';
        echo $count;
        ?>
        <br><br>
        <h3 itemprop="text">Vali pilt üleslaadimiseks:</h3>
        <br><br>
        <form itemprop="potentialAction" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file">File</label>
            <input name="file" type="file" id="file"/><br><br>
            <button type="submit" name="submit">Lae pilt üles</button>
        </form>
        <br><br>
        <?php
        $sql = "SELECT path FROM img order by id desc limit 1";
        $result1 = $mysqli->query($sql);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $path = $row['path'];
                echo "<div id='profileimg'><img src='$path' alt='Profile picture' /></div>";
            }
        } else {
            echo "<div id='profileimg'><img src='uploads/profilesdefault.jpg' alt='Profile picture'/></div>";
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